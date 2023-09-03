<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenegakanPerda extends Model
{
    use SoftDeletes;

    protected $table = 'penegakan_perda';
}
