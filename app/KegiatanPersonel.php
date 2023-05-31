<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
// use Illuminate\Database\Eloquent\SoftDeletes;

class KegiatanPersonel extends Model
{ 
    // use SoftDeletes;
    use LogsActivity;
    protected $guarded = ['id'];
    protected $table = 'kegiatan_personel';

public function konversi_nip($nip, $jenis,$batas = " ") {
        $nip = trim($nip," ");
        $panjang = strlen($nip);
        if($jenis == 'PNS'):
            if($panjang == 18) {
                $sub[] = substr($nip, 0, 8); // tanggal lahir
                $sub[] = substr($nip, 8, 6); // tanggal pengangkatan
                $sub[] = substr($nip, 14, 1); // jenis kelamin
                $sub[] = substr($nip, 15, 3); // nomor urut
                return $sub[0].$batas.$sub[1].$batas.$sub[2].$batas.$sub[3];
            } elseif($panjang == 15) {
                $sub[] = substr($nip, 0, 8); // tanggal lahir
                $sub[] = substr($nip, 8, 6); // tanggal pengangkatan
                $sub[] = substr($nip, 14, 1); // jenis kelamin
                 
                return $sub[0].$batas.$sub[1].$batas.$sub[2];
            } elseif($panjang == 9) {
                $sub = str_split($nip,3);
                 
                return $sub[0].$batas.$sub[1].$batas.$sub[2];
            } else {
                return $nip;
            }
        else:
            $sub[] = substr($nip,0, 3); // 3 digit pertama
            $sub[] = substr($nip,3,8); // digit kedua
            $sub[] = substr($nip,11, 6); // digit ketiga
            $sub[] = substr($nip,17, 4); // digit kedua
            return $sub[0]."-".$sub[1]."-".$sub[2]."-".$sub[3];
        endif;
    }
    public function pegawai(){

        return $this->hasOne('App\Pegawai', 'nip', 'nip');
    }

    public function kegiatan(){
        return $this->belongsTo('App\Kegiatan','kegiatan_id','id');
    
    }

}
