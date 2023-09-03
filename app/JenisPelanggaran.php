<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisPelanggaran extends Model
{
    use SoftDeletes;

    protected $table = 'master_jenis_pelanggaran';
}
