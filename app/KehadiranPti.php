<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class KehadiranPti extends Model
{
    protected $table = 'kehadiran_pti';
    
    use LogsActivity;
    protected $guarded = ['id'];

    public function pti()
    {
        return $this->hasOne('App\Pti', 'id', 'pti_id');
    }
}
