<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kegiatan extends Model
{ 
    use SoftDeletes;
    use LogsActivity;
    protected $guarded = ['id'];
    protected $table = 'kegiatan';


}
