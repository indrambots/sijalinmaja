<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PegawaiKab extends Model
{
    use SoftDeletes;

    protected $table = 'pegawai_kab';
    protected $guarded = array();
}
