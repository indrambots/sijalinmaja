<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\ProfilDamkar;
use Auth;

class DownloadController extends Controller
{
    
    public function download_spt($id)
    {
        $kegiatan = Kegiatan::where('id',$id)->first();
        $tanggal = date('Ymd',strtotime($kegiatan->tanggal_mulai));
        $filename = $tanggal." SPT ".$kegiatan->judul_kegiatan.".".$kegiatan->ext;
        $file_contents = base64_decode($kegiatan->link_spt);
        return response($file_contents)
                         ->header('Cache-Control', 'no-cache private')
                         ->header('Content-Description', 'File Transfer')
                         ->header('Content-Type', $kegiatan->mime)
                         ->header('Content-length', strlen($file_contents))
                         ->header('Content-Disposition', 'attachment; filename='.$filename)
                         ->header('Content-Transfer-Encoding', 'binary');
    }

    public function spm_damkar()
    {
        $kegiatan = ProfilDamkar::where('user_id',Auth::user()->id)->first();
        $filename = " SPM ".$kegiatan->nama_pd.".".$kegiatan->ext;
        $file_contents = base64_decode($kegiatan->spm);
        return response($file_contents)
                         ->header('Cache-Control', 'no-cache private')
                         ->header('Content-Description', 'File Transfer')
                         ->header('Content-Type', $kegiatan->mime)
                         ->header('Content-length', strlen($file_contents))
                         ->header('Content-Disposition', 'attachment; filename='.$filename)
                         ->header('Content-Transfer-Encoding', 'binary');
    }
}
