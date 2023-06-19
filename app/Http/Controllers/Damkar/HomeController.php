<?php

namespace App\Http\Controllers\Damkar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\ProfilDamkar;
use App\SarprasDamkar;
use App\SdmDamkar;

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
        $sdm = SdmDamkar::where('user_id',Auth::user()->id)->first();
        if(empty($profil)):
            $profil = ProfilDamkar::find(0);
            $sarpras = SarprasDamkar::find(0);
            $sdm = SdmDamkar::find(0);
        endif;
        if(empty($sarpras)):
            $sarpras = SarprasDamkar::find(0);
        endif;
        if(empty($sdm)):
            $sdm = SdmDamkar::find(0);
        endif;
        return view('pages.damkar.index',compact('profil','sarpras','sdm'));   
    }

    public function sdm_update(Request $request)
    {
        $sdm = SdmDamkar::where('user_id',Auth::user()->id)->first();

        if(empty($sarpras)):
            SdmDamkar::create($request->all());
        else:
            $req = $request->all();
            unset($req['_token']);
            SdmDamkar::where('user_id',Auth::user()->id)->update($request->all());
        endif;
        return redirect('damkar')->with('success_sdm', 'SUKSES');
    }

    public function sarpras_update(Request $request)
    {
        $sarpras = SarprasDamkar::where('user_id',Auth::user()->id)->first();
        if(empty($sarpras)):
            SarprasDamkar::create($request->all());
        else:
            $req = $request->all();
            unset($req['_token']);
            SarprasDamkar::where('user_id',Auth::user()->id)->update($req);
        endif;

        return redirect('damkar')->with('success_sarpras', 'SUKSES');
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

    public function spm_save(Request $request)
    {
        $path = $request->file('spm')->getRealPath();
        $ext = $request->spm->extension();
        $doc = file_get_contents($path);
        $base64 = base64_encode($doc);
        $mime = $request->file('spm')->getClientMimeType();
        $profil = ProfilDamkar::where('user_id',Auth::user()->id)->first();
        if(!empty($profil)):
            ProfilDamkar::where('user_id',Auth::user()->id)->update([
                'nilai_spm' => $request->nilai_spm,
                'spm' => $base64,
                'mime' => $mime,
                'ext'   => $ext
            ]);
        else:
            ProfilDamkar::create([
                'nilai_spm' => $request->nilai_spm,
                'spm' => $base64,
                'mime' => $mime,
                'ext'   => $ext
            ]);
        endif;
        return redirect('damkar')->with('success_spm', 'SUKSES');
    }
}
