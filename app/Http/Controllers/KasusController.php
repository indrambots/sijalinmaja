<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisTrantib;
use App\Kota;
use App\Kecamatan;
use App\Kelurahan;
use App\Pd;
use App\Urusan;
use App\Kasus;
use App\SumberInformasi;

class KasusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.kasus.index');
    }

    public function create($id){
        $sumber = SumberInformasi::orderBy('nama','asc')->get();
        $urusan = Urusan::orderBy('nama','asc')->get();
        $kota = Kota::orderBy('nama','asc')->get();
        $pd = Pd::orderBy('nama','asc')->get();
        $kasus = Kasus::find($id);
        return view('pages.kasus.create',compact('sumber','urusan','kota','pd','id','kasus'));
    }

    public function save(Request $request){
        $kasus = new Kasus();
        if($request->id !== 0):
            $kasus = Kasus::find($request->id);
        endif;
    }
}
