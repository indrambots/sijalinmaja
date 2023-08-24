<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterTingkatJabatan extends Model
{
    use SoftDeletes;

    protected $table = 'master_tingkat_jabatan';
    protected $guarded = array();
}
