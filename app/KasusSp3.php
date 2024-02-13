<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class KasusSp3 extends Model
{
    use LogsActivity;
    protected $guarded = ['id'];
    protected $table   = 'kasus_sp3';

}
