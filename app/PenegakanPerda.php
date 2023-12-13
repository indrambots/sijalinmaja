<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class PenegakanPerda extends Model
{
    use SoftDeletes;

    protected $table = 'penegakan_perda';

    static function queryReport(){

        $query = PenegakanPerda::query();
        $query->select(
            'penegakan_perda.jenis_pelanggaran as jenis', 'kota.id as kotaid', 'kota.nama as nama_kota',
            DB::raw("DATE_FORMAT(penegakan_perda.tanggal_kegiatan,'%Y-%m') AS tanggal"), DB::raw('count(*) as total')
        );
        $query->join('users as u', 'u.id', '=', 'penegakan_perda.created_by');
        $query->join('master_kota as kota', 'kota.id', '=', 'u.kota');

        return $query;
    }
}
