<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kasandra extends Model
{
    protected $table   = 'kasandra';

    public function kasus()
    {
        return $this->hasOne('App\KasusKasandra', 'kasandra_id', 'id');
    }

}
