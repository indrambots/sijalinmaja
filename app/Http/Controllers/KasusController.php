<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\JenisTrantib;
use App\Kota;
use App\Kecamatan;
use App\Kelurahan;
use App\Pd;
use App\Urusan;
use App\Kasandra;
use App\KasusKasandra;
use App\Kasus;
use App\SumberInformasi;
use App\HistoryVerif;
use App\KasusHistory;
use App\KasusPelanggar;
use Yajra\Datatables\Datatables;
use App\KasusSp3;

class KasusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kota = Kota::orderBy('nama','asc')->get();
        $opd = Pd::orderBy('nama','asc')->get();
        return view('pages.kasus.index', compact('kota','opd'));
    }

    public function create($id){
        $sumber = SumberInformasi::orderBy('nama','asc')->get();
        $urusan = Urusan::orderBy('nama','asc')->get();
        $kasus = Kasus::find($id);
        $kota = Kota::orderBy('nama','asc')->get();
        $kecamatan = Kecamatan::where('kode_kab',$kasus->kota)->get();
        $kelurahan = Kelurahan::where('kode_kab',$kasus->kota)->where('kode_kec',$kasus->kecamatan)->get();
        $kotaku = 0;
        if(Auth::user()->kota > 0):
            $kota = Kota::orderBy('nama','asc')->where('id',Auth::user()->kota)->get();
            $kotaku = Kota::find(Auth::user()->kota);
        endif;
        $pd = Pd::orderBy('nama','asc')->get();
        $jenis_trantib = JenisTrantib::where('urusan',$kasus->urusan)->get();
        return view('pages.kasus.create',compact('sumber','urusan','kota','pd','id','kasus','kecamatan','kelurahan','jenis_trantib','kotaku'));
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
        $kasus->status = ($request->id == 0) ? 0 : $kasus->status;
        $kasus->kota_nama = $kota->nama;
        $kasus->kec_nama = $kec->nama;
        $kasus->kel_nama = $kel;
        $kasus->deskripsi_kasus = $request->deskripsi_kasus;
        $kasus->user_id = Auth::user()->id;
        $kasus->save();
        $idkasus = $kasus->id;
        KasusPelanggar::where('kasus_id',$kasus->id)->delete();
        foreach($request->pelanggar as $p):
            KasusPelanggar::create([
                "nama" => $p['nama'],
                "nik" => $p['nik'],
                "jenis_kelamin" => $p['jenis_kelamin'],
                "alamat" => $p['alamat'],
                "kasus_id" => $idkasus
            ]);
        endforeach;
        return redirect('kasus')->with('success', 'Data Kasus Berhasil Ditambahkan');
    }

    public function delete(Request $request){
        Kasus::find($request->id)->delete();
    }

    public function datatable()
    {
        if(Auth::user()->level >= 11):
            $kasus = Kasus::where('id','>',0)->where('user_id',Auth::user()->id)->get();
        else:
            $kasus = Kasus::select('id','tanggal_informasi','pelapor','no_telp_pelapor','nama_pelanggar','nik_pelanggar','alamat_pelanggar','lokasi_kejadian','kel_nama','kec_nama','status','judul','tanggal_informasi','deskripsi_kasus','kewenangan','keterangan_kewenangan')->where('id','>',0)->where('user_id','<',800)->get();
        endif;
        return Datatables::of($kasus)
        ->addColumn('aksi',function($i){
            $btn_kasandra = '<button class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary" data-toggle="modal" data-target="#modal-kasandra" onclick="kasandra('.$i->id.')"><i class="fas fa-book"></i></button>';
            $btn_verif = '<button class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary" data-toggle="modal" data-target="#modal-verif" onclick="verifKasus('.$i->id.')"><i class="far fa-check-circle"></i></button>';
            $btn_aksi = '<a href="'.url('kasus/create/'.$i->id).'" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="flaticon-edit-1"></i></a><button onclick="deleteKasus('.$i->id.')" type="button" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-trash-alt"></i></button>';
            return '<div class="btn-group mr-2" role="group" aria-label="First group">'.$btn_kasandra.$btn_aksi.$btn_verif.'</div>';
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
        ->addColumn('history',function($i){
            return '<a target="_blank" class="btn btn-icon btn-xl btn-outline-info" href="'.url('kasus/history/'.$i->id).'" ><i class="fas fa-history"></i></a>';
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
                return '<span class="label label-lg label-primary label-pill label-inline font-weight-bolder mr-2" style="text-align:center; width:250px; height:fit-content;">DALAM PENANGANAN SATPOLPP PEMPROV</span>';
            }
            elseif($i->status == 5){
                return '<span class="label label-lg label-success label-pill label-inline font-weight-bolder mr-2" style="text-align:center; width:75px;">SELESAI</span>';
            }
            elseif($i->status == 6){
                return '<span class="label label-lg label-dark label-pill label-inline font-weight-bolder mr-2" style="text-align:center; width:75px;">UDK</span>';
            }
        })
        ->editColumn('kewenangan',function($i){
            if($i->kewenangan == 0){
                return '<span class="label label-lg label-warning label-pill label-inline font-weight-bolder mr-2"  style="text-align:center; width:100px;">BELUM VERIF</span>';
            }
            elseif($i->kewenangan == 1){
                return '<span class="label label-lg label-danger label-pill label-inline font-weight-bolder mr-2" style="text-align:center; width:75px;">PROVINSI</span> <br>'.$i->keterangan_kewenangan;
            }
            elseif($i->kewenangan == 2){
                return '<span class="label label-lg label-success label-pill label-inline font-weight-bolder mr-2" style="text-align:center; width:225px;">KAB/KOTA</span> <br>'.$i->keterangan_kewenangan;
            }
            elseif($i->kewenangan == 3){
                return '<span class="label label-lg label-primary label-pill label-inline font-weight-bolder mr-2" style="text-align:center; width:250px;">PUSAT</span> <br>'.$i->keterangan_kewenangan;
            }
        })
        ->rawColumns(['aksi','tanggal_informasi','data_pelapor','data_pelanggar','lokasi_kasus','deskripsi_kasus','status','history','kewenangan'])
        ->make(true);
    }

    public function show_verif(Request $request){
        $kasus = Kasus::find($request->id);
        return response()->json(array('kasus' => $kasus));

    }

    public function verif(Request $request){
        // dd($request->all());
        $kasus = Kasus::find($request->id);
        $kasus->status = $request->status;
        $kasus->kewenangan = $request->kewenangan;
        $kasus->keterangan_kewenangan = ($request->kewenangan == 1) ? $request->opd : $request->kota;
        $kasus->bidang  = $request->bidang;
        $kasus->tanggal_pembahasan_ba  = $request->tanggal_pembahasan_ba;
        $kasus->tanggal_ba  = $request->tanggal_ba;
        $kasus->pimpinan_ba  = $request->pimpinan_ba;
        $base64 = null;
        $mime = null;
        $ext = null;
        $base64_bukti = null;
        $mime_bukti = null;
        $ext_bukti = null;
        if($request->file('ba') !== null):
            $path = $request->file('ba')->getRealPath();
            $ext = $request->ba->extension();
            $doc = file_get_contents($path);
            $base64 = base64_encode($doc);
            $mime = $request->file('ba')->getClientMimeType();
            $kasus->ba = $base64;
            $kasus->ext = $ext;
            $kasus->mime = $mime;
        endif;
        if($request->file('bukti_selesai') !== null):
            $path = $request->file('bukti_selesai')->getRealPath();
            $ext_bukti = $request->bukti_selesai->extension();
            $doc = file_get_contents($path);
            $base64_bukti = base64_encode($doc);
            $mime_bukti = $request->file('bukti_selesai')->getClientMimeType();
            $kasus->bukti_selesai = $base64_bukti;
            $kasus->ext = $ext;
            $kasus->mime = $mime;
        endif;
        $kasus->save();
        HistoryVerif::create([
            'kasus_id' => $request->id,
            'status' => $request->status,
            'kewenangan' => $request->kewenangan,
            'bidang'     => $request->bidang,
            'keterangan_kewenangan' => ($request->kewenangan == 1) ? $request->opd : $request->kota,
            'tanggal' => date("Y-m-d H:i:s", strtotime('+7 hours')),
        ]);

        KasusHistory::create([
            'tanggal' => date("Y-m-d"),
            'created_at' => date("Y-m-d H:i:s", strtotime('+7 hours')),
            'kasus_id' => $request->id,
            'oleh'     => 'SATPOL PP PROV JATIM',
            'keterangan' => 'Berita Acara sidang internal dengan hasil kewenangan kasus dan status kasus',
            'data_pendukung' => $base64,
            'mime' => $mime,
            'ext'   => $ext
        ]);

        return redirect('kasus')->with('success_verif', 'Berhasil Verifikasi Kasus');
    }

    public function kasandra_list($id){
        $id = $id;
        $kasandra = Kasandra::where('user_id',5)->get();
        if(Auth::user()->level > 10 ):
            $kasandra = Kasandra::where('user_id',Auth::user()->id)->get();
        endif;
        return view('pages.kasus.popup.kasandra',compact('id','kasandra'));
    }

    public function show_kasandra(Request $request){
        $kasandra = KasusKasandra::where('kasus_id',$request->id)->get();
        $view = (string) view('ajax.show_kasandra', compact('kasandra'));
        return response()->json(array('view' => $view));

    }

    public function kasandra_save(Request $request)
    {
        $kasus = KasusKasandra::where('kasus_id',$request->id)->get();
        if(count($kasus) > 0):
            KasusKasandra::where('kasus_id',$request->id)->delete();
            foreach($request->kasandra as $k):
                KasusKasandra::create([
                'kasus_id' => $request->id,
                'kasandra_id' => $k]);
            endforeach;
        else:
            foreach($request->kasandra as $k):
                KasusKasandra::create([
                'kasus_id' => $request->id,
                'kasandra_id' => $k]);
            endforeach;
        endif;
    }

    public function history($id)
    {
        $kasus = Kasus::where('id',$id)->with(['history' => function ($q) {
            $q->orderBy('created_at', 'asc');
        }])->first();
        // dd($kasus->history);
        return view('pages.kasus.history',compact('kasus'));
    }

    public function history_create(Request $request){
        $history = KasusHistory::find($request->id);
        return response()->json(array('history' => $history));
    }

    public function history_save(Request $request){

        if($request->id == 0):
            $history = new KasusHistory();
        else:
            $history = KasusHistory::find($request->id);
        endif;
        if($request->data_pendukung !== null)
        {
            $path = $request->file('data_pendukung')->getRealPath();
            $ext = $request->data_pendukung->extension();
            $doc = file_get_contents($path);
            $base64 = base64_encode($doc);
            $mime = $request->file('data_pendukung')->getClientMimeType();
            $history->data_pendukung = $base64;
            $history->ext = $ext;
            $history->mime = $mime;
        }
        $history->tanggal = $request->tanggal;
        $history->oleh = $request->oleh;
        $history->keterangan = $request->keterangan;
        $history->kasus_id = $request->kasus_id;
        $history->save();
        return redirect('kasus/history/'.$request->kasus_id)->with('success', 'History');
    }

    public function sp3_create($id)
    {
        $sp3 = KasusSp3::find($id);
        return response()->json(array('sp3' => $sp3));
    }

    public function sp3_save(Request $request)
    {
        $sp3 = new KasusSp3();
        if($request->id > 0):
            $sp3 = KasusSp3::find($request->id);
        endif;
        $base64 = null;
        $mime = null;
        $ext = null;
        if($request->file('file') !== null):
            $path = $request->file('file')->getRealPath();
            $ext = $request->file->extension();
            $doc = file_get_contents($path);
            $base64 = base64_encode($doc);
            $mime = $request->file('file')->getClientMimeType();
            $sp3->file = $base64;
            $sp3->ext = $ext;
            $sp3->mime = $mime;
            $sp3->tanggal = $request->tanggal;
            $sp3->kasus_id = $request->kasus_id;
            $sp3->save();
        endif;

        return redirect('kasus/history/'.$sp3->kasus_id)->with('success', 'Berkas SP3 Berhasil Ditambahkan');
    }
}
