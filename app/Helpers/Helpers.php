<?php

namespace App\Helpers;
use App\Kecamatan;
use App\Kelurahan;
use App\Urusan;
use App\JenisPelanggaran;
use App\Kasandra;
use App\MasterJenisTertib;
use App\Helpers\AliasName;

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

    public static function getMasterUrusan(){

        return Urusan::orderBy('nama', 'asc')->get();
    }

    public static function getMasterJenisPelanggaran(){

        return JenisPelanggaran::orderBy('jenis_pelanggaran', 'asc')->get();
    }

    public static function getKasandra(){

        $data = Kasandra::query();
        if(auth()->user()->level == AliasName::level_dinas){
            $data->where('user_id', auth()->user()->id);
        }
        $data->orderBy('perda', 'asc');
        $data = $data->get();

        return $data;
    }

    public static function listTindakLanjut(){


        return [
            'Peringatan',
            'Penutupan',
            'Pencabutan Izin',
            'Pembinaan',
            'Pengawasan',
            'Lainnya'
        ];
    }

    public static function listSaksi(){

        return [
            'Denda',
            'Kurungan',
            'Administrasi',
            'Lainnya'
        ];
    }

    public static function listStatusProcess(){

        return [
            'Non Yustisi',
            'Penyelidikan',
            'Penyidikan',
            'P-21',
            'SP-3',
            'Dalam Proses (Belum P-21/SP-3)'
        ];
    }

    public static function getJenisTertib($urusan){

        return MasterJenisTertib::where('urusan', $urusan)->orderBy('nama', 'asc')->get();
    }
}
