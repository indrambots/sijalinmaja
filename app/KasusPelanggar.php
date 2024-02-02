<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class KasusPelanggar extends Model
{
    use LogsActivity;
    protected $guarded = ['id'];
    protected $table   = 'kasus_pelanggar';
    public $timestamps = false;

}
