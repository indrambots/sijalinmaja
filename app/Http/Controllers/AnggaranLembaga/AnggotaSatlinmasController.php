<?php

namespace App\Http\Controllers\AnggaranLembaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\AliasName;
use App\Helpers\Helpers;
use App\AnggotaLinmas;
use App\Kota;
use App\MasterPendidikan as Pendidikan;
use App\Kecamatan;
use Yajra\Datatables\Datatables;

class AnggotaSatlinmasController extends Controller
{
    public function datatable(){

        $query = AnggotaLinmas::query();
        $query->select('anggota_satlinmas.*', 'kot.nama as nama_kota', 'kec.nama as nama_kecamatan', 'kel.nama_desa as nama_kelurahan');
        $query->join('master_kota as kot', 'kot.id', '=', 'anggota_satlinmas.kotaid');
        $query->join('master_kecamatan as kec', 'kec.id', '=', 'anggota_satlinmas.kecamatanid');
        $query->join('master_kelurahan as kel', 'kel.id', '=', 'anggota_satlinmas.kelurahanid');
        $query->orderBy('id', 'desc');

        return Datatables::of($query)
        ->addColumn('aksi', function ($data) {
            $html = '';
            if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_admin){
                $html = '
                    <form action="'.url('anggaran/perlindungan/anggota-satlinmas/delete', $data->id).'" method="post" id="form-delete'.$data->id.'">
                        '.csrf_field().' '.method_field('DELETE').'
                        <a href="'.url('anggaran/perlindungan/anggota-satlinmas/create', $data->id).'" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="flaticon-edit-1"></i></a>
                        <button type="button" onclick="deleteData('.$data->id.')" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-trash-alt"></i></button>
                    </form>
                ';
            }

            return $html;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    public function index(){

        return view('pages.anggaran-lembaga.perlindungan.anggota-satlinmas.index');
    }

    public function createOrEdit($id){

        $data = AnggotaLinmas::find($id);
        $kota = Kota::query();
        if(auth()->user()->level == AliasName::level_dinas){
            $kota->where('id', auth()->user()->kota);
        }
        $kota = $kota->orderBy('nama', 'asc')->get();
        $pendidikan = Pendidikan::all();
        $kecamatan = [];
        $kelurahan = [];
        if($data){
            $kecamatanData = Kecamatan::find($data->kecamatanid);
            $kecamatan = Helpers::getKecamatan($data->kotaid);
            if($kecamatanData){
                $kelurahan = Helpers::getKelurahan($kecamatanData->kode_kec, $kecamatanData->kode_kab);
            }
        }

        return view('pages.anggaran-lembaga.perlindungan.anggota-satlinmas.create-edit', compact('data', 'kota', 'kecamatan', 'kelurahan','pendidikan'));
    }

    public function storeOrUpdate(Request $request){

        $request->request->remove('_token');
        $request->request->remove('_method');
        $request->merge([
            'created_by' => auth()->user()->id
        ]);
        $data = $request->dataid ? AnggotaLinmas::find($request->dataid) : new AnggotaLinmas();
        $request->request->remove('dataid');
        foreach($request->all() as $field => $val){
            $data->$field = $val;
        }
        $data->save();

        return redirect('anggaran/perlindungan/anggota-satlinmas')->with('msg_success', $request->dataid ? 'Berhasil diperbaharui.' : 'Berhasil disimpan.');
    }

    public function destroy($id){

        $data = AnggotaLinmas::find($id);
        $data->delete();

        return redirect('anggaran/perlindungan/anggota-satlinmas')->with('msg_success', 'Berhasil dihapus.');
    }

    public function getLocation(Request $request){
        $data['kecamatanid'] = null;
        $data['kelurahanid'] = null;
        if($request->type == 'kotaid'){
            $data['kecamatanid'] = Helpers::getKecamatan($request->kotaid)->toArray();
        }

        if($request->type == 'kecamatanid'){
            $kecamatanData = Kecamatan::find($request->kecamatanid);
            if($kecamatanData){
                $data['kelurahanid'] = Helpers::getKelurahan($kecamatanData->kode_kec, $kecamatanData->kode_kab)->toArray();
            }
        }

        return response()->json($data);
    }
}
