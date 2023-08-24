<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterJenisJabatan extends Model
{
    use SoftDeletes;

    protected $table = 'master_jenis_jabatan';
    protected $guarded = array();
}
