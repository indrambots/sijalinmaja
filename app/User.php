<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pegawai(){

        return $this->hasOne('App\Pegawai', 'nip', 'username');
    }

    public function getLevel($value)
    {
        if($value == 1):
            return 'KASAT / SEKRETARIS';
        elseif($value == 2):
            return 'KABID';
        elseif($value == 3):
            return 'KASI';
        elseif($value == 5):
            return 'SATPOLPP PROVINSI';
        elseif($value == 6):
            return 'ASPRI';
        elseif($value == 7):
            return 'ADMIN';
        elseif($value == 8):
            return 'OPERATOR KEGIATAN / SPT';
        elseif($value == 9):
            return 'STAFF';
        elseif($value == 10):
            return 'TIM KASUS / KASANDRA';
        elseif($value == 11):
            return 'PERANGKAT DAERAH';
        endif;
    }
}
