<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;

class DownloadController extends Controller
{
    
    public function download_spt($id)
    {
        $kegiatan = Kegiatan::where('id',$id)->first();
        $file_contents = base64_decode($kegiatan->link_spt);
        return response($file_contents)
                         ->header('Cache-Control', 'no-cache private')
                         ->header('Content-Description', 'File Transfer')
                         ->header('Content-Type', $kegiatan->mime)
                         ->header('Content-length', strlen($file_contents))
                         ->header('Content-Disposition', 'attachment; filename=bukti_dukung.'.$kegiatan->ext)
                         ->header('Content-Transfer-Encoding', 'binary');
    }
}
