<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OporDetail;
use App\Opor;
use App\Kasus;
use App\LaporanKejadian;
use DB;


class LandingController extends Controller
{
    
    public function indexs()
    {
    //     $opor = DB::SELECT("SELECT * FROM`opor_detail` WHERE
    // koordinat_fix LIKE '%[%' 
    // OR koordinat_fix LIKE '%]%'");
        // dd($opor);
        // $opor = json_encode($opor);
        $cased = Kasus::where('id','>',0)->get()->toArray();
        $cased = json_encode($cased);
        $kebakaran = json_encode(LaporanKejadian::where('jenis_kejadian','Kebakaran')->where('id','>',0)->get());
        $nonkebakaran = json_encode(LaporanKejadian::where('jenis_kejadian','Non Kebakaran')->where('id','>',0)->get());
        $kasus_urusan = DB::SELECT("SELECT COUNT(*) as jum, urusan FROM kasus WHERE id > 0
GROUP BY urusan 
ORDER BY COUNT(*) DESC");
        $urusan_kasus = array();
        $urusan_jumlah_kasus = array();
        foreach($kasus_urusan as $k):
            array_push($urusan_kasus,$k->urusan);
            array_push($urusan_jumlah_kasus,$k->jum);
        endforeach;
        $urusan_kasus = json_encode($urusan_kasus);
        $urusan_jumlah_kasus = json_encode($urusan_jumlah_kasus);

        $kasus_kab = DB::SELECT("SELECT COUNT(*) as jum, kota_nama FROM kasus WHERE id > 0
GROUP BY kota_nama 
ORDER BY COUNT(*) DESC");
        $kota_nama = array();
        $kab_jumlah = array();
        foreach($kasus_kab as $k):
            array_push($kota_nama,$k->kota_nama);
            array_push($kab_jumlah,$k->jum);
        endforeach;
        $kota_nama = json_encode($kota_nama);
        $kab_jumlah = json_encode($kab_jumlah);


        $kebakaran_kab = DB::SELECT("SELECT COUNT(*) AS jum, nama_kota FROM laporan_kejadian WHERE id > 0 AND jenis_kejadian = 'Kebakaran'
GROUP BY nama_kota 
ORDER BY COUNT(*) DESC
LIMIT 10");
        $kebakaran_nama_kab = array();
        $kebakaran_jumlah = array();
        foreach($kebakaran_kab as $k):
            array_push($kebakaran_nama_kab,$k->nama_kota);
            array_push($kebakaran_jumlah,$k->jum);
        endforeach;
        $kebakaran_nama_kab = json_encode($kebakaran_nama_kab);
        $kebakaran_jumlah = json_encode($kebakaran_jumlah);

        $sumber_kebakaran = DB::SELECT("SELECT COUNT(*) AS jum, sumber FROM laporan_kejadian WHERE id > 0 AND jenis_kejadian = 'Kebakaran'
GROUP BY sumber 
ORDER BY COUNT(*) DESC");
        $sumber_nama = array();
        $sumber_jumlah = array();
        foreach($sumber_kebakaran as $k):
            array_push($sumber_nama,$k->sumber);
            array_push($sumber_jumlah,$k->jum);
        endforeach;
        $sumber_nama = json_encode($sumber_nama);
        $sumber_jumlah = json_encode($sumber_jumlah);
       return view('landing.index',compact('cased','kebakaran','nonkebakaran','urusan_kasus','urusan_jumlah_kasus','kota_nama','kab_jumlah','kebakaran_nama_kab','kebakaran_jumlah','sumber_nama','sumber_jumlah'));
    }
}
