<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\MasterKegiatan;
use App\MasterBentukKegiatan;
use App\MasterBidang;
use App\KegiatanPersonel;
use App\User;
use App\Kota;
use App\SumberInformasi;
use App\Pegawai;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Yajra\Datatables\Datatables;
use DB;
use Auth;

class DokumentasiController extends Controller
{
    public function index(){
        $bidang = DB::SELECT("SELECT DISTINCT(bidang) FROM master_kegiatan ORDER BY bidang ASC");
        return view('pages.dokumentasi.index',compact('bidang'));
    }

    public function datatable(Request $request)
    {
        $kegiatan = Kegiatan::select('id','judul_kegiatan','spt', 'jenis_kegiatan', 'tanggal_mulai','tanggal_selesai', 'lokasi','kota','penanggung_jawab','is_barcode','created_by','hasil_kegiatan','is_batal')->where('id','>',0)->get();
        if($request->bidang !== '-'):
          $kegiatan =  Kegiatan::select('id','judul_kegiatan','spt', 'jenis_kegiatan', 'tanggal_mulai','tanggal_selesai', 'lokasi','kota','penanggung_jawab','is_barcode','created_by','hasil_kegiatan','is_batal')->where('bidang',$request->bidang)->where('id','>',0)->get();
          if($request->bidang == 'saya'):

          $kegiatan =  Kegiatan::select('id','judul_kegiatan','spt', 'jenis_kegiatan', 'tanggal_mulai','tanggal_selesai', 'lokasi','kota','penanggung_jawab','is_barcode','created_by','hasil_kegiatan','is_batal')->where('created_by',Auth::user()->id)->where('id','>',0)->get();
            endif;
        endif;
        return Datatables::of($kegiatan)
        ->addColumn('aksi',function($i){
            $btn_print = '<a href="'.url('dokumentasi/view/'.$i->id).'" type="button" target="_blank" class="btn btn-lg btn-success"><i class="fas fa-eye"></i> Lihat Dokumentasi</a>';
            if($i->hasil_kegiatan == null):
                $btn_print = '<span class="btn btn-lg btn-danger btn-hover-danger">BELUM ADA</span>';
            endif;
            return $btn_print;
        })->addColumn('waktu_kegiatan',function($i){
            if($i->tanggal_mulai == $i->tanggal_selesai):
                return date("d F Y", strtotime($i->tanggal_mulai));
            else:
                return date("d F Y", strtotime($i->tanggal_mulai))." s/d ".date("d F Y", strtotime($i->tanggal_selesai));
            endif;
        })->addColumn('status',function($i){
            if($i->is_batal == 0):
                if($i->is_barcode == NULL && $i->hasil_kegiatan == null):
                    return '<label> <span class="badge badge-danger">BELUM BARCODE & LAPORAN</span> </label>';
                elseif($i->is_barcode !== NULL && $i->hasil_kegiatan == null):
                    return '<label> <span class="badge badge-warning">BELUM LAPORAN</span> </label>';
                elseif($i->is_barcode !== NULL && $i->hasil_kegiatan <> null):
                    return '<a href="'.url('kegiatan/laporan/'.$i->id).'"><label> <span class="badge badge-success">LAPORAN SELESAI</span> </label></a>';
                elseif($i->is_barcode == NULL && $i->hasil_kegiatan <> null):
                    return '<label> <span class="badge badge-success">BELUM BARCODE</span> </label>';
                endif;
            else:
                return '<label> <span class="badge badge-danger">BATAL</span> </label>';
            endif;
        })->rawColumns(['aksi','waktu_kegiatan','status'])
        ->make(true);
    }

    public function view($id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('pages.kegiatan.laporan.dokumentasi',compact('kegiatan'));
    }
}
