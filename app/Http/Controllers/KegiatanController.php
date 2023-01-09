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
            return '<button type="button" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary" >
                <i class="flaticon-edit-1"></i>
            </button>';
        })->addColumn('link',function($i){
            return '<button type="button" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary" >
                <i class="flaticon-edit-1"></i>
            </button>';
        })->addColumn('waktu_kegiatan',function($i){
            return $i->tanggal_mulai." ".$i->tanggal_selesai;
        })->rawColumns(['aksi','link','waktu_kegiatan'])
        ->make(true);
    }

    public function save(Request $request){
        if($request->id == 0):
            $kegiatan = new Kegiatan();
        else:
            $kegiatan = Kegiatan::find($request->id);
        endif;
            $kegiatan->save();
    }

    public function delete(Request $request){

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
