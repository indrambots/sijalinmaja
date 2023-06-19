<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SdmDamkar extends Model
{
    protected $table = 'sdm_damkar';
    
    use LogsActivity;
    protected $guarded = ['id'];
}
