<?php

namespace App\Http\Controllers\AnggaranLembaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MasterInstrumenPerdaKeterangan;
use App\MasterInstrumenPerdaNilai;
use DB;

class InstrumenPerdaController extends Controller
{
    public function index()
    {
        $indikator_jenis = DB::SELECT("SELECT DISTINCT(indikator_jenis) FROM master_instrumen_perda_keterangan");
        return view('pages.anggaran-lembaga.instrumen_perda.index',compact('indikator_jenis'));
    }
}
