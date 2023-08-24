<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        //Jika level dinas, kabupaten atau kota
        if(auth()->user()->level == 5){
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
            //Jika level dinas, kabupaten atau kota, admin
            if(auth()->user()->level == 5 || auth()->user()->level == 7){
                $html = '
                    <form action="'.route('pegawai-kab.destroy', $data->id).'" method="post" id="form-delete'.$data->id.'">
                        '.csrf_field().' '.method_field('DELETE').'
                        <a href="'.route('pegawai-kab.edit', $data->id).'" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="flaticon-edit-1"></i></a>
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

        return view('pages.pegawai-kab.index');
    }

    public function create(){

        $jenis = MasterJenisJabatan::orderBy('nama', 'asc')->get();
        $status = MasterStatusPegawai::orderBy('nama', 'asc')->get();
        $tingkat = MasterTingkatJabatan::orderBy('nama', 'asc')->get();
        $golongan = MasterGolonganLembaga::orderBy('nama', 'asc')->get();
        $kota = Kota::query();
        //Jika level dinas, kabupaten atau kota
        if(auth()->user()->level == 5){
            $kota->where('id', auth()->user()->kota);
        }
        $kota = $kota->orderBy('nama', 'asc')->get();

        return view('pages.pegawai-kab.create', compact('jenis', 'status', 'tingkat', 'golongan', 'kota'));
    }

    public function store(Request $request){

        $request->request->remove('_token');
        $request->request->remove('_method');
        $request->merge([
            'is_ppns' => $request->is_ppns ? 1 : null
        ]);
        $data = PegawaiKab::updateOrCreate($request->all());

        return redirect()->route('pegawai-kab.index')->with('msg_success', 'Berhasil disimpan.');
    }

    public function edit($id){

        $data = PegawaiKab::find($id);
        $jenis = MasterJenisJabatan::orderBy('nama', 'asc')->get();
        $status = MasterStatusPegawai::orderBy('nama', 'asc')->get();
        $tingkat = MasterTingkatJabatan::orderBy('nama', 'asc')->get();
        $golongan = MasterGolonganLembaga::orderBy('nama', 'asc')->get();
        $kota = Kota::query();
        //Jika level dinas, kabupaten atau kota
        if(auth()->user()->level == 5){
            $kota->where('id', auth()->user()->kota);
        }
        $kota = $kota->orderBy('nama', 'asc')->get();

        return view('pages.pegawai-kab.edit', compact('data', 'jenis', 'status', 'tingkat', 'golongan', 'kota'));
    }

    public function update(Request $request, $id){

        $request->request->remove('_token');
        $request->request->remove('_method');
        $request->merge([
            'is_ppns' => $request->is_ppns ? 1 : null
        ]);
        $data = PegawaiKab::where('id', $id)->update($request->all());

        return redirect()->route('pegawai-kab.index')->with('msg_success', 'Berhasil diperbaharui.');
    }

    public function destroy($id){

        $data = PegawaiKab::find($id);
        $data->delete();

        return redirect()->route('pegawai-kab.index')->with('msg_success', 'Berhasil dihapus.');
    }
}
