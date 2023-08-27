<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnggotaLinmas extends Model
{
    use SoftDeletes;

    protected $table = 'anggota_satlinmas';
    protected $guarded = array();
}
