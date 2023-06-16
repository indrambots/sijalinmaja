<?php

namespace App\Http\Controllers\Damkar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\LaporanKejadian;
use App\Kecamatan;
use App\Kelurahan;
use Yajra\Datatables\Datatables;
use Intervention\Image\ImageManagerStatic as Image;

class LaporanKejadianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.damkar.laporan_kejadian.index');
    }

    public function create($id)
    {
        $kejadian = LaporanKejadian::find($id);
        $kecamatan = Kecamatan::where('kode_kab',Auth::user()->kota)->get();
        $kelurahan = Kelurahan::where('kode_kab',Auth::user()->kota)->get();
        return view('pages.damkar.laporan_kejadian.create',compact('kejadian','id','kecamatan','kelurahan'));
    }

    public function delete(Request $request)
    {
        LaporanKejadian::find($request->id)->delete();
    }

    public function save(Request $request)
    {
        // dd($request->all());
        $dok = null;
        $dok2 = null;
        // dd($request->all());
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
        $kejadian->save();
        if($request->dokumentasi !== null):
            $dok = $this->uploadDokumentasi($request->dokumentasi,1,$request->id);
        endif;
        if($request->dokumentasi !== null):
            $dok2 = $this->uploadDokumentasi($request->dokumentasi_2,2,$request->id);
        endif;
        LaporanKejadian::find($kejadian->id)->update([
            "dokumentasi" => $dok,
            "dokumentasi_2" => $dok2
        ]);
        return redirect('damkar/laporan-kejadian')->with('success', 'SUKSES');
    }

    public function datatable()
    {
        $kejadian = LaporanKejadian::where('user_id',Auth::user()->id)->get();
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
            $len = count($objek);
            $str = "";
            foreach($objek as $a):
                if ($i == $len - 1) {
                    $str .= $a;
                }
                else{

                    $str .= $a.", ";
                }
                $i++;
            endforeach;
            return $str;
        })
        ->editColumn('waktu_kejadian',function($i){
            return $i->dateIndo($i->tanggal_kejadian)." pukul ".date("h.i", strtotime($i->jam_kejadian));
        })
        ->editColumn('respon_time',function($i){
            return $i->respon_time." menit";
        })
        ->rawColumns(['aksi'])
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
