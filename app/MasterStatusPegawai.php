<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterStatusPegawai extends Model
{
    use SoftDeletes;

    protected $table = 'master_status_pegawai';
    protected $guarded = array();
}
