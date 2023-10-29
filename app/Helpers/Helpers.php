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
use App\JenisKegiatan;

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

    public static function getJenisKegiatan(){

        return JenisKegiatan::orderBy('nama', 'asc')->get();
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

    public static function listAlokasiAnggaran(){

        return [
            [
                'no' => '1',
                'kode' => 'A001',
                'nama' => 'Total APBD Daerah'
            ],
            [
                'no' => '2',
                'kode' => 'A002',
                'nama' => 'Total Alokasi Anggaran SKPD'
            ],
            [
                'no' => '2.1',
                'kode' => 'A003',
                'nama' => 'Alokasi Anggaran SPM'
            ],
            [
                'no' => '2.2',
                'kode' => 'A004',
                'nama' => 'Alokasi Anggaran Diluar SPM'
            ],
            [
                'no' => '3',
                'kode' => 'A005',
                'nama' => 'Total Anggaran APBN'
            ],
            [
                'no' => '4',
                'kode' => 'A006',
                'nama' => 'Sumber Dana Lainnya'
            ]
        ];
    }

    public static function listSarpasPosko(){

        return [
            'fasilitas' => [
                'Kamar Mandi',
                'Jaringan Wifi',
                'HT & Ponsel',
                'Papan Nama Posko',
                'Logo Linmas',
                'Lambang Garuda',
                'Pigora Foto Presiden&Wakil',
                'Struktur Organisasi Satlinmas',
                'SOP Gangguan Tramtib',
                'Meja Kursi',
                'Daftar Piket & Jadwal Jaga',
                'Daftar No. Tlp Penting',
                'Peta Wilayah',
                'Sandi Morse',
                'Kentongan',
                'Kotak P3K',
                'AC',
                'Televisi',
                'Dispenser',
                'Jm Dinding',
                'Alat Kebersihan',
                'Lemari / Loker',
                'APAR',
                'Megaphone',
            ],
            'sarpras' => [
                'Mobil/Sepeda Motor Patroli',
                'Sepeda Motor Patroli',
                'Sepeda Angin',
                'Senter',
                'Jas Hujan',
                'Payung ',
                'Sepatru Booth',
                'Borgoil / Kabel tis',
                'Pentiungan / Tongkat',
                'Ban Kamling'
            ]
        ];
    }
}
