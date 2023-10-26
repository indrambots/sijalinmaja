<?php

namespace App\Http\Controllers\AnggaranLembaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AlokasiAnggaran;

class FormAlokasiAnggaranController extends Controller
{
    public function index(){

        $query = AlokasiAnggaran::where('user_id', auth()->user()->id)->get()->toArray();
        $data = [];
        foreach($query as $q){
            $data[$q['kode']] = $q;
        }

        return view('pages.anggaran-lembaga.kelembagaan.alokasi-anggaran.index', compact('data'));
    }

    public function storeOrUpdate(Request $request){

        foreach($request->nama_alokasi as $kode => $nama){
            $query = AlokasiAnggaran::where('kode', $kode)
                ->where('user_id', auth()->user()->id)
                ->first();
            $data = isset($query->id) ? AlokasiAnggaran::find($query->id) : new AlokasiAnggaran();
            $data->user_id = auth()->user()->id;
            $data->kode = $kode;
            $data->nama_alokasi = $nama;
            $data->nilai_anggaran = $request->nilai_anggaran[$kode] ? str_replace(',', '', $request->nilai_anggaran[$kode]) : null;
            $data->permasalahan = $request->permasalahan[$kode];
            $data->solusi = $request->solusi[$kode];
            $data->save();
        }

        return redirect('anggaran/kelembagaan/alokasi-anggaran')->with('msg_success', $request->dataid ? 'Berhasil diperbaharui.' : 'Berhasil disimpan.');
    }
}
