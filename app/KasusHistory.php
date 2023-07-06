<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class KasusHistory extends Model
{
    use SoftDeletes;
    use LogsActivity;
    protected $guarded = ['id'];
    protected $table   = 'kasus_history';
    
    public function perda()
    {
        return $this->hasOne('App\Kasus', 'id', 'kasus_id');
    }
}
