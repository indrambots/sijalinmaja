<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\MasterKegiatan;
use App\MasterBentukKegiatan;
use App\MasterBidang;
use App\KegiatanPersonel;
use App\Pegawai;
use DB;
use Yajra\Datatables\Datatables;

class PenugasanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.kegiatan.penugasan.index');
    }

    public function filter(Request $request)
    {
        $personel = DB::SELECT("SELECT * FROM pegawai WHERE nip NOT IN (SELECT kp.nip FROM kegiatan k INNER JOIN kegiatan_personel kp ON k.id = kp.kegiatan_id WHERE tanggal_mulai >= ".date('Y-m-d')." AND tanggal_selesai <= ".date('Y-m-d').") AND id > 1 ");
        if($request->tanggal_mulai <> null){
            $wherebidang = ($request->bidang == "-" ) ? " AND bidang = ".$request->bidang : "";
            $personel = DB::SELECT("SELECT * FROM pegawai WHERE nip NOT IN (SELECT kp.nip FROM kegiatan k INNER JOIN kegiatan_personel kp ON k.id = kp.kegiatan_id WHERE tanggal_mulai >= '2024-01-30' AND tanggal_selesai <='2024-01-30') AND id > 1 ".$wherebidang);
        }
        return Datatables::of($personel)->make(true);
    }
}
