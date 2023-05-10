<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ProfilDamkar extends Model
{
    protected $table = 'profil_damkar';
    
    use LogsActivity;
    protected $guarded = ['id'];
}
