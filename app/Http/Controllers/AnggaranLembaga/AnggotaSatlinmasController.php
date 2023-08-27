<?php

namespace App\Http\Controllers\AnggaranLembaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\AliasName;
use App\AnggotaLinmas;
use App\Kota;
use App\Kecamatan;
use App\Kelurahan;
use Yajra\Datatables\Datatables;

class AnggotaSatlinmasController extends Controller
{
    public function datatable(){

        $query = AnggotaLinmas::query();
        $query->orderBy('id', 'desc');

        return Datatables::of($query)
        ->addColumn('aksi', function ($data) {
            $html = '';
            if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_admin){
                $html = '
                    <form action="'.url('anggaran/anggota-satlinmas/delete', $data->id).'" method="post" id="form-delete'.$data->id.'">
                        '.csrf_field().' '.method_field('DELETE').'
                        <a href="'.url('anggaran/anggota-satlinmas/create', $data->id).'" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="flaticon-edit-1"></i></a>
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

        return view('pages.anggaran-lembaga.anggota-satlinmas.index');
    }

    public function createOrEdit($id){

        $data = AnggotaLinmas::find($id);
        $kota = Kota::query();
        if(auth()->user()->level == AliasName::level_dinas){
            $kota->where('id', auth()->user()->kota);
        }
        $kota = $kota->orderBy('nama', 'asc')->get();

        return view('pages.anggaran-lembaga.anggota-satlinmas.create-edit', compact('data', 'kota'));
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

        return redirect('anggaran/anggota-satlinmas')->with('msg_success', $request->dataid ? 'Berhasil diperbaharui.' : 'Berhasil disimpan.');
    }

    public function destroy($id){

        $data = AnggotaLinmas::find($id);
        $data->delete();

        return redirect('anggaran/anggota-satlinmas')->with('msg_success', 'Berhasil dihapus.');
    }
}
