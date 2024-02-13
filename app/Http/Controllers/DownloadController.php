<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\ProfilDamkar;
use App\Kasus;
use App\KasusHistory;
use Auth;

class DownloadController extends Controller
{
    
    public function download_spt($id)
    {
        $kegiatan = Kegiatan::where('id',$id)->first();
        $tanggal = date('Ymd',strtotime($kegiatan->tanggal_mulai));
        $filename = $tanggal." SPT ".$kegiatan->bentuk_kegiatan.".".$kegiatan->ext;
        $file_contents = base64_decode($kegiatan->link_spt);
        return response($file_contents)
                         ->header('Cache-Control', 'no-cache private')
                         ->header('Content-Description', 'File Transfer')
                         ->header('Content-Type', $kegiatan->mime)
                         ->header('Content-length', strlen($file_contents))
                         ->header('Content-Disposition', 'attachment; filename='.$filename)
                         // ("Content-Disposition: attachment; "filename=\"".$this->filename."\"")
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

    public function kasus_ba($id)
    {
        $kasus = Kasus::where('id',$id)->first();
        $file_contents = base64_decode($kasus->ba);
        return response($file_contents)
                         ->header('Cache-Control', 'no-cache private')
                         ->header('Content-Description', 'File Transfer')
                         ->header('Content-Type', $kasus->mime)
                         ->header('Content-length', strlen($file_contents))
                         ->header('Content-Disposition', 'attachment; filename=ba_kasus_id_'.$id.".".$kasus->ext)
                         // ("Content-Disposition: attachment; "filename=\"".$this->filename."\"")
                         ->header('Content-Transfer-Encoding', 'binary');
    }
 
    public function kasus_selesai($id)
    {
        $kasus = Kasus::where('id',$id)->first();
        $file_contents = base64_decode($kasus->bukti_selesai);
        return response($file_contents)
                         ->header('Cache-Control', 'no-cache private')
                         ->header('Content-Description', 'File Transfer')
                         ->header('Content-Type', $kasus->mime_selesai)
                         ->header('Content-length', strlen($file_contents))
                         ->header('Content-Disposition', 'attachment; filename=bukti_kasus_selesai'.$id.".".$kasus->ext_selesai)
                         // ("Content-Disposition: attachment; "filename=\"".$this->filename."\"")
                         ->header('Content-Transfer-Encoding', 'binary');
    }

    public function kasus_history($id){
        $history = KasusHistory::where('id',$id)->first();
        $file_contents = base64_decode($history->data_pendukung);
        return response($file_contents)
                         ->header('Cache-Control', 'no-cache private')
                         ->header('Content-Description', 'File Transfer')
                         ->header('Content-Type', $history->mime)
                         ->header('Content-length', strlen($file_contents))
                         ->header('Content-Disposition', 'attachment; filename=data_pendukung.'.$history->ext)
                         // ("Content-Disposition: attachment; "filename=\"".$this->filename."\"")
                         ->header('Content-Transfer-Encoding', 'binary');
    }
}
