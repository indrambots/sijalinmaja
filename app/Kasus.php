<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Kasus extends Model
{
    use SoftDeletes;
    use LogsActivity;
    protected $guarded = ['id'];
    protected $table   = 'kasus';
    
}
