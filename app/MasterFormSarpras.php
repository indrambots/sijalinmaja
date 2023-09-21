<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterFormSarpras extends Model
{
    use SoftDeletes;

    protected $table = 'master_form_sarpras';
    protected $guarded = array();
}
