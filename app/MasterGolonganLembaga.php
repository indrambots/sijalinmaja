<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterGolonganLembaga extends Model
{
    use SoftDeletes;

    protected $table = 'master_golongan_lembaga';
}
