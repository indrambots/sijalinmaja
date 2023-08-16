<?php

namespace App\Http\Controllers\Rekap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;
use Auth;

class KasusController extends Controller
{
    
    public function index()
    {
        return view('pages.rekap.kasus.index');
    }

    public function kasus_grid(Request $request)
    {
        $kasus = DB::SELECT("SELECT
                            k.*, u.kota AS kota_user ,u.`name` AS nama_user
                            FROM
                            kasus k
                            LEFT JOIN users u
                            ON k.user_id = u.id
                            WHERE deleted_at IS NULL
                            AND k.id > 0 ORDER BY id DESC");
        $data = new Collection;
        foreach($kasus as $k):
            $input_by = ($k->kota_user == null) ? 'PROVINSI' : $k->nama_user;
            $status;
            if($k->status == 0):
                $status = 'BELUM VERIF';
            elseif($k->status == 1):
                $status = 'AKTIF';
            elseif($k->status == 2):
                $status = 'AKTIF';
            elseif($k->status == 3):
                $status = 'DALAM PENANGANAN OPD';
            elseif($k->status == 4):
                $status = 'DALAM PENANGANAN SATPOLPP';
            elseif($k->status == 5):
                $status = 'SELESAI';
            endif;
            $data->push([
                'id'    => $k->id,
                'judul' => $k->judul,
                'nama_pelanggar' => $k->nama_pelanggar,
                'nik_pelanggar' => $k->nik_pelanggar,
                'alamat_pelanggar' => $k->alamat_pelanggar,
                'lokasi_kejadian' => $k->lokasi_kejadian,
                'kota' => $k->kota_nama,
                'kecamatan' => $k->kec_nama,
                'kelurahan' => $k->kel_nama,
                'waktu_kejadian'    => $k->waktu_kejadian,
                'status'    => $status,
                'kewenangan'    => ($k->kewenangan == 1) ? 'PROVINSI' : 'KAB/KOTA',
                'keterangan_kewenangan'    => $k->keterangan_kewenangan,
                'pelapor'    => $k->pelapor,
                'no_telp_pelapor'    => $k->no_telp_pelapor,
                'sumber_informasi'    => $k->sumber_informasi,
                'tanggal_informasi'    => $k->tanggal_informasi,
                'created_at'    => $k->created_at,
                'input_by'    => $input_by,
                'bidang'    => $k->bidang,

            ]);
        endforeach;
        return response()->json($data);
    }
}
