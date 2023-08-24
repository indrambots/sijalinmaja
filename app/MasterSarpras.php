<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterSarpras extends Model
{
    use SoftDeletes;

    protected $table = 'master_sarpras';
    protected $guarded = array();
}
