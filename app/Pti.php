<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Pti extends Model
{
    protected $table = 'pti';
    
    use LogsActivity;
    protected $guarded = ['id'];
}
