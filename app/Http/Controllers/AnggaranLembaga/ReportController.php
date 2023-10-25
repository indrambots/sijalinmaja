<?php

namespace App\Http\Controllers\AnggaranLembaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AnggaranProfilLembaga;
use App\AnggaranBidang;
use Yajra\Datatables\Datatables;
use App\Helpers\AliasName;

class ReportController extends Controller
{
    public function kelembagaanIndex(){

        return view('pages.anggaran-lembaga.report.kelembagaan');
    }

    public function kelembagaanGrid(Request $request){

        $profil = AnggaranProfilLembaga::query();
        $profil->select('anggaran_profil_lembaga.*', 'kab.nama as kab_kota');
        $profil->join('master_kota as kab', 'kab.id', '=', 'anggaran_profil_lembaga.kab_kota_id');
        $profil = $profil->get()->toArray();

        return response()->json($profil);
    }

    public function anggaran(){

        return view('pages.anggaran-lembaga.report.anggaran');
    }

    public function anggaranGrid(){

        $query = AnggaranBidang::query();
        $query->select('anggaran_bidang.*', 'profil.nama_kepala_satuan', 'profil.golongan', 'profil.nomenlaktur', 'kab.nama as kab_kota');
        $query->join('anggaran_profil_lembaga as profil', 'profil.id', '=', 'anggaran_bidang.lembagaid');
        $query->join('master_kota as kab', 'kab.id', '=', 'profil.kab_kota_id');
        if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_tim_kasus){
            $query->where('profil.userid', auth()->user()->id);
        }
        $query = $query->get()->toArray();

        return response()->json($query);
    }
}
