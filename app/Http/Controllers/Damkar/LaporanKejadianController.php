<?php

namespace App\Http\Controllers\Damkar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\LaporanKejadian;
use App\Kecamatan;
use App\Kelurahan;
use App\Kota;
use Yajra\Datatables\Datatables;
use Intervention\Image\ImageManagerStatic as Image;
use DB;

class LaporanKejadianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $spm = DB::SELECT("SELECT
    ( SELECT COUNT(*) FROM laporan_kejadian WHERE respon_time <= 15 AND user_id = 1002 AND deleted_at IS NULL ) AS spm,
    ( SELECT COUNT(*) FROM laporan_kejadian WHERE user_id = 1002 AND deleted_at IS NULL ) AS semua,
    ( SELECT COUNT(*) FROM laporan_kejadian WHERE respon_time > 15 AND user_id = 1002 AND deleted_at IS NULL ) AS tidak")[0];
        $presentase = round($spm->spm/$spm->semua*100,2); 
        return view('pages.damkar.laporan_kejadian.index',compact('spm','presentase'));
    }

    public function create($id)
    {
        $kejadian = LaporanKejadian::find($id);
        $kecamatan = Kecamatan::where('kode_kab',Auth::user()->kota)->get();
        $kelurahan = Kelurahan::where('kode_kab',Auth::user()->kota)->get();
        $kota = Kota::find(Auth::user()->kota);
        return view('pages.damkar.laporan_kejadian.create',compact('kejadian','id','kecamatan','kelurahan','kota'));
    }

    public function delete(Request $request)
    {
        LaporanKejadian::find($request->id)->delete();
    }

    public function save(Request $request)
    {
        // dd($request->all());

        $region = DB::SELECT("SELECT
                                kec.nama AS kecamatan, kota.nama AS kota, kel.nama_desa AS kelurahan
                                FROM
                                master_kota kota INNER JOIN master_kecamatan kec ON kota.id = kec.kode_kab
                                INNER JOIN master_kelurahan kel ON kec.kode_kec = kel.kode_kec AND kel.kode_kab = kota.id
                                WHERE kota.id = ".Auth::user()->kota." AND kel.kode_kel = ".$request->kelurahan." AND kec.kode_kec = ".$request->kecamatan."
    ")[0];
        $dok = null;
        $dok2 = null;
        $kejadian = ($request->id !== "0") ? LaporanKejadian::find($request->id) : new LaporanKejadian();
        $kejadian->user_id = Auth::user()->id;
        $kejadian->judul = $request->judul;
        $kejadian->kecamatan = $request->kecamatan;
        $kejadian->kelurahan = $request->kelurahan;
        $kejadian->tanggal_kejadian = $request->tanggal_kejadian;
        $kejadian->jam_kejadian = $request->jam_kejadian;
        $kejadian->terima_berita = $request->terima_berita;
        $kejadian->berangkat = $request->berangkat;
        $kejadian->tiba = $request->tiba;
        $kejadian->respon_time = $request->respon_time;
        $kejadian->kembali = $request->kembali;
        $kejadian->lokasi_kejadian = $request->lokasi_kejadian;
        $kejadian->koordinat = $request->koordinat;
        $kejadian->jenis_kejadian = $request->jenis_kejadian;
        $kejadian->jenis_objek = $request->jenis_objek;
        $kejadian->sumber = $request->sumber;
        $kejadian->objek = json_encode($request->objek);
        $kejadian->korban = $request->korban;
        $kejadian->keterangan = $request->keterangan;
        $kejadian->nilai_kerugian = ($request->nilai_kerugian == 0) ? 0 : str_replace(',', '', $request->nilai_kerugian);
        $kejadian->jumlah_armada = $request->jumlah_armada;
        $kejadian->jumlah_personel = $request->jumlah_personel;
        $kejadian->kendala = $request->kendala;
        $kejadian->sumber_berita = $request->sumber_berita;
        $kejadian->kota = Auth::user()->kota;
        $kejadian->nama_kecamatan = $region->kecamatan;
        $kejadian->nama_kelurahan = $region->kelurahan;
        $kejadian->nama_kota = $region->kota;
        $kejadian->save();
        if($request->dokumentasi !== null):
            $dok = $this->uploadDokumentasi($request->dokumentasi,1,$kejadian->id);
        endif;
        if($request->dokumentasi_2 !== null):
            $dok2 = $this->uploadDokumentasi($request->dokumentasi_2,2,$kejadian->id);
        endif;
        LaporanKejadian::find($kejadian->id)->update([
            "dokumentasi" => $dok,
            "dokumentasi_2" => $dok2
        ]);
        return redirect('damkar/laporan-kejadian')->with('success', 'SUKSES');
    }

    public function datatable(Request $request)
    {
        // if($request->jenis == "-"):
        //     $kejadian = LaporanKejadian::where('user_id',Auth::user()->id)->get();
        // else:
        //     $kejadian = LaporanKejadian::where('user_id',Auth::user()->id)->where('jenis_kejadian',$request->jenis)->get();
        // endif;
            $query = LaporanKejadian::query();
            $query->when(request('jenis') !== '-', function ($q) {
                return $q->where('jenis_kejadian',request('jenis'));
            })->when(request('tanggal_awal') !== null, function ($q) {
                return $q->whereDate('tanggal_kejadian','>=',request('tanggal_awal'))->whereDate('tanggal_kejadian','<=',request('tanggal_akhir'));
            });
            $kejadian = $query->where('user_id',Auth::user()->id)->get();
        return Datatables::of($kejadian)
        ->addColumn('aksi',function($i){
            $btn_aksi = '<a href="'.url('damkar/laporan-kejadian/create/'.$i->id).'" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="flaticon-edit-1"></i></a><button onclick="deleteKejadian('.$i->id.')" type="button" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-trash-alt"></i></button>';
            return '<div class="btn-group mr-2" role="group" aria-label="First group">'.$btn_aksi.'</div>';
        })
        ->editColumn('terima_berita',function($i){
            return date("h.i", strtotime($i->terima_berita));
        })
        ->editColumn('berangkat',function($i){
            return date("h.i", strtotime($i->berangkat));
        })
        ->editColumn('tiba',function($i){
            return date("h.i", strtotime($i->tiba));
        })
        ->editColumn('kembali',function($i){
            return date("h.i", strtotime($i->kembali));
        })
        ->editColumn('objek',function($i){
            $objek = json_decode($i->objek);
            $i = 0;
            $str = "";
            if (!empty($objek)):
            $len = count($objek);
                foreach($objek as $a):
                    if ($i == $len - 1) {
                        $str .= $a;
                    }
                    else{

                        $str .= $a.", ";
                    }
                    $i++;
                endforeach;
            endif;
            return $str;
        })
        ->editColumn('waktu_kejadian',function($i){
            return $i->dateIndo($i->tanggal_kejadian)." pukul ".date("h.i", strtotime($i->jam_kejadian));
        })
        ->editColumn('respon_time',function($i){
            return $i->respon_time." menit";
        })
        ->addColumn('foto',function($i){
            if($i->dokumentasi == null || $i->dokumentasi == 'kejadian_0_dok_1.jpg' || $i->dokumentasi == 'kejadian_0_dok_1.png' ):
                return '<span class="label label-dark label-inline mr-2">Tidak Ada</span>';
            else:
                return '<a href="'.url('damkar/report/kejadian/dokumentasi/'.$i->id).'" target="_blank" class="btn btn-outline-primary">Download</a>';
            endif;
        })
        ->rawColumns(['aksi','foto','objek'])
        ->make(true);
    }

    protected function uploadDokumentasi($image,$ke,$id){
        $lap = LaporanKejadian::find($id);
        $filename = 'kejadian'.'_'.$id.'_dok_'.$ke.'.'.$image->extension();
        if($ke == 1):
            if($lap->dokumentasi !== null):
                unlink(storage_path('app/public/'.$filename));
            endif;
        else:
            if($lap->dokumentasi_2 !== null):
                unlink(storage_path('app/public/'.$filename));
            endif;
        endif;
        $destinationPath = storage_path('app/public');
        $img = Image::make($image->path());
        $img->resize(720, 480, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg')->save($destinationPath.'/'.$filename);
        return $filename;
    }
}
