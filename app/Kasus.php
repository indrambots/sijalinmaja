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
    
    public function history()
    {
        return $this->hasMany('App\KasusHistory', 'kasus_id', 'id');
    }

    public function sp3()
    {
        return $this->hasOne('App\KasusSp3', 'kasus_id', 'id');
    }

    public function pelanggar()
    {
        return $this->hasMany('App\KasusPelanggar', 'kasus_id', 'id');
    }
}
