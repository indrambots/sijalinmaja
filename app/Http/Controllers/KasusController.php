<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisTrantib;
use App\Kota;
use App\Kecamatan;
use App\Kelurahan;
use App\Pd;
use App\Urusan;
use App\Kasus;
use App\SumberInformasi;
use Yajra\Datatables\Datatables;

class KasusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kota = Kota::orderBy('nama','asc')->get();
        return view('pages.kasus.index', compact('kota'));
    }

    public function create($id){
        $sumber = SumberInformasi::orderBy('nama','asc')->get();
        $urusan = Urusan::orderBy('nama','asc')->get();
        $kota = Kota::orderBy('nama','asc')->get();
        $pd = Pd::orderBy('nama','asc')->get();
        $kasus = Kasus::find($id);
        $kecamatan = Kecamatan::where('kode_kab',$kasus->kota)->get();
        $kelurahan = Kelurahan::where('kode_kab',$kasus->kota)->where('kode_kec',$kasus->kecamatan)->get();
        $jenis_trantib = JenisTrantib::where('urusan',$kasus->urusan)->get();
        return view('pages.kasus.create',compact('sumber','urusan','kota','pd','id','kasus','kecamatan','kelurahan','jenis_trantib'));
    }

    public function save(Request $request){

        $kota = Kota::find($request->kota);
        $kec = Kecamatan::where('kode_kab',$request->kota)->where('kode_kec',$request->kecamatan)->first();
        $kel = Kelurahan::where('kode_kab',$request->kota)->where('kode_kec',$request->kecamatan)->where('kode_kel',$request->kelurahan)->first();
        $kel = $kel->status_admin." ".$kel->nama_desa;
        $potensi_pad = str_replace(',', '', $request->potensi_pad);
        $kasus = new Kasus();
        if($request->id !== "0"):
            $kasus = Kasus::find($request->id);
        endif;
        $kasus->judul = $request->judul;
        $kasus->lokasi_kejadian = $request->lokasi_kejadian;
        $kasus->waktu_kejadian = $request->waktu_kejadian;
        $kasus->koordinat = $request->koordinat;
        $kasus->kota = $request->kota;
        $kasus->kecamatan = $request->kecamatan;
        $kasus->kelurahan = $request->kelurahan;
        $kasus->urusan = $request->urusan;
        $kasus->jenis_trantib = $request->jenis_trantib;
        $kasus->opd_pengampu = $request->opd_pengampu;
        $kasus->sumber_informasi = $request->sumber_informasi;
        $kasus->tanggal_informasi = $request->tanggal_informasi;
        $kasus->nomor_surat_link = $request->nomor_surat_link;
        $kasus->no_telp_pelapor = $request->no_telp_pelapor;
        $kasus->pelapor = $request->pelapor;
        $kasus->nama_pelanggar = $request->nama_pelanggar;
        $kasus->nik_pelanggar = $request->nik_pelanggar;
        $kasus->alamat_pelanggar = $request->alamat_pelanggar;
        $kasus->potensi_pad = ($request->potensi_pad == 0) ? 0 : $potensi_pad;
        $kasus->status = 0;
        $kasus->kota_nama = $kota->nama;
        $kasus->kec_nama = $kec->nama;
        $kasus->kel_nama = $kel;
        $kasus->deskripsi_kasus = $request->deskripsi_kasus;
        $kasus->save();
        return redirect('kasus')->with('success', 'Data Kasus Berhasil Ditambahkan');
    }

    public function datatable()
    {
        $kasus = Kasus::where('id','>',0)->get();
        return Datatables::of($kasus)
        ->addColumn('aksi',function($i){
            $btn_verif = '<button class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary" data-toggle="modal" data-target="#modal-upload" onclick="verifKasus('.$i->id.')"><i class="far fa-check-circle"></i></button>';
            $btn_aksi = '<a href="'.url('kasus/create/'.$i->id).'" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="flaticon-edit-1"></i></a><button onclick="deleteKasus('.$i->id.')" type="button" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-trash-alt"></i></button>';
            return '<div class="btn-group mr-2" role="group" aria-label="First group">'.$btn_aksi.$btn_verif.'</div>';
        })
        ->editColumn('tanggal_informasi',function($i){
            return date("d F Y", strtotime($i->tanggal_informasi));
        })
        ->addColumn('data_pelapor',function($i){
            return 'Pelapor : '.$i->pelapor.'<br> No telp Pelapor : '.$i->no_telp_pelapor;
        })
        ->addColumn('data_pelanggar',function($i){
            return 'Nama : '.$i->nama_pelanggar.'<br> NIK : '.$i->nik_pelanggar.'<br> Alamat : '.$i->alamat_pelanggar;
        })
        ->addColumn('lokasi_kasus',function($i){
            return $i->lokasi_kejadian.", ".ucfirst(strtolower($i->kel_nama)).", Kecamatan ".ucfirst(strtolower($i->kec_nama)).", ".ucfirst(strtolower($i->kota_nama));
        })
        ->editColumn('status',function($i){
            if($i->status == 0){
                return '<span class="label label-lg label-warning label-pill label-inline font-weight-bolder mr-2"  style="text-align:center; width:100px;">BELUM VERIF</span>';
            }
            elseif($i->status == 1){
                return '<span class="label label-lg label-danger label-pill label-inline font-weight-bolder mr-2" style="text-align:center; width:75px;">AKTIF</span>';
            }
            elseif($i->status == 2){
                return '<span class="label label-lg label-success label-pill label-inline font-weight-bolder mr-2" style="text-align:center; width:225px;">DITERUSKAN KAB/KOTA</span>';
            }
            elseif($i->status == 3){
                return '<span class="label label-lg label-primary label-pill label-inline font-weight-bolder mr-2" style="text-align:center; width:250px;">DALAM PENANGANAN OPD</span>';
            }
            elseif($i->status == 4){
                return '<span class="label label-lg label-primary label-pill label-inline font-weight-bolder mr-2" style="text-align:center; width:250px;">DALAM PENANGANAN SATPOLPP PEMPROV</span>';
            }
            elseif($i->status == 4){
                return '<span class="label label-lg label-success label-pill label-inline font-weight-bolder mr-2" style="text-align:center; width:75px;">SELESAI</span>';
            }
        })
        ->rawColumns(['aksi','tanggal_informasi','data_pelapor','data_pelanggar','lokasi_kasus','deskripsi_kasus','status'])
        ->make(true);
    }
}
