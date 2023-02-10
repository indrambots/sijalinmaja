<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use App\Kelurahan;
use App\Kota;

class AjaxController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function filter_kecamatan(Request $request)
    {
        $kecamatan      = Kecamatan::where('kode_kab', $request->kota)->get();
        $kelurahan      = Kelurahan::where('kode_kab', $request->kota)->where('kode_kec', $kecamatan[0]->kode_kec)->get();
        $view_kecamatan = (String) view('ajax.filter_kecamatan', compact('kecamatan'));
        $view_kelurahan = (String) view('ajax.filter_kelurahan', compact('kelurahan'));
        return response()->json(array('view_kecamatan' => $view_kecamatan, 'view_kelurahan' => $view_kelurahan));
    }

    public function filter_kelurahan(Request $request)
    {
        $kelurahan      = Kelurahan::where('kode_kab', $request->kota)->where('kode_kec', $request->kecamatan)->get();
        $view_kelurahan = (String) view('ajax.filter_kelurahan', compact('kelurahan'));
        return response()->json(array('view_kelurahan' => $view_kelurahan));
    }

    public function filter_urusan(Request $request){
        
    }
}
