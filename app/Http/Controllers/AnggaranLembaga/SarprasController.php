<?php

namespace App\Http\Controllers\AnggaranLembaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\AliasName;
use App\MasterSarpras;
use Yajra\Datatables\Datatables;

class SarprasController extends Controller
{
    public function datatable(){

        $query = MasterSarpras::query();
        if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_tim_kasus){
            $query->where('created_by', auth()->user()->id);
        }
        $query->orderBy('id', 'desc');

        return Datatables::of($query)
        ->addColumn('aksi', function ($data) {
            $html = '';
            if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_tim_kasus || auth()->user()->level == AliasName::level_admin){
                $getFiles = '';
                if($data->berkas){
                    $getFiles = '<a href="'.asset('berkas/'.$data->berkas.'').'" target="_blank" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="flaticon-doc"></i></a>';
                }
                $html = '
                    <form action="'.url('anggaran/kelembagaan/sarpras/delete', $data->id).'" method="post" id="form-delete'.$data->id.'">
                        '.csrf_field().' '.method_field('DELETE').'
                        '.$getFiles.'
                        <a href="'.url('anggaran/kelembagaan/sarpras/create', $data->id).'" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="flaticon-edit-1"></i></a>
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

        return view('pages.anggaran-lembaga.kelembagaan.sarpras.index');
    }

    public function createOrEdit($id){

        $data = MasterSarpras::find($id);

        return view('pages.anggaran-lembaga.kelembagaan.sarpras.create-edit', compact('data'));
    }

    public function storeOrUpdate(Request $request){

        $request->request->remove('_token');
        $request->request->remove('_method');
        $data = $request->dataid ? MasterSarpras::find($request->dataid) : new MasterSarpras();
        $files = $request->berkas;
        $fileName = isset($data->berkas) ? $data->berkas : null;
        if($files){
            $fileName = 'sarpras_'.date('YmdHis').'.'.$files->getClientOriginalExtension();
            $path = public_path('berkas');
            if(isset($data->berkas)){
                $getFilesName = $path.'/'.$data->berkas;
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
            if($field == 'berkas'){
                $val = $fileName;
            }
            $data->$field = $val;
        }
        $data->save();

        return redirect('anggaran/kelembagaan/sarpras')->with('msg_success', $request->dataid ? 'Berhasil diperbaharui.' : 'Berhasil disimpan.');
    }

    public function destroy($id){

        $data = MasterSarpras::find($id);
        if($data->berkas){
            $getFilesName = public_path('berkas').'/'.$data->berkas;
            if(file_exists($getFilesName) == true){
                unlink($getFilesName);
            }
        }
        $data->delete();

        return redirect('anggaran/kelembagaan/sarpras')->with('msg_success', 'Berhasil dihapus.');
    }
}
