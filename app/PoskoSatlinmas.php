<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PoskoSatlinmas extends Model
{
    use SoftDeletes;

    protected $table = 'posko_satlinmas';
    protected $guarded = array();
}
