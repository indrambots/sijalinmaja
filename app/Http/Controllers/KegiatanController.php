<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\MasterKegiatan;
use App\KegiatanPersonel;
use App\User;
use App\Kota;
use App\Pegawai;
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
        $pegawai = Pegawai::where('tingkat','<',11)->where('jenis_pegawai','PNS')->orderBy('tingkat','desc')->get();
        return view('pages.kegiatan.create',compact('kota','keg','id','bidang','pegawai'));
    }

    public function datatable(){

    }

    public function save(Request $request){

    }

    public function delete(Request $request){

    }

    public function filter_bidang(Request $request){

    }

    public function filter_kegiatan(Request $request){

    }
}
