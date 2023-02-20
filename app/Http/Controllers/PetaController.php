<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OporDetail;
use App\Opor;
use DB;

class PetaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $opor = DB::SELECT("SELECT * FROM`opor_detail` WHERE
    koordinat_fix LIKE '%[%' 
    OR koordinat_fix LIKE '%]%'");
        // dd($opor);
        $opor = json_encode($opor);
        return view('pages.peta.index',compact('opor'));
    }
}
