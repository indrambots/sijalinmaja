<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnggaranBidang extends Model
{
    use SoftDeletes;

    protected $table = 'anggaran_bidang';
    protected $guarded = array();
}
