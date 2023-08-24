<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PegawaiKab;
use App\MasterJenisJabatan;
use App\MasterStatusPegawai;
use App\MasterTingkatJabatan;
use Yajra\Datatables\Datatables;

class PegawaiKabController extends Controller
{
    public function datatable(){

        $query = PegawaiKab::query();
        $query->orderBy('id', 'desc');

        return Datatables::of($query)
        ->addColumn('aksi', function ($data) {
            $html = '
                <form action="'.route('pegawai-kab.destroy', $data->id).'" method="post" id="form-delete'.$data->id.'">
                    '.csrf_field().' '.method_field('DELETE').'
                    <a href="'.route('pegawai-kab.edit', $data->id).'" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="flaticon-edit-1"></i></button>
                    <button type="button" onclick="deleteData('.$data->id.')" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-trash-alt"></i></button>
                </form>
            ';

            return $html;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    public function index(){

        return view('pages.pegawai-kab.index');
    }

    public function create(){

        $jenis = MasterJenisJabatan::orderBy('nama', 'asc')->get();
        $status = MasterStatusPegawai::orderBy('nama', 'asc')->get();
        $tingkat = MasterTingkatJabatan::orderBy('nama', 'asc')->get();

        return view('pages.pegawai-kab.create', compact('jenis', 'status', 'tingkat'));
    }

    public function store(Request $request){

        $data = PegawaiKab::updateOrCreate($request->all());

        return redirect()->route('pegawai-kab.index')->with('msg_success', 'Berhasil disimpan.');
    }

    public function edit($id){

        $data = PegawaiKab::find($id);
        $jenis = MasterJenisJabatan::orderBy('nama', 'asc')->get();
        $status = MasterStatusPegawai::orderBy('nama', 'asc')->get();
        $tingkat = MasterTingkatJabatan::orderBy('nama', 'asc')->get();

        return view('pages.pegawai-kab.edit', compact('data', 'jenis', 'status', 'tingkat'));
    }

    public function update(Request $request, $id){

        $data = PegawaiKab::where('id', $id)->update($request->all());

        return redirect()->route('pegawai-kab.index')->with('msg_success', 'Berhasil diperbaharui.');
    }

    public function destroy($id){

        $data = PegawaiKab::find($id);
        $data->delete();

        return redirect()->route('pegawai-kab.index')->with('msg_success', 'Berhasil dihapus.');
    }
}
