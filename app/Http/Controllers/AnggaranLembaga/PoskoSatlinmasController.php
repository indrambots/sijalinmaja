<?php

namespace App\Http\Controllers\AnggaranLembaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\AliasName;
use App\PoskoSatlinmas;
use App\PoskoSatlinmasDetail;
use App\PoskoSatlinmasKategori;
use App\Helpers\Helpers;
use App\Kota;
use App\Kecamatan;
use Yajra\Datatables\Datatables;

class PoskoSatlinmasController extends Controller
{
    public function datatable(){

        $query = PoskoSatlinmas::query();
        $query->select('posko_satlinmas.*', 'kot.nama as nama_kota', 'kec.nama as nama_kecamatan', 'kel.nama_desa as nama_kelurahan');
        $query->leftJoin('master_kota as kot', 'kot.id', '=', 'posko_satlinmas.kota');
        $query->leftJoin('master_kecamatan as kec', 'kec.id', '=', 'posko_satlinmas.kecamatan');
        $query->leftJoin('master_kelurahan as kel', 'kel.id', '=', 'posko_satlinmas.kelurahan');
        if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_dinas_dan_damkar){
            $query->where('user_id', auth()->user()->id);
        }
        $query->orderBy('id', 'desc');

        return Datatables::of($query)
        ->addColumn('aksi', function ($data) {
            $html = '';
            if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_dinas_dan_damkar || auth()->user()->level == AliasName::level_admin){
                $html = '
                    <form action="'.url('anggaran/perlindungan/posko-satlinmas/delete', $data->id).'" method="post" id="form-delete'.$data->id.'">
                        '.csrf_field().' '.method_field('DELETE').'
                        <button type="button" onclick="getPosko('.'`sarpras`'.', '.'`'.$data->id.'`'.')" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary" title="Sarpras">
                            <i class="fa-solid fa-layer-group"></i>
                        </button>
                        <button type="button" onclick="getPosko('.'`fasilitas`'.', '.'`'.$data->id.'`'.')" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary" title="Fasilitas">
                            <i class="fa-solid fa-house-signal"></i>
                        </button>
                        <a href="'.url('anggaran/perlindungan/posko-satlinmas/create', $data->id).'" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary" title="Edit"><i class="flaticon-edit-1"></i></a>
                        <button type="button" onclick="deleteData('.$data->id.')" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-trash-alt" title="Hapus"></i></button>
                    </form>
                ';
            }

            return $html;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    public function index(){

        return view('pages.anggaran-lembaga.perlindungan.posko-satlinmas.index');
    }

    public function createOrEdit($id){

        $data = PoskoSatlinmas::find($id);
        $kota = Kota::query();
        if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_dinas_dan_damkar){
            $kota->where('id', auth()->user()->kota);
        }
        $kota = $kota->orderBy('nama', 'asc')->get();
        $kecamatan = [];
        $kelurahan = [];
        if($data){
            $kecamatanData = Kecamatan::find($data->kecamatan);
            $kecamatan = Helpers::getKecamatan($data->kota);
            if($kecamatanData){
                $kelurahan = Helpers::getKelurahan($kecamatanData->kode_kec, $kecamatanData->kode_kab);
            }
        }

        return view('pages.anggaran-lembaga.perlindungan.posko-satlinmas.create-edit', compact('data', 'kota', 'kecamatan', 'kelurahan'));
    }

    public function storeOrUpdate(Request $request){

        $request->request->remove('_token');
        $request->request->remove('_method');
        $request->merge([
            'user_id' => auth()->user()->id
        ]);
        $data = $request->dataid ? PoskoSatlinmas::find($request->dataid) : new PoskoSatlinmas();
        $request->request->remove('dataid');
        foreach($request->all() as $field => $val){
            $data->$field = $val;
        }
        $data->save();

        return redirect('anggaran/perlindungan/posko-satlinmas')->with('msg_success', $request->dataid ? 'Berhasil diperbaharui.' : 'Berhasil disimpan.');
    }

    public function getPosko(Request $request){

        $data = PoskoSatlinmasDetail::where('poskoid', $request->dataid)->get()->toArray();

        dd($request->all());

        return view('pages.anggaran-lembaga.perlindungan.posko-satlinmas.get-posko', compact('data'));
    }

    public function getPoskoStoreOrUpdate(Request $request){

    }

    public function destroy($id){

        $data = PoskoSatlinmas::find($id);
        $data->delete();

        return redirect('anggaran/perlindungan/posko-satlinmas')->with('msg_success', 'Berhasil dihapus.');
    }
}
