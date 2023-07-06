<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Pti extends Model
{
    protected $table = 'pti';
    
    use SoftDeletes;
    use LogsActivity;
    protected $guarded = ['id'];
}
