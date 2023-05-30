<?php

namespace App\Http\Controllers\Rekap;

use App\Http\Controllers\Controller;
use DB;
use App\Kegiatan;
use Yajra\Datatables\Datatables;

class KegiatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('pages.rekap.kegiatan.index');
    }

    public function datatable_rekap_kegiatan()
    {
        $kegiatan = DB::SELECT("SELECT COUNT(id) AS total, bidang, sub_bidang FROM kegiatan WHERE deleted_at IS NULL AND id >0 GROUP BY bidang, sub_bidang ORDER BY bidang ASC");
        return Datatables::of($kegiatan)
        ->addColumn('belum_laporan',function($i){
            $blm = Kegiatan::select('id')->where('bidang',$i->bidang)->where('sub_bidang',$i->sub_bidang)->whereNull('hasil_kegiatan')->get();
            return '<button class="btn btn-warning" onclik="belumLaporan("'.$i->bidang.'","'.$i->sub_bidang.'")">'.count($blm).'</button>';
        })->rawColumns(['belum_laporan'])
        ->make(true);
    }
}
