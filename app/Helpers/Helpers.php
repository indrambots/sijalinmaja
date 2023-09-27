<?php

namespace App\Helpers;
use App\Kecamatan;
use App\Kelurahan;
use App\Urusan;
use App\JenisPelanggaran;
use App\Kasandra;
use App\MasterJenisTertib;
use App\MasterFormSarpras;
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

    public static function formSarpras(){

        $query = MasterFormSarpras::all()->toArray();
        $data = [];
        foreach($query as $que){
            $data[$que['group1']][$que['group2']][$que['group3']][$que['id']] = $que['nama'];
        }

        return $data;
    }

    public static function numberToRoman($number) {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }
}
