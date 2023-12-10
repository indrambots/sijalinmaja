<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class FormKegiatan extends Model
{
    use SoftDeletes;

    protected $table = 'form_kegiatan';

    static function queryReport(){

        $query = FormKegiatan::query();
        $query->select(
            'kota.id AS kotaid', 'kota.nama AS nama_kota', DB::raw("count(*) as total"),
            'form_kegiatan.jenis_kegiatan',
            DB::raw("DATE_FORMAT(form_kegiatan.tanggal_kegiatan,'%Y-%m') as tanggal")
        );
        $query->join('users as u', 'u.id', '=', 'form_kegiatan.created_by');
        $query->join('master_kota as kota', 'kota.id', '=', 'u.kota');

        return $query;
    }
}
