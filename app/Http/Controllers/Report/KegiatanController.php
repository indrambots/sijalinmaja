<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Pegawai;
use App\KegiatanPersonel;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;

class KegiatanController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function seksi()
    {

        return view('pages.report.kegiatan.seksi');
    }

    public function datatable_puskogap(Request $request)
    {

        $pegawai = Pegawai::where('nip',Auth::user()->username)->first();
        // dd($pegawai);
        $kegiatan = DB::SELECT("SELECT DISTINCT(k.id),k.spt, p.sub_bidang, tanggal_mulai,tanggal_selesai, lokasi, is_barcode
                                    FROM
                                    kegiatan k
                                    LEFT JOIN kegiatan_personel kp ON k.id = kp.kegiatan_id 
                                    LEFT JOIN pegawai p ON kp.nip = p.nip
                                    WHERE p.sub_bidang = '".$pegawai->sub_bidang."' AND  k.bentuk_kegiatan =  'PUSKOGAP' AND
                                    k.deleted_at IS NULL
                                    ORDER BY k.id DESC");

        return Datatables::of($kegiatan)
        ->editColumn('spt',function($i){
            if($i->is_barcode == 1):
                return '<a href="'.url('download/spt/'.$i->id).'" target="_blank">'.$i->spt.'</a>';
            else:
                return $i->spt;
            endif;
        })->addColumn('waktu_kegiatan',function($i){
            if($i->tanggal_mulai == $i->tanggal_selesai):
                return date("d F Y", strtotime($i->tanggal_mulai));
            else:
                return date("d F Y", strtotime($i->tanggal_mulai))." s/d ".date("d F Y", strtotime($i->tanggal_selesai));
            endif;
            })->addColumn('anggota',function($i){
                $kp = KegiatanPersonel::where('kegiatan_id',$i->id)->get();
                $i = 1;
                $str = '';
                foreach($kp as $k):
                    $peg = Pegawai::where('nip',$k->nip)->first();
                    $peg_atasan = Pegawai::where('nip',Auth::user()->username)->first();
                    if($peg->sub_bidang == $peg_atasan->sub_bidang):
                        $str .= $i.". ".$k->nama."(".$k->ket.") <br>";
                    endif;
                    $i++;
                endforeach;
                return $str;
            })
        ->rawColumns(['spt','anggota'])
        ->make(true);
    }

    public function seksi_grid(Request $request)
    {
        $pegawai = Pegawai::where('nip',Auth::user()->username)->first();
        // dd($pegawai);
        $kegiatan = DB::SELECT("SELECT DISTINCT(k.id),k.spt,
                                    concat( bentuk_kegiatan, ' ', judul_kegiatan ) AS kegiatan, p.sub_bidang, tanggal_mulai,tanggal_selesai, lokasi, is_barcode
                                    FROM
                                    kegiatan k
                                    LEFT JOIN kegiatan_personel kp ON k.id = kp.kegiatan_id 
                                    LEFT JOIN pegawai p ON kp.nip = p.nip
                                    WHERE p.sub_bidang = '".$pegawai->sub_bidang."' AND  k.bentuk_kegiatan <>  'PUSKOGAP' AND
                                    k.deleted_at IS NULL
                                    ORDER BY k.id DESC");
        return Datatables::of($kegiatan)
        ->editColumn('spt',function($i){
            if($i->is_barcode == 1):
                return '<a href="'.url('download/spt/'.$i->id).'" target="_blank">'.$i->spt.'</a>';
            else:
                return $i->spt;
            endif;
        })->addColumn('waktu_kegiatan',function($i){
            if($i->tanggal_mulai == $i->tanggal_selesai):
                return date("d F Y", strtotime($i->tanggal_mulai));
            else:
                return date("d F Y", strtotime($i->tanggal_mulai))." s/d ".date("d F Y", strtotime($i->tanggal_selesai));
            endif;
            })->addColumn('anggota',function($i){
                $kp = KegiatanPersonel::where('kegiatan_id',$i->id)->get();
                $i = 1;
                $str = '';
                foreach($kp as $k):
                    $peg = Pegawai::where('nip',$k->nip)->first();
                    $peg_atasan = Pegawai::where('nip',Auth::user()->username)->first();
                    if($peg->sub_bidang == $peg_atasan->sub_bidang):
                        $str .= "<span style='color:red;'> ".$i.". ".$k->nama."(".$k->ket.") </span> <br>";
                    else:
                        $str .= $i.". ".$k->nama."(".$k->ket.") <br>";
                    endif;
                    $i++;
                endforeach;
                return $str;
            })
        ->rawColumns(['spt','anggota'])
        ->make(true);
    }
}
