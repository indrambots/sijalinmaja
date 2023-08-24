<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnggaranProfilLembaga extends Model
{
    protected $table = 'anggaran_profil_lembaga';

    public function kabKOta()
    {
        return $this->belongsTo('App\Kota', 'kab_kota_id', 'id');
    }
}
