<?php

namespace App\Http\Controllers\Rekap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MasterBidang;
use DB;
use App\Kegiatan;
use Yajra\Datatables\Datatables;

class KegiatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bidang = MasterBidang::select('bidang')->distinct('bidang')->get();
        $kegiatan_bidang = DB::SELECT("SELECT COUNT(id) AS total, bentuk_kegiatan FROM kegiatan WHERE deleted_at IS NULL AND id > 0 GROUP BY bentuk_kegiatan ORDER BY bentuk_kegiatan ASC");
        $grand = DB::SELECT("SELECT COUNT(id) AS tot FROM kegiatan WHERE deleted_at IS NULL AND id > 0")[0];
        $total_belum_laporan = DB::SELECT("SELECT COUNT(id) AS tot FROM kegiatan WHERE deleted_at IS NULL AND id > 0 AND hasil_kegiatan IS NULL AND is_batal = 0")[0];
        $total_batal = DB::SELECT("SELECT COUNT(id) AS tot FROM kegiatan WHERE deleted_at IS NULL AND id > 0 AND is_batal = 1 ")[0];
        $total_sudah = $grand->tot - $total_belum_laporan->tot;
        $progress = round($total_belum_laporan->tot/$grand->tot * 100,2);
        return view('pages.rekap.kegiatan.index',compact('bidang','kegiatan_bidang','grand','total_belum_laporan','total_sudah','progress','total_batal'));
    }

    public function datatable_rekap_kegiatan()
    {
        $kegiatan = DB::SELECT("SELECT COUNT(id) AS total, bidang, sub_bidang FROM kegiatan WHERE deleted_at IS NULL AND id >0 GROUP BY bidang, sub_bidang ORDER BY bidang ASC");
        return Datatables::of($kegiatan)
        ->addColumn('belum_laporan',function($i){
            $blm = Kegiatan::select('id')->where('bidang',$i->bidang)->where('sub_bidang',$i->sub_bidang)->whereNull('hasil_kegiatan')->where('is_batal',0)->get();
            return "<button class='btn btn-warning' data-toggle='modal' data-target='#modal-laporan-seksi' onclick='belumLaporan(`".$i->bidang."`,`".$i->sub_bidang."`)'>".count($blm)."</button>";
        })->addColumn('batal',function($i){
            $batal = Kegiatan::select('id')->where('bidang',$i->bidang)->where('sub_bidang',$i->sub_bidang)->where('is_batal',1)->get();
            return "<button class='btn btn-danger' data-toggle='modal' data-target='#modal-batal-seksi' onclick='modalBatalSeksi(`".$i->sub_bidang."`)'>".count($batal)."</button>";
        })->rawColumns(['belum_laporan','batal'])
        ->make(true);
    }

    public function kegiatan_bidang(Request $request)
    {
        $bidangcondition = ($request->bidang == '-') ? "" : "AND bidang = '".$request->bidang."' ";
        $bidang = $request->bidang;
        $kegiatan = DB::SELECT("SELECT COUNT(id) AS total, bentuk_kegiatan FROM kegiatan WHERE deleted_at IS NULL AND id >0 ".$bidangcondition." GROUP BY bentuk_kegiatan ORDER BY bentuk_kegiatan ASC");
        $view = (String) view('pages.rekap.kegiatan.ajax.rekap_bidang', compact('kegiatan','bidang'));
        return response()->json(array('view' => $view));

    }

    public function laporan_seksi(Request $request)
    {
        $kegiatan = Kegiatan::select('id','judul_kegiatan','spt', 'jenis_kegiatan', 'tanggal_mulai','tanggal_selesai', 'lokasi','kota','penanggung_jawab','is_barcode','created_by','hasil_kegiatan','is_batal')->where('sub_bidang',$request->sub_bidang)->whereNull('hasil_kegiatan')->where('id','>',0)->whereNull('deleted_at')->get();
        $view = (String) view('pages.rekap.kegiatan.ajax.modal_seksi', compact('kegiatan'));
        return response()->json(array('view' => $view));

    }

    public function modal_bentuk(Request $request)
    {
        $kegiatan = Kegiatan::select('id','judul_kegiatan','spt', 'jenis_kegiatan', 'tanggal_mulai','tanggal_selesai', 'lokasi','kota','penanggung_jawab','is_barcode','created_by','hasil_kegiatan','is_batal')->where('bidang',$request->bidang)->where('bentuk_kegiatan',$request->bentuk)->whereNull('hasil_kegiatan')->where('id','>',0)->whereNull('deleted_at')->get();
        if($request->bidang == '-'):
        $kegiatan = Kegiatan::select('id','judul_kegiatan','spt', 'jenis_kegiatan', 'tanggal_mulai','tanggal_selesai', 'lokasi','kota','penanggung_jawab','is_barcode','created_by','hasil_kegiatan','is_batal')->where('bentuk_kegiatan',$request->bentuk)->whereNull('hasil_kegiatan')->where('id','>',0)->whereNull('deleted_at')->get();
        endif;
        $view = (String) view('pages.rekap.kegiatan.ajax.modal_bentuk', compact('kegiatan'));
        return response()->json(array('view' => $view));
    }

    public function modalBatalSeksi(Request $request)
    {
        $kegiatan = Kegiatan::select('id','judul_kegiatan','spt', 'jenis_kegiatan', 'tanggal_mulai','tanggal_selesai', 'lokasi','kota','penanggung_jawab','is_barcode','created_by','hasil_kegiatan','is_batal')->where('sub_bidang',$request->sub_bidang)->where('is_batal',1)->get();
        $view = (String) view('pages.rekap.kegiatan.ajax.modal_batal_seksi', compact('kegiatan'));
        return response()->json(array('view' => $view));
    }

    public function modalBatalBentuk(Request $request)
    {
        $kegiatan = Kegiatan::select('id','judul_kegiatan','spt', 'jenis_kegiatan', 'tanggal_mulai','tanggal_selesai', 'lokasi','kota','penanggung_jawab','is_barcode','created_by','hasil_kegiatan','is_batal')->where('bidang',$request->bidang)->where('bentuk_kegiatan',$request->bentuk)->where('is_batal',1)->where('id','>',0)->whereNull('deleted_at')->get();
        if($request->bidang == '-'):
        $kegiatan = Kegiatan::select('id','judul_kegiatan','spt', 'jenis_kegiatan', 'tanggal_mulai','tanggal_selesai', 'lokasi','kota','penanggung_jawab','is_barcode','created_by','hasil_kegiatan','is_batal')->where('bentuk_kegiatan',$request->bentuk)->where('is_batal',1)->where('id','>',0)->whereNull('deleted_at')->get();
        endif;
        $view = (String) view('pages.rekap.kegiatan.ajax.modal_batal_bentuk', compact('kegiatan'));
        return response()->json(array('view' => $view));
    }
}
