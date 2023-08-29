<?php

namespace App\Helpers;
use App\Kecamatan;
use App\Kelurahan;

class Helpers{

    public static function getKecamatan($kotaid){

        return Kecamatan::where('kode_kab', $kotaid)
            ->orderBy('nama', 'asc')
            ->get();
    }

    public static function getKelurahan($kode_kec, $kode_kab){

       return Kelurahan::select('id', 'nama_desa as nama')
       ->where('kode_kec', $kode_kec)
       ->where('kode_kab', $kode_kab)
       ->orderBy('nama_desa', 'asc')
       ->get();
    }
}
