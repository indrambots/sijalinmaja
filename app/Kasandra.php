<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kasandra extends Model
{
    use SoftDeletes;

    protected $table   = 'kasandra';

    public function kasus()
    {
        return $this->hasOne('App\KasusKasandra', 'kasandra_id', 'id');
    }

}
