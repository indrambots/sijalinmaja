<?php

namespace App\Http\Controllers\AnggaranLembaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\AliasName;
use App\FormKegiatan;
use Yajra\Datatables\Datatables;

class FormKegiatanController extends Controller
{
    public function datatable(){

        $query = FormKegiatan::query();
        if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_tim_kasus){
            $query->where('created_by', auth()->user()->id);
        }
        $query->orderBy('id', 'desc');

        return Datatables::of($query)
        ->addColumn('aksi', function ($data) {
            $html = '';
            if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_tim_kasus || auth()->user()->level == AliasName::level_admin){
                $getFiles = '';
                if($data->photo){
                    $getFiles = '<a href="'.asset('berkas/'.$data->photo.'').'" target="_blank" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="flaticon-doc"></i></a>';
                }
                $html = '
                    <form action="'.url('anggaran/trantibum/kegiatan/delete', $data->id).'" method="post" id="form-delete'.$data->id.'">
                        '.csrf_field().' '.method_field('DELETE').'
                        '.$getFiles.'
                        <a href="'.url('anggaran/trantibum/kegiatan/create', $data->id).'" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="flaticon-edit-1"></i></a>
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

        return view('pages.anggaran-lembaga.trantibum.kegiatan.index');
    }

    public function createOrEdit($id){

        $data = FormKegiatan::find($id);

        return view('pages.anggaran-lembaga.trantibum.kegiatan.create-edit', compact('data'));
    }

    public function storeOrUpdate(Request $request){

        $request->request->remove('_token');
        $request->request->remove('_method');
        $data = $request->dataid ? FormKegiatan::find($request->dataid) : new FormKegiatan();
        $files = $request->photo;
        $fileName = isset($data->photo) ? $data->photo : null;
        if($files){
            $fileName = 'kegiatan_'.date('YmdHis').'.'.$files->getClientOriginalExtension();
            $path = public_path('berkas');
            if(isset($data->photo)){
                $getFilesName = $path.'/'.$data->photo;
                if(file_exists($getFilesName) == true){
                    unlink($getFilesName);
                }
            }
            if(file_exists($path) == false){
                mkdir($path, 0755, true);
            }
            $files->move($path, $fileName);
        }

        $request->request->remove('dataid');
        $request->merge([
            'created_by' => auth()->user()->id
        ]);
        foreach($request->all() as $field => $val){
            if($field == 'photo'){
                $val = $fileName;
            }
            $data->$field = $val;
        }
        $data->save();

        return redirect('anggaran/trantibum/kegiatan')->with('msg_success', $request->dataid ? 'Berhasil diperbaharui.' : 'Berhasil disimpan.');
    }

    public function destroy($id){

        $data = FormKegiatan::find($id);
        if($data->photo){
            $getFilesName = public_path('berkas').'/'.$data->photo;
            if(file_exists($getFilesName) == true){
                unlink($getFilesName);
            }
        }
        $data->delete();

        return redirect('anggaran/trantibum/kegiatan')->with('msg_success', 'Berhasil dihapus.');
    }
}
