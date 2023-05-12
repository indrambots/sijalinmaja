<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Pegawai;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">SIKARMAT
                    </a>
                </div>
            </div>
        </div>';
        $data = array();
        // dd(Auth::user()->pegawai);
        if(Auth::user()->level == 7 || Auth::user()->level == 5):
            array_push($data,$page['kegiatan'],$page['peta'],$page['kasus'],$page['damkarmat']);
        elseif(Auth::user()->level == 12):
            array_push($data,$page['damkarmat']);
        elseif(Auth::user()->level == 11):
            $damkar_check = User::where('kota',Auth::user()->kota)->get();
            if(count($damkar_check)  > 1 ):
                array_push($data,$page['kasus']);
            else:
                array_push($data,$page['kasus'],$page['damkarmat']);
            endif;
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
}
