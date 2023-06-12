<?php

namespace App\Http\Controllers\Rekap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\MasterBidang;
use DB;
use App\Kegiatan;
use App\KegiatanPersonel;
use Auth;
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
        $progress_sudah = round($total_sudah/$grand->tot * 100,2);
        return view('pages.rekap.kegiatan.index',compact('bidang','kegiatan_bidang','grand','total_belum_laporan','total_sudah','progress','progress_sudah','total_batal'));
    }

    public function personel()
    {
        return view('pages.rekap.kegiatan.personel');
    }

    public function datatable_rekap_kegiatan(Request $request)
    {
        $bulancondition = ($request->bulan == '-') ? "" : "AND EXTRACT( MONTH FROM tanggal_mulai ) = '".$request->bulan."' ";
        $kegiatan = DB::SELECT("SELECT COUNT(id) AS total, bidang, sub_bidang FROM kegiatan WHERE deleted_at IS NULL AND id >0 ".$bulancondition." GROUP BY bidang, sub_bidang ORDER BY bidang ASC");
        $data = new Collection;
        foreach($kegiatan as $k):
            $blm = Kegiatan::select('id')->where('bidang',$k->bidang)->where('sub_bidang',$k->sub_bidang)->whereNull('hasil_kegiatan')->where('is_batal',0)->get();
            $batal = Kegiatan::select('id')->where('bidang',$k->bidang)->where('sub_bidang',$k->sub_bidang)->where('is_batal',1)->get();
            if($request->bulan !== '-'):
                $blm = Kegiatan::select('id')->where('bidang',$k->bidang)->where('sub_bidang',$k->sub_bidang)->whereNull('hasil_kegiatan')->where('is_batal',0)->whereMonth('tanggal_mulai',$request->bulan)->get();
                $batal = Kegiatan::select('id')->where('bidang',$k->bidang)->where('sub_bidang',$k->sub_bidang)->where('is_batal',1)->whereMonth('tanggal_mulai',$request->bulan)->get();
            endif;
            $btn_blm = "<button class='btn btn-warning' data-toggle='modal' data-target='#modal-laporan-seksi' onclick='belumLaporan(`".$k->bidang."`,`".$k->sub_bidang."`)'>".count($blm)."</button>";
            $btn_batal = "<button class='btn btn-danger' data-toggle='modal' data-target='#modal-batal-seksi' onclick='modalBatalSeksi(`".$k->sub_bidang."`)'>".count($batal)."</button>";
            $data->push([
                "bulancondition" => $request->bulan,
                "total" => $k->total,
                "bidang" => $k->bidang,
                "sub_bidang" => $k->sub_bidang,
                "belum_laporan" => $btn_blm,
                "batal" => $btn_batal,
            ]);
        endforeach;
        return Datatables::of($data)
        ->rawColumns(['belum_laporan','batal'])
        ->make(true);
    }


    public function personel_grid(Request $request)
    {
        $kegiatan = DB::SELECT("SELECT
    k.judul_kegiatan,
    k.is_batal,
    p.ket,
    k.jenis_kegiatan,
    k.bentuk_kegiatan,
    k.lokasi,
    k.penanggung_jawab,
    k.tanggal_mulai,
    k.tanggal_selesai,
    k.jam_mulai,
    k.spt
FROM
    kegiatan k
    INNER JOIN kegiatan_personel p ON k.id = p.kegiatan_id 
WHERE
    p.nip = '".Auth::user()->username."' AND k.deleted_at IS NULL");
        $data = new Collection;
        foreach($kegiatan as $k):
            $tanggal = "";
            // dd($k->kegiatan);
            if($k->tanggal_mulai == $k->tanggal_selesai):
                $tanggal = date("d F Y", strtotime($k->tanggal_mulai));
            else:
                $tanggal = date("d F Y", strtotime($k->tanggal_mulai))." s/d ".date("d F Y", strtotime($k->tanggal_selesai));
            endif;
            $data->push([
                'spt' => $k->spt,
                'jenis_kegiatan' => $k->jenis_kegiatan,
                'bentuk_kegiatan' => $k->bentuk_kegiatan,
                'judul_kegiatan' => $k->judul_kegiatan,
                'lokasi'        => $k->lokasi,
                'tanggal' => $tanggal,
                'penanggung_jawab' => $k->penanggung_jawab,
                'penugasan' => $k->ket,
                'status'           => ($k->is_batal == 0) ? 'Dilaksanakan' : 'Batal',
                'jam'              => date('H.i', strtotime($k->jam_mulai))
            ]);
        endforeach;
        return response()->json($data);
    }

    public function kegiatan_bidang(Request $request)
    {
        $bidangcondition = ($request->bidang == '-') ? "" : "AND bidang = '".$request->bidang."' ";
        $bulancondition = ($request->bulan == '-') ? "" : "AND EXTRACT( MONTH FROM tanggal_mulai ) = '".$request->bulan."' ";
        $bidang = $request->bidang;
        $kegiatan = DB::SELECT("SELECT COUNT(id) AS total, bentuk_kegiatan FROM kegiatan WHERE deleted_at IS NULL AND id >0 ".$bidangcondition." ".$bulancondition."GROUP BY bentuk_kegiatan ORDER BY bentuk_kegiatan ASC");
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
