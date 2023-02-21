<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class KasusKasandra extends Model
{
    use SoftDeletes;
    use LogsActivity;
    protected $guarded = ['id'];
    protected $table   = 'kasus_kasandra';
    
}
