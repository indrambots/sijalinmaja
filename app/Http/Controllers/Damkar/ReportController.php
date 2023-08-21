<?php

namespace App\Http\Controllers\Damkar;

use App\Http\Controllers\Controller;
use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function kelembagaan()
    {
        return view('pages.damkar.admin.kelembagaan.index');

    }

    public function kejadian()
    {

        return view('pages.damkar.admin.kejadian.index');
    }

    public function sarpras()
    {
        return view('pages.damkar.admin.sarpras.index');
    }

    public function kelembagaan_grid(Request $request)
    {
        $profil = DB::SELECT("SELECT
    p.id,
    p.lembaga,
    p.nama_pd,
    p.alamat,
    p.email,
    p.anggaran,
    p.nilai_spm,
IF
    ( p.is_bergabung = 0, 'Tidak', 'Ya' ) AS gabung_dinas,
    p.tipe,
    p.ka_opd,
    p.golongan, master_kota.nama AS kota
FROM
    `profil_damkar` p INNER JOIN users u ON p.user_id = u.id
    RIGHT JOIN master_kota ON master_kota.id = u.kota
    WHERE master_kota.nama <> 'LUAR JAWA TIMUR'
    ");
        return response()->json($profil);
    }

    public function kejadian_grid(Request $request)
    {
        $wherecondition = (Auth::user()->level >= 11) ? "AND user_id = ".Auth::user()->id : "";

        $kejadian = DB::SELECT("
            SELECT l.*, m.nama AS kota_null FROM `laporan_kejadian` l RIGHT JOIN master_kota m ON l.kota = m.id WHERE m.nama <> 'LUAR JAWA TIMUR'
             AND deleted_at IS NULL ".$wherecondition);
        $data = new Collection();
        foreach ($kejadian as $k):
            $objek = "";
            if (isset($k->objek)):
                if($k->objek !== 'null'):
                $countobjek = count(json_decode($k->objek));
                    $i = 0;
                    foreach (json_decode($k->objek) as $o):
                        if ($countobjek == 1) {
                            $objek = $o;
                        } else {
                            if ($i !== $countobjek) {
                                $objek .= $o . ", ";
                            } else {
                                $objek .= $o;
                            }
                            $i++;
                        }
                    endforeach;
                endif;
            endif;
            // dd($k);
            $data->push([
                "jenis_kejadian"   => $k->jenis_kejadian,
                "jenis_objek"      => $k->jenis_objek,
                "objek"            => $objek,
                "sumber"           => $k->sumber,
                "kota"             => $k->kota_null,
                "kecamatan"        => $k->nama_kecamatan,
                "kelurahan"        => $k->nama_kelurahan,
                "alamat"           => $k->lokasi_kejadian,
                "tanggal_kejadian" => ($k->tanggal_kejadian !== null) ? date('d F Y', strtotime($k->tanggal_kejadian)) : null,
                "jam"              => ($k->jam_kejadian !== null) ? date('H.i', strtotime($k->jam_kejadian)) : null,
                "respon_time"      => ($k->respon_time !== null) ? $k->respon_time . " menit" : null,
                "korban"           => $k->korban,
                "kerugian"         => $k->nilai_kerugian,
                "kendala"          => $k->kendala,
                "jumlah_armada"    => $k->jumlah_armada,
                "jumlah_personel"  => $k->jumlah_personel,
                "sumber_berita"    => $k->sumber_berita,
            ]);
        endforeach;
        return response()->json($data);
    }

    public function sarpras_grid(Request $request)
    {
        $sarpras = DB::SELECT("SELECT s.*,m.nama FROM `sarpras_damkar` s INNER JOIN users u ON s.user_id = u.id RIGHT JOIN master_kota m ON u.kota = m.id WHERE m.nama <> 'LUAR JAWA TIMUR'");
        return response()->json($sarpras);
    }

    public function sdm()
    {
        return view('pages.damkar.admin.sdm.index');
    }


    public function sdm_grid(Request $request)
    {
        $sdm = DB::SELECT("SELECT s.*,m.nama FROM `sdm_damkar` s INNER JOIN users u ON s.user_id = u.id RIGHT JOIN master_kota m ON u.kota = m.id WHERE m.nama <> 'LUAR JAWA TIMUR'");
        return response()->json($sdm);
    }
}
