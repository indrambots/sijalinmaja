<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormKegiatan extends Model
{
    use SoftDeletes;

    protected $table = 'form_kegiatan';
}
