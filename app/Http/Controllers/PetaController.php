<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OporDetail;
use App\Opor;
use App\Kasus;
use App\LaporanKejadian;
use DB;

class PetaController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $opor = DB::SELECT("SELECT * FROM`opor_detail` WHERE
    koordinat_fix LIKE '%[%' 
    OR koordinat_fix LIKE '%]%'");
        // dd($opor);
        $opor = json_encode($opor);
        $cased = Kasus::where('id','>',0)->get()->toArray();
        $cased = json_encode($cased);
        $kebakaran = json_encode(LaporanKejadian::where('jenis_kejadian','Kebakaran')->where('id','>',0)->whereNotNull('koordinat')->get());
        $nonkebakaran = json_encode(LaporanKejadian::where('jenis_kejadian','Non Kebakaran')->where('id','>',0)->whereNotNull('koordinat')->get());
        return view('pages.peta.index',compact('opor','cased','kebakaran','nonkebakaran'));
    }
}
