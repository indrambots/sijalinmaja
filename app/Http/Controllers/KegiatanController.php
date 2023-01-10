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

    public function print($id){
        $keg = Kegiatan::find($id);
        return view('pages.kegiatan.spt_new',compact('keg'));
    }

    public function create($id)
    {
        $keg = Kegiatan::find($id);
        $kota = Kota::orderBy('nama','asc')->get();
        $bidang = DB::SELECT("SELECT DISTINCT(bidang) FROM master_kegiatan ORDER BY bidang ASC");
        $pegawai = Pegawai::where('tingkat','<',11)->where('jenis_pegawai','PNS')->orderBy('nama','asc')->get();
        return view('pages.kegiatan.create',compact('kota','keg','id','bidang','pegawai'));
    }

    public function datatable(){
        $kegiatan = Kegiatan::all();
        return Datatables::of($kegiatan)
        ->addColumn('aksi',function($i){
            return '  <div class="btn-group mr-2" role="group" aria-label="First group">
            <a href="'.url('kegiatan/create/'.$i->id).'" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary" >
                <i class="flaticon-edit-1"></i>
            </a>
        <a href="'.url('kegiatan/print/'.$i->id).'" type="button" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-print"></i></a>
        <button onclick="deleteKeg('.$i->id.',\''.$i->spt.'\')" type="button" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-trash-alt"></i></button>
    </div>';
        })->addColumn('personel',function($i){
            return '<button type="button" onclick="personel('.$i->id.')" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary" >
                <i class="fas fa-user-friends"></i>
            </button>';
        })->addColumn('waktu_kegiatan',function($i){
            return date("d F Y", strtotime($i->tanggal_mulai))." - ".date("d F Y", strtotime($i->tanggal_selesai));
        })->rawColumns(['aksi','personel','waktu_kegiatan'])
        ->make(true);
    }

    public function save(Request $request){
        $bidang = MasterKegiatan::where('bidang',$request->bidang)->first();
        $spt = "094/".$request->spt."/".$bidang->nomor_bidang."/2023";
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
            $kegiatan->penanggung_jawab = $request->penanggung_jawab;
            $kegiatan->spt = $spt;
            $kegiatan->no_urut_spt = $request->spt;
            $kegiatan->tanggal_mulai = date("Y-m-d", strtotime($request->tanggal_mulai));
            $kegiatan->tanggal_selesai = date("Y-m-d", strtotime($request->tanggal_selesai));
            $kegiatan->jam_mulai = $request->jam_mulai;
            $kegiatan->kota = $request->kota;
            $kegiatan->lokasi = $request->lokasi;
            $kegiatan->save();
        foreach($request->personel as $p):
            $peg = Pegawai::where('nip',$p['nama'])->first();
                KegiatanPersonel::create([
                    "kegiatan_id" => $kegiatan->id,
                    "nama"        => $peg->nama,
                    "nip"         => $peg->nip,
                    "pangkat"     => $peg->pangkat,
                    "ket"     => $p['jenis']
                ]);
        endforeach;
        return redirect('kegiatan')->with('success', 'DATA KEGIATAN BERHASIL TERSIMPAN');
    }

    public function delete(Request $request){
        Kegiatan::find($request->id)->delete();
    }

    public function filter_bidang(Request $request){
        $kegiatan = MasterKegiatan::where('bidang',$request->bidang)->get();
        $bentuk_kegiatan = MasterBentukKegiatan::where('kegiatan_id',$kegiatan[0]->id)->get();
        $view_kegiatan         = (string) view('pages.kegiatan.ajax.jenis_kegiatan', compact('kegiatan'));
        $view_bentuk_kegiatan         = (string) view('pages.kegiatan.ajax.bentuk_kegiatan', compact('bentuk_kegiatan'));
        return response()->json(array('view_kegiatan' => $view_kegiatan,'view_bentuk_kegiatan' => $view_bentuk_kegiatan));
    }

    public function filter_kegiatan(Request $request){

        $kegiatan = MasterKegiatan::where('nama_kegiatan',$request->kegiatan)->where('bidang',$request->bidang)->first();
        $bentuk_kegiatan = MasterBentukKegiatan::where('kegiatan_id',$kegiatan->id)->get();
        $view_bentuk_kegiatan         = (string) view('pages.kegiatan.ajax.bentuk_kegiatan', compact('bentuk_kegiatan'));
        return response()->json(array('view_bentuk_kegiatan' => $view_bentuk_kegiatan));
    }
}
