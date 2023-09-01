<?php

namespace App\Http\Controllers\AnggaranLembaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\AliasName;
use App\PegawaiKab;
use App\MasterJenisJabatan;
use App\MasterStatusPegawai;
use App\MasterTingkatJabatan;
use App\MasterGolonganLembaga;
use App\Kota;
use Yajra\Datatables\Datatables;

class PegawaiKabController extends Controller
{
    public function datatable(){

        $query = PegawaiKab::query();
        $query->select('pegawai_kab.*', 'kab.nama as kab_kota');
        $query->join('master_kota as kab', 'kab.id', '=', 'pegawai_kab.kab_kota_id');
        if(auth()->user()->level == AliasName::level_dinas){
            $query->where('pegawai_kab.kab_kota_id', auth()->user()->kota);
        }
        $query->orderBy('id', 'desc');

        return Datatables::of($query)
        ->addColumn('raw_is_ppns', function ($data) {
            $html = '<span class="badge badge-primary"><i class="fas fa-info-circle fa-sm"></i> Tidak</span>';
            if($data->is_ppns){
                $html = '<span class="badge badge-success"><i class="fas fa-info-circle fa-sm"></i> Iya</span>';
            }

            return $html;
        })
        ->addColumn('aksi', function ($data) {
            $html = '';
            if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_admin){
                $html = '
                    <form action="'.url('anggaran/kelembagaan/pegawai-kab/delete', $data->id).'" method="post" id="form-delete'.$data->id.'">
                        '.csrf_field().' '.method_field('DELETE').'
                        <a href="'.url('anggaran/kelembagaan/pegawai-kab/create', $data->id).'" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="flaticon-edit-1"></i></a>
                        <button type="button" onclick="deleteData('.$data->id.')" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-trash-alt"></i></button>
                    </form>
                ';
            }

            return $html;
        })
        ->rawColumns(['raw_is_ppns', 'aksi'])
        ->make(true);
    }

    public function index(){

        return view('pages.anggaran-lembaga.kelembagaan.pegawai-kab.index');
    }

    public function createOrEdit($id){

        $data = PegawaiKab::find($id);
        $jenis = MasterJenisJabatan::orderBy('nama', 'asc')->get();
        $status = MasterStatusPegawai::orderBy('nama', 'asc')->get();
        $tingkat = MasterTingkatJabatan::orderBy('nama', 'asc')->get();
        $golongan = MasterGolonganLembaga::orderBy('nama', 'asc')->get();
        $kota = Kota::query();
        if(auth()->user()->level == AliasName::level_dinas){
            $kota->where('id', auth()->user()->kota);
        }
        $kota = $kota->orderBy('nama', 'asc')->get();

        return view('pages.anggaran-lembaga.kelembagaan.pegawai-kab.create-edit', compact('data', 'jenis', 'status', 'tingkat', 'golongan', 'kota'));
    }

    public function storeOrUpdate(Request $request){

        $request->request->remove('_token');
        $request->request->remove('_method');
        $request->merge([
            'is_ppns' => $request->is_ppns ? 1 : null,
            'userid' => auth()->user()->id
        ]);
        $data = $request->dataid ? PegawaiKab::find($request->dataid) : new PegawaiKab();
        $request->request->remove('dataid');
        foreach($request->all() as $field => $val){
            $data->$field = $val;
        }
        $data->save();

        return redirect('anggaran/kelembagaan/pegawai-kab')->with('msg_success', $request->dataid ? 'Berhasil diperbaharui.' : 'Berhasil disimpan.');
    }

    public function destroy($id){

        $data = PegawaiKab::find($id);
        $data->delete();

        return redirect('anggaran/kelembagaan/pegawai-kab')->with('msg_success', 'Berhasil dihapus.');
    }
}
