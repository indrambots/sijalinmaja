<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\MasterKegiatan;
use App\MasterBentukKegiatan;
use App\KegiatanPersonel;
use App\User;
use App\Kota;
use App\Pegawai;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Yajra\Datatables\Datatables;
use DB;
use Auth;

class KegiatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.kegiatan.index');
    }

    public function print($id,$barcode){
        $keg = Kegiatan::find($id);
        $katim = KegiatanPersonel::where('ket','KATIM')->where('kegiatan_id',$id)->first();
        $anggota = KegiatanPersonel::where('ket','<>','KATIM')->where('kegiatan_id',$id)->get();
        $bentuk_kegiatan = MasterBentukKegiatan::where('bentuk_kegiatan',$keg->bentuk_kegiatan)->first();
        if($barcode == "yes"):
            return view('pages.kegiatan.spt_barcode',compact('keg','bentuk_kegiatan','katim','anggota'));
        endif;
        return view('pages.kegiatan.spt_new',compact('keg','bentuk_kegiatan','katim','anggota'));
    }

    public function create($id)
    {
        $keg = Kegiatan::find($id);
        $kota = Kota::orderBy('nama','asc')->get();
        $bidang = DB::SELECT("SELECT DISTINCT(bidang) FROM master_kegiatan ORDER BY bidang ASC");
        $pegawai = Pegawai::where('tingkat','<',11)->where('jenis_pegawai','PNS')->orderBy('nama','asc')->get();
        $pegawai_all = Pegawai::where('id','>',0)->get();
        return view('pages.kegiatan.create',compact('kota','keg','id','bidang','pegawai','pegawai_all'));
    }

    public function laporan(Request $request){
        $image = $request->dokumentasi_1;
        dd($image);
        $dokumentasi_1 = $this->uploadDokumentasi($image,1,$request->id);
        $image = $request->file('dokumentasi_2');
        $dokumentasi_2 = $this->uploadDokumentasi($image,2,$request->id);
        $image = $request->file('dokumentasi_3');
        $dokumentasi_3 = $this->uploadDokumentasi($image,3,$request->id);
        Kegiatan::find($request->id)->update([
            'hasil_kegiatan' => $request->hasil_kegiatan,
            'dokumentasi_1' => $dokumentasi_1,
            'dokumentasi_2' => $dokumentasi_2,
            'dokumentasi_3' => $dokumentasi_3,
        ]);
        dd($request->all());

    }

    public function laporan_save(Request $request){
    }

    public function datatable(){
        $kegiatan = Kegiatan::all();
        return Datatables::of($kegiatan)
        ->addColumn('aksi',function($i){
            $btn_aksi = '<a href="'.url('kegiatan/create/'.$i->id).'" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="flaticon-edit-1"></i></a><button onclick="deleteKeg('.$i->id.',\''.$i->spt.'\')" type="button" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-trash-alt"></i></button>';
            $btn_print = '<a href="'.url('kegiatan/print/'.$i->id.'/no').'" type="button" target="_blank" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-print"></i></a>';
            if(Auth::user()->level == 6):
            $btn_print = '<a href="'.url('kegiatan/print/'.$i->id.'/yes').'" type="button" target="_blank" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-print"></i></a>';
            endif;
        $btn_upload_spt = '<button class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary" data-toggle="modal" data-target="#modal-upload" onclick="uploadBarcode('.$i->id.',\''.$i->link_spt.'\')"><i class="fas fa-upload"></i></button>';
        $btn_link_spt = '<a href="'.$i->link_spt.'" type="button" target="_blank" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-fingerprint"></i></a>';
        $btn_laporan = '';
        foreach($i->personel as $k):
            if(Auth::user()->username == $k->nip):
            $btn_laporan = '<button class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary" data-toggle="modal" data-target="#modal-laporan" onclick="laporan('.$i->id.')"><i class="fas fa-file-alt"></i></button>';
            endif;
        endforeach;
        if($i->link_spt !== null):
            $btn_print = $btn_link_spt;
        endif;
            if((int)Auth::user()->level == 9):
                if($i->created_by == (int)Auth::user()->id):
                    return '<div class="btn-group mr-2" role="group" aria-label="First group">'.$btn_aksi.$btn_print.$btn_laporan.'</div>';
                else:
                    return '<div class="btn-group mr-2" role="group" aria-label="First group">'.$btn_print.$btn_laporan.'</div>';
                endif;
            elseif((int)Auth::user()->level == 6):
                    return '<div class="btn-group mr-2" role="group" aria-label="First group">'.$btn_upload_spt.$btn_print.'</div>';
            else:
                return '<div class="btn-group mr-2" role="group" aria-label="First group">'.$btn_aksi.$btn_print.'</div>';
            endif;
        })->addColumn('waktu_kegiatan',function($i){
            if($i->tanggal_mulai == $i->tanggal_selesai):
                return date("d F Y", strtotime($i->tanggal_mulai));
            else:
                return date("d F Y", strtotime($i->tanggal_mulai))." s/d ".date("d F Y", strtotime($i->tanggal_selesai));
            endif;
        })->rawColumns(['aksi','waktu_kegiatan'])
        ->make(true);
    }

    public function save(Request $request){
        $bidang = MasterKegiatan::where('bidang',$request->bidang)->first();
        $spt = "094/".$request->spt."/".$bidang->nomor_bidang."/2023";
        $penanggung_jawab;

        foreach($request->personel as $p):
            if($p['jenis'] == 'KATIM'):
            $peg = Pegawai::where('nip',$p['nama'])->first();
                $penanggung_jawab = $peg->nama;
            endif;
        endforeach;
        if($request->id == 0):
            $kegiatan = new Kegiatan();
        else:
            $kegiatan = Kegiatan::find($request->id);
            KegiatanPersonel::where('kegiatan_id',$request->id)->delete();
        endif;
            $kegiatan->jenis_kegiatan = $request->jenis_kegiatan;
            $kegiatan->bidang         = $request->bidang;
            $kegiatan->bentuk_kegiatan = $request->bentuk_kegiatan;
            $kegiatan->judul_kegiatan = $request->nama_kegiatan;
            $kegiatan->seragam = $request->seragam;
            $kegiatan->penanggung_jawab = $penanggung_jawab;
            $kegiatan->spt = $spt;
            $kegiatan->no_urut_spt = $request->spt;
            $kegiatan->tanggal_mulai = date("Y-m-d", strtotime($request->tanggal_mulai));
            $kegiatan->tanggal_selesai = date("Y-m-d", strtotime($request->tanggal_selesai));
            $kegiatan->jam_mulai = $request->jam_mulai;
            $kegiatan->jam_app = $request->jam_app;
            $kegiatan->kota = $request->kota;
            $kegiatan->lokasi = $request->lokasi;
            $kegiatan->dasar_surat = $request->dasar_surat;
            $kegiatan->created_by = Auth::user()->id;
            $kegiatan->save();
        foreach($request->personel as $p):
            $peg = Pegawai::where('nip',$p['nama'])->first();
                KegiatanPersonel::create([
                    "kegiatan_id" => $kegiatan->id,
                    "nama"        => $peg->nama,
                    "nip"         => $peg->nip,
                    "pangkat"     => $peg->format_spt,
                    "ket"     => $p['jenis']
                ]);
        endforeach;
        return redirect('kegiatan')->with('success', 'DATA KEGIATAN BERHASIL TERSIMPAN');
    }

    public function update_link_spt(Request $request){
        // dd($request->all());
        Kegiatan::find($request->id)->update([
            "link_spt" => $request->link_spt
        ]);
        return redirect('kegiatan')->with('success', 'LINK SPT BERHASIL TERSIMPAN');
    }

    public function delete(Request $request){
        Kegiatan::find($request->id)->delete();
    }

    public function filter_bidang(Request $request){
        $kegiatan = MasterKegiatan::where('bidang',$request->bidang)->orderBy('nama_kegiatan','asc')->get();
        $bentuk_kegiatan = MasterBentukKegiatan::where('kegiatan_id',$kegiatan[0]->id)->orderBy('bentuk_kegiatan','asc')->get();
        $view_kegiatan         = (string) view('pages.kegiatan.ajax.jenis_kegiatan', compact('kegiatan'));
        $view_bentuk_kegiatan         = (string) view('pages.kegiatan.ajax.bentuk_kegiatan', compact('bentuk_kegiatan'));
        return response()->json(array('view_kegiatan' => $view_kegiatan,'view_bentuk_kegiatan' => $view_bentuk_kegiatan));
    }

    public function filter_kegiatan(Request $request){

        $kegiatan = MasterKegiatan::where('nama_kegiatan',$request->kegiatan)->orderBy('nama_kegiatan','asc')->where('bidang',$request->bidang)->first();
        $bentuk_kegiatan = MasterBentukKegiatan::where('kegiatan_id',$kegiatan->id)->orderBy('bentuk_kegiatan','asc')->get();
        $view_bentuk_kegiatan         = (string) view('pages.kegiatan.ajax.bentuk_kegiatan', compact('bentuk_kegiatan'));
        return response()->json(array('view_bentuk_kegiatan' => $view_bentuk_kegiatan));
    }

    protected function uploadDokumentasi($image,$ke,$id){
        $keg = Kegiatan::find($id);
        $spt =  str_replace("/","_",$keg->spt);
        $filename = $spt.'_'.'dok_'.$ke.'.'.$image->extension();
        $destinationPath = storage_path('app/dokumentasi');
        $img = Image::make($image->path());
        $img->resize(720, 480, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg')->save($destinationPath.'/'.$filename);
        return $filename;
    }
}
