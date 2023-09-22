<?php

namespace App\Http\Controllers\AnggaranLembaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FormSarpras;

class FormSarprasController extends Controller
{
    public function index(){

        $query = FormSarpras::where('user_id', auth()->user()->id)->get()->toArray();
        $data = [];
        foreach($query as $q){
            $data[$q['formid']] = $q;
        }

        return view('pages.anggaran-lembaga.kelembagaan.form-sarpras.index', compact('data'));
    }

    public function storeOrUpdate(Request $request){

        foreach($request->nama as $id => $nama){
            $query = FormSarpras::where('formid', $id)
                ->where('user_id', auth()->user()->id)
                ->first();
            $data = isset($query->id) ? FormSarpras::find($query->id) : new FormSarpras();
            $data->user_id = auth()->user()->id;
            $data->formid = $id;
            $data->nama = $nama;
            $data->jumlah = $request->jumlah[$id];
            $data->status_layak = $request->layak[$id];
            $data->save();
        }

        return redirect('anggaran/kelembagaan/sarpras')->with('msg_success', $request->dataid ? 'Berhasil diperbaharui.' : 'Berhasil disimpan.');
    }
}
