<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SarprasDamkar extends Model
{
    protected $table = 'sarpras_damkar';
    
    use LogsActivity;
    protected $guarded = ['id'];
}
