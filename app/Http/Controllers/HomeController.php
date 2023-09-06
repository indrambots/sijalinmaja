<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Pegawai;
use Yajra\Datatables\Datatables;
use App\Kegiatan;
use App\Helpers\AliasName;
use App\MasterGolonganLembaga;
use App\AnggaranProfilLembaga;
use App\Kota;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexs()
    {
       return redirect('login');
    }
    public function index()
    {
        $page['peta'] = '<div class="col-6 col-lg-6 col-xl-6 mb-5">
            <div class="card card-custom wave wave-animate-fast wave-primary">
                <div class="card-body text-center">
                    <a href="'.url('peta').'">
                        <span class="svg-icon svg-icon-primary svg-icon-6x">
                            <i class="icon-6x text-info mb-10 mt-10 fa-solid flaticon-map-location" aria-hidden="true"></i>
                        </span>
                    </a>
                    <br>
                    <a href="'.url('peta').'"
                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">PEMETAAN
                    </a>
                </div>
            </div>
        </div>';
        $page['kegiatan'] = '<div class="col-6 col-lg-6 col-xl-6 mb-5">
            <div class="card card-custom wave wave-animate-fast wave-primary">
                <div class="card-body text-center">
                    <a href="'.url('kegiatan').'">
                        <span class="svg-icon svg-icon-primary svg-icon-6x">
                            <i class="icon-6x text-info mb-10 mt-10 fa-solid fas fa-people-arrows" aria-hidden="true"></i>
                        </span>
                    </a>
                    <br>
                    <a href="'.url('kegiatan').'"
                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">KEGIATAN
                    </a>
                </div>
            </div>
        </div>';
        $page['kasus'] = '<div class="col-6 col-lg-6 col-xl-6 mb-5">
            <div class="card card-custom wave wave-animate-fast wave-primary">
                <div class="card-body text-center">
                    <a href="'.url('kasus').'">
                        <span class="svg-icon svg-icon-primary svg-icon-6x">
                            <i class="icon-6x text-info mb-10 mt-10 fa-solid flaticon2-warning" aria-hidden="true"></i>
                        </span>
                    </a>
                    <br>
                    <a href="'.url('kasus').'"
                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">KASUS
                    </a>
                </div>
            </div>
        </div>';
        $page['damkarmat'] = '<div class="col-6 col-lg-6 col-xl-6 mb-5">
            <div class="card card-custom wave wave-animate-fast wave-primary">
                <div class="card-body text-center">
                    <a href="'.url('damkar').'">
                        <span class="svg-icon svg-icon-primary svg-icon-6x">
                            <i class="icon-6x text-info mb-10 mt-10 fa-solid flaticon-security" aria-hidden="true"></i>
                        </span>
                    </a>
                    <br>
                    <a href="'.url('damkar').'"
                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">SiDandiKeren
                    </a>
                </div>
            </div>
        </div>';
        $page['kegiatan_operator'] = '<div class="col-6 col-lg-6 col-xl-6 mb-5">
            <div class="card card-custom wave wave-animate-fast wave-primary">
                <div class="card-body text-center">
                    <a href="'.url('kegiatan').'">
                        <span class="svg-icon svg-icon-primary svg-icon-6x">
                            <i class="icon-6x text-info mb-10 mt-10 fa-solid fas fa-people-arrows" aria-hidden="true"></i>
                        </span>
                    </a>
                    <br>
                    <a href="'.url('kegiatan').'"
                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">KEGIATAN
                    </a>
                </div>
            </div>
        </div>';
        $page['rekap_kasus'] = '<div class="col-6 col-lg-6 col-xl-6 mb-5">
            <div class="card card-custom wave wave-animate-fast wave-primary">
                <div class="card-body text-center">
                    <a href="'.url('rekap/kasus').'">
                        <span class="svg-icon svg-icon-primary svg-icon-6x">
                            <i class="icon-6x text-info mb-10 mt-10 fa-solid fas fa-book" aria-hidden="true"></i>
                        </span>
                    </a>
                    <br>
                    <a href="'.url('rekap/kasus').'"
                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">REKAP KASUS
                    </a>
                </div>
            </div>
        </div>';
        $page['rekap_kegiatan'] = '<div class="col-6 col-lg-6 col-xl-6 mb-5">
            <div class="card card-custom wave wave-animate-fast wave-primary">
                <div class="card-body text-center">
                    <a href="'.url('rekap/kegiatan').'">
                        <span class="svg-icon svg-icon-primary svg-icon-6x">
                            <i class="icon-6x text-info mb-10 mt-10 fa-solid fas fa-book" aria-hidden="true"></i>
                        </span>
                    </a>
                    <br>
                    <a href="'.url('rekap/kegiatan').'"
                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">REKAP KEGIATAN
                    </a>
                </div>
            </div>
        </div>';
        $page['report_kegiatan'] = '<div class="col-6 col-lg-6 col-xl-6 mb-5">
            <div class="card card-custom wave wave-animate-fast wave-primary">
                <div class="card-body text-center">
                    <a href="'.url('rekap/kegiatan/personel').'">
                        <span class="svg-icon svg-icon-primary svg-icon-6x">
                            <i class="icon-6x text-info mb-10 mt-10 fa-solid far fa-file-excel" aria-hidden="true"></i>
                        </span>
                    </a>
                    <br>
                    <a href="'.url('rekap/kegiatan/personel').'"
                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">REPORT KEGIATANMU
                    </a>
                </div>
            </div>
        </div>';
        $page['user_setting'] = '<div class="col-6 col-lg-6 col-xl-6 mb-5">
            <div class="card card-custom wave wave-animate-fast wave-primary">
                <div class="card-body text-center">
                    <a href="'.url('user').'">
                        <span class="svg-icon svg-icon-primary svg-icon-6x">
                            <i class="icon-6x text-info mb-10 mt-10 fa-solid fas fa-user-circle" aria-hidden="true"></i>
                        </span>
                    </a>
                    <br>
                    <a href="'.url('user').'"
                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">USER SETTING
                    </a>
                </div>
            </div>
        </div>';
        $page['penugasan_staff'] = '<div class="col-6 col-lg-6 col-xl-6 mb-5">
            <div class="card card-custom wave wave-animate-fast wave-primary">
                <div class="card-body text-center">
                    <a href="'.url('report/kegiatan/seksi').'">
                        <span class="svg-icon svg-icon-primary svg-icon-6x">
                            <i class="icon-6x text-info mb-10 mt-10 fa-solid far fa-file-excel" aria-hidden="true"></i>
                        </span>
                    </a>
                    <br>
                    <a href="'.url('report/kegiatan/seksi').'"
                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">PENUGASAN STAFF
                    </a>
                </div>
            </div>
        </div>';
        $page['pti'] = '<div class="col-6 col-lg-6 col-xl-6 mb-5">
            <div class="card card-custom wave wave-animate-fast wave-primary">
                <div class="card-body text-center">
                    <a href="'.url('pti').'">
                        <span class="svg-icon svg-icon-primary svg-icon-6x">
                            <i class="icon-6x text-info mb-10 mt-10 fa-solid fas fa-user-secret" aria-hidden="true"></i>
                        </span>
                    </a>
                    <br>
                    <a href="'.url('pti').'"
                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">PTI
                    </a>
                </div>
            </div>
        </div>';
        $page['anggaran_lembaga'] = '<div class="col-6 col-lg-6 col-xl-6 mb-5">
            <div class="card card-custom wave wave-animate-fast wave-primary">
                <div class="card-body text-center">
                    <a href="'.url('anggaran').'">
                        <span class="svg-icon svg-icon-primary svg-icon-6x">
                            <i class="icon-6x text-info mb-10 mt-10 fa-solid fas fa-wallet" aria-hidden="true"></i>
                        </span>
                    </a>
                    <br>
                    <a href="'.url('anggaran').'"
                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">DATA KAB/KOTA
                    </a>
                </div>
            </div>
        </div>';
        $data = array();
        // dd(auth()->user()->pegawai);
        if(auth()->user()->level == AliasName::level_admin || auth()->user()->level == AliasName::level_satpolpp):
            array_push($data,
                $page['kegiatan'],
                $page['peta'],
                $page['kasus'],
                $page['damkarmat'],
                $page['rekap_kegiatan'],
                $page['user_setting'],
                $page['pti'],
                $page['rekap_kasus'],
                $page['anggaran_lembaga']
            );
        elseif(auth()->user()->level == AliasName::level_damkar):
            array_push($data,$page['damkarmat']);
        elseif(auth()->user()->level == AliasName::level_dinas):
            $damkar_check = User::where('kota',auth()->user()->kota)->get();
            if(count($damkar_check)  > 1 ):
                $profil = AnggaranProfilLembaga::where('userid', auth()->user()->id)->first();
                $golongan = MasterGolonganLembaga::all();
                $kota = Kota::orderBy('nama', 'asc')->get();

                return view('pages.anggaran-lembaga.dashboard-dinas', compact('profil', 'golongan', 'kota'));
            else:
                array_push($data,$page['kasus'],$page['damkarmat']);
            endif;
        elseif(auth()->user()->level == AliasName::level_aspri):
                array_push($data,$page['kegiatan'],$page['report_kegiatan']);
        elseif(auth()->user()->level == AliasName::level_operator):
                array_push($data,$page['kegiatan_operator'],$page['report_kegiatan']);
        elseif(auth()->user()->level <= AliasName::level_kabid):
                array_push($data,$page['rekap_kegiatan'],$page['report_kegiatan'],$page['kasus'],$page['peta']);
        elseif(auth()->user()->level == AliasName::level_kasi):
                array_push($data,$page['rekap_kegiatan'],$page['report_kegiatan'],$page['penugasan_staff']);
        elseif(auth()->user()->level == AliasName::level_staff):
                array_push($data,$page['report_kegiatan']);
        elseif(auth()->user()->level == AliasName::level_tim_kasus):
                array_push($data,$page['kasus'],$page['report_kegiatan'],$page['peta'],$page['rekap_kasus']);
        endif;
        if(auth()->user()->is_pti == 1):
                array_push($data,$page['pti']);
        endif;
        return view('home',compact('data'));
    }

    public function save_profil(Request $request){
        Pegawai::where('nip',$request->nip)->update([
            'no_telp' => $request->no_telp,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'email' => $request->email,
        ]);
        return redirect('')->with('success_profil', 'Profil Berhasil di Update');
    }

    public function kegiatan_datatable()
    {
        $kegiatan = DB::Select("SELECT k.*, p.ket, p.nip FROM `kegiatan` k INNER JOIN kegiatan_personel p ON k.id = p.kegiatan_id
                                WHERE p.nip = '".auth()->user()->username."' AND k.deleted_at IS NULL");
        return Datatables::of($kegiatan)
        ->addColumn('aksi',function($i){
            if($i->ket == 'PELAPORAN' || $i->ket == 'PESERTA + PELAPORAN' || $i->ket == 'KAOPSGAP'):
                return '<button class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary" data-toggle="modal" data-target="#modal-laporan" onclick="laporan('.$i->id.')"><i class="fas fa-file-alt"></i></button>';
            else:
                return '-';
            endif;
        })
        ->addColumn('kegiatan',function($i){
            return $i->bentuk_kegiatan." - ".$i->judul_kegiatan;
        })->addColumn('waktu_kegiatan',function($i){
        $func = new Kegiatan();
            return $func->dateIndo($i->tanggal_mulai)."<br>"."Pukul ".date("H.i", strtotime($i->jam_mulai));
        })->editColumn('link_spt',function($i){
            if($i->is_barcode !== null):
                return '<a href="'.url('download/spt/'.$i->id).'" type="button" target="_blank" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-print"></i></a>';
            else:
                return '<a href="'.url('kegiatan/print/'.$i->id.'/no').'" type="button" target="_blank" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-print"></i></a>';
            endif;
        })->rawColumns(['aksi','waktu_kegiatan','link_spt','aksi'])
        ->make(true);
    }

    public function tes_mail()
    {
        $data = array('name' => "Galih Wibisana");
        $data = [
        'name' => $data['name']
    ];
   
        Mail::to('chaidhargalihwibisana@gmail.com')->send(new SendEmail($data));
    }
}
