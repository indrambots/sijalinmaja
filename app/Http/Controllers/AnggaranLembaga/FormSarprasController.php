<?php

namespace App\Http\Controllers\AnggaranLembaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FormSarpras;

class FormSarprasController extends Controller
{
    public function index(){

        return view('pages.anggaran-lembaga.kelembagaan.form-sarpras.index');
    }

    public function storeOrUpdate(Request $request){

        $request->request->remove('_token');
        $request->request->remove('_method');
        $data = $request->dataid ? FormSarpras::find($request->dataid) : new FormSarpras();
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
}
