<?php

namespace App\Http\Controllers\Damkar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\ProfilDamkar;
use App\SarprasDamkar;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profil = ProfilDamkar::where('user_id',Auth::user()->id)->first();
        $sarpras = SarprasDamkar::where('user_id',Auth::user()->id)->first();
        if(empty($profil)):
            $profil = ProfilDamkar::find(0);
            $sarpras = SarprasDamkar::find(0);
        endif;
        if(empty($sarpras)):
            $sarpras = SarprasDamkar::find(0);
        endif;
        return view('pages.damkar.index',compact('profil','sarpras'));   
    }

    public function sarpras_update(Request $request)
    {
        $sarpras = SarprasDamkar::where('user_id',Auth::user()->id)->first();

        if(empty($sarpras)):
            SarprasDamkar::create($request->all());
        else:
        endif;
    }

    public function profil_save(Request $request)
    {
        $profil = ProfilDamkar::where('user_id',Auth::user()->id)->first();
        if(!empty($profil)):
            ProfilDamkar::where('user_id',Auth::user()->id)->update([
                'user_id' => Auth::user()->id,
                'lembaga' => $request->lembaga,
                'nama_pd' => $request->nama_pd,
                'is_bergabung' => $request->is_bergabung,
                'nama_bidang' => ($request->is_bergabung == 0) ? null : $request->nama_bidang,
                'tipe' => $request->tipe,
                'ka_opd' => $request->ka_opd,
                'golongan' => $request->golongan,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'anggaran' => str_replace(',', '', $request->anggaran)
            ]);
        else:

            ProfilDamkar::create([
                'user_id' => Auth::user()->id,
                'lembaga' => $request->lembaga,
                'nama_pd' => $request->nama_pd,
                'is_bergabung' => $request->is_bergabung,
                'nama_bidang' => ($request->is_bergabung == 0) ? null : $request->nama_bidang,
                'tipe' => $request->tipe,
                'ka_opd' => $request->ka_opd,
                'golongan' => $request->golongan,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'anggaran' => str_replace(',', '', $request->anggaran),
            ]);
        endif;
        return redirect('damkar')->with('success_profil', 'SUKSES');
    }
}
