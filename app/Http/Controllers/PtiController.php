<?php

namespace App\Http\Controllers;
use App\Pegawai;
use Yajra\Datatables\Datatables;
use DB;
use App\Kegiatan;
use Auth;
use App\Pti;
use App\KehadiranPti;

use Illuminate\Http\Request;

class PtiController extends Controller
{
    public function index(){
        $kegiatan = Kegiatan::select('spt','bentuk_kegiatan','judul_kegiatan')->where('id','>',0)->orderBy('no_urut_spt','DESC')->get();
        return view('pages.pti.index',compact('kegiatan'));
    }

    public function create(Request $request){
        $pti = Pti::find($request->id);
        return response()->json(array('pti' => $pti));
    }

    public function filter_tanggal_spt(Request $request){
        $tanggal = Kegiatan::select('tanggal_mulai')->where('spt',$request->no)->first();
        return response()->json(array('tanggal' => $tanggal));
    }

    public function datatable(Request $request){
        $pti = Pti::where('id','>',0)->get();
        return Datatables::of($pti)
        ->addColumn('aksi',function($i){
            $btn_absen = '<button onclick="absen('.$i->id.')" type="button" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-book"></i></button>';
            $btn_aksi = '<button data-toggle="modal" data-target="#modal-create" onclick="create('.$i->id.')" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="flaticon-edit-1"></i></a>';
            $btn_delete = '<button onclick="deleteKeg('.$i->id.')" type="button" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-trash-alt"></i></button>';
            return '<div class="btn-group mr-2" role="group" aria-label="First group">'.$btn_absen.$btn_aksi.$btn_delete.'</div>';
        })
        ->addColumn('kehadiran',function($i){
            $kehadiran = DB::SELECT("SELECT p.nip FROM pegawai p WHERE p.nip NOT IN (
                                    SELECT nip 
                                    FROM kehadiran_pti k 
                                    WHERE k.pti_id = ".$i->id.")");
            if(count($kehadiran) == 0):
                return '<label> <span class="badge badge-warning">BELUM MELAKUKAN ABSEN</span> </label>';
            else:
                return '<label> <span class="badge badge-danger">'.count($kehadiran).'</span> </label>';
            endif;
        })
        ->editColumn('tanggal',function($i){
            return date("d F Y", strtotime($i->tanggal));
        })->rawColumns(['aksi','kehadiran'])
        ->make(true);
    }

    public function save(Request $request){
        if($request->id == 0):
            $pti = new Pti();
        else:
            $pti = Pti::find($request->id);
        endif;
        $nama_keg = $request->nama_kegiatan;
        if($request->jenis == 'spt'):
            $spt = Kegiatan::select('bentuk_kegiatan','judul_kegiatan')->where('spt',$request->spt)->first();
            $nama_keg = $spt->bentuk_kegiatan." ".$spt->judul_kegiatan;
        endif;
        $pti->jenis          = $request->jenis;
        $pti->spt            = $request->spt;
        $pti->nama_kegiatan  = $nama_keg;
        $pti->keterangan     = $request->keterangan;
        $pti->tanggal        = $request->tanggal;
        $pti->save();
        return redirect('pti')->with('success', 'DATA KEGIATAN BERHASIL TERSIMPAN');

    }

    public function absen($id)
    {
        $pti = Pti::find($id);
        $id = $id;
        $sekret = Pegawai::where('bidang','SEKRETARIAT')->get();
        $tibum = Pegawai::where('bidang','KETENTRAMAN DAN KETERTIBAN UMUM')->get();
        $damkar = Pegawai::where('bidang','PEMADAM KEBAKARAN DAN PENYELAMATAN')->get();
        $gakda = Pegawai::where('bidang','PENEGAKAN PERATURAN DAERAH')->get();
        $linmas = Pegawai::where('bidang','PELINDUNGAN MASYARAKAT')->get();
        $spt = ($pti->spt !== null) ? DB::SELECT("SELECT p.nama,p.nip FROM pegawai p
                                                INNER JOIN kegiatan_personel kp ON p.nip = kp.nip
                                                INNER JOIN kegiatan k ON kp.kegiatan_id = k.id
                                                WHERE k.spt = '".$pti->spt."'") : null;
        $kehadiran = KehadiranPti::where('pti_id',$id)->get();
        return view('pages.pti.popup.absen',compact('kehadiran','sekret','tibum','damkar','gakda','linmas','id','pti','spt'));
    }

    public function absen_save(Request $request)
    {
        if(!empty($request->absen)):
            $absen = KehadiranPti::where('bidang',$request->bidang)->where('pti_id',$request->id)->delete();
        foreach($request->absen as $a):
            $peg = Pegawai::where('nip',$a)->first();
            KehadiranPti::create([
                'pti_id' => $request->id,
                'nip' => $peg->nip,
                'nama' => $peg->nama,
                'bidang' => $peg->bidang,
                'sub' => $peg->sub_bidang,
            ]);
        endforeach;
        else:
            $absen = KehadiranPti::where('bidang',$request->bidang)->where('pti_id',$request->id)->delete();
        endif;
        return redirect('pti/absen/'.$request->id)->with('success', 'ABSEN BERHASIL TERSIMPAN');
    }

    public function delete(Request $request)
    {
        Pti::find($request->id)->delete();
    }

}