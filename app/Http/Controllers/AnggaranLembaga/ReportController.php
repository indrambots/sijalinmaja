<?php

namespace App\Http\Controllers\AnggaranLembaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helpers;
use App\Kota;
use App\AnggaranProfilLembaga;
use App\AnggaranBidang;
use App\FormKegiatan;
use App\MasterKegiatan;
use App\FormSarpras;
use App\PenegakanPerda;
use App\JenisPelanggaran;
use App\Kota as MasterKota;
use Yajra\Datatables\Datatables;
use App\Helpers\AliasName;

class ReportController extends Controller
{
    /* khusus dinas */
    public function kelembagaanIndex(){

        return view('pages.anggaran-lembaga.report.kelembagaan');
    }

    /* khusus dinas */
    public function kelembagaanGrid(Request $request){

        $profil = AnggaranProfilLembaga::query();
        $profil->select('anggaran_profil_lembaga.*', 'kab.nama as kab_kota');
        $profil->join('master_kota as kab', 'kab.id', '=', 'anggaran_profil_lembaga.kab_kota_id');
        $profil = $profil->get()->toArray();

        return response()->json($profil);
    }

    /* khusus dinas */
    public function anggaran(){

        return view('pages.anggaran-lembaga.report.anggaran');
    }

    /* khusus dinas */
    public function anggaranGrid(){

        $query = AnggaranBidang::query();
        $query->select('anggaran_bidang.*', 'profil.nama_kepala_satuan', 'profil.golongan', 'profil.nomenlaktur', 'kab.nama as kab_kota');
        $query->join('anggaran_profil_lembaga as profil', 'profil.id', '=', 'anggaran_bidang.lembagaid');
        $query->join('master_kota as kab', 'kab.id', '=', 'profil.kab_kota_id');
        if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_dinas_dan_damkar){
            $query->where('profil.userid', auth()->user()->id);
        }
        $query = $query->get()->toArray();

        return response()->json($query);
    }

    /* khusus Admin & Provinsi */
    public function profilKelembagaanIndex(){

        return view('pages.anggaran-lembaga.report.profil-kelembagaan');

    }

    /* khusus Admin & Provinsi */
    public function profilKelembagaanGrid(){

        $query = MasterKota::select('master_kota.nama as nama_kota', 'p.*')
            ->leftJoin('anggaran_profil_lembaga as p', 'p.kab_kota_id', '=', 'master_kota.id')
            ->orderBy('master_kota.nama', 'ASC')
            ->get()
            ->toArray();

        return response()->json($query);
    }

    /* khusus Admin & Provinsi */
    public function satlinmasIndex(){

        $data = $this->reportSatlinmasQuery()
            ->orderBy('dat.total', 'desc')
            ->get()
            ->toArray();
        $total_satlinmas = 0;
        foreach($data as $dat){
            $total_satlinmas += $dat['total'];
        }
        $satlinmas_terbanyak = $data[0];

        return view('pages.anggaran-lembaga.report.anggota-satlinmas', compact('total_satlinmas', 'satlinmas_terbanyak'));
    }

    /* khusus Admin & Provinsi */
    public function satlinmasGrid(){

        $data = $this->reportSatlinmasQuery()
            ->orderBy('master_kota.nama', 'asc')
            ->get()
            ->toArray();

        return response()->json($data);
    }

    public function reportSatlinmasQuery(){

        $data = Kota::query();
        $data->select(
            'master_kota.id', 'master_kota.nama as nama_kota', 'dat.total',
            'dat.total_pria', 'dat.total_wanita'
        );
        $data->leftJoin(DB::raw("
            (
                SELECT
                    anggota.kotaid, count(*) AS total, A.total_pria, B.total_wanita
                FROM
                    anggota_satlinmas AS anggota
                LEFT JOIN (
                    SELECT
                        count(jenis_kelamin) AS total_pria, kotaid
                    FROM
                        anggota_satlinmas
                    WHERE jenis_kelamin = 'L'
                    GROUP BY kotaid
                ) A ON A.kotaid = anggota.kotaid
                LEFT JOIN (
                    SELECT
                        count(jenis_kelamin) AS total_wanita, kotaid
                    FROM
                        anggota_satlinmas
                    WHERE jenis_kelamin = 'P'
                    GROUP BY kotaid
                ) B ON B.kotaid = anggota.kotaid
                GROUP BY anggota.kotaid
            ) as dat
        "), function($query){
            $query->on('dat.kotaid', '=', 'master_kota.id');
        });
        $data->groupBy('master_kota.id');

        return $data;
    }

    /* khusus Admin & Provinsi */
    public function penegakanIndex(){

        $dataColumn = [
            [
                'caption' => "Jenis Pelanggaran",
                'dataField' => "jenis",
                'dataType' => "string",
                'width' => 400
            ]
        ];
        foreach(Helpers::listMonth() as $month){
            $month = [
                'caption' => $month['name'],
                'dataField' => $month['number'],
                'dataType' => "string",
            ];
            array_push($dataColumn, $month);
        }
        $dataColumn = json_encode($dataColumn);

        $total = PenegakanPerda::queryReport()
        ->groupBy('penegakan_perda.jenis_pelanggaran')
        ->orderBy('total', 'desc')
        ->first();

        $kota = Kota::orderBy('nama','asc')->get();

        return view('pages.anggaran-lembaga.report.penegakan-perda', compact('dataColumn', 'total', 'kota'));
    }

    /* khusus Admin & Provinsi */
    public function penegakanGrid(Request $request){

        $jenis = [];
        foreach($this->getListJenisPelanggaran() as $jn){
            $jn['jenis'] = ucwords($jn['jenis']);
            foreach(Helpers::listMonth() as $month){
                $jn[$month['number']] = '';
            }
            $jenis[$jn['jenis']] = $jn;
        }

        $query = PenegakanPerda::queryReport();
        if($request->kotaid){
            $query->where('u.kota', $request->kotaid);
        }
        $query->groupBy('penegakan_perda.jenis_pelanggaran', 'tanggal');
        $query->orderBy('penegakan_perda.jenis_pelanggaran', 'asc');
        $query = $query->get()->toArray();

        $tempData = [];
        foreach($query as $que){
            $que['jenis'] = ucwords($que['jenis']);
            $monthOnly = date_format(date_create($que['tanggal']), 'm');
            $tempData[$que['jenis']][$monthOnly] = $que['total'];
        }

        $data = [];
        foreach($jenis as $k_jenis => $j){
            if(isset($tempData[$k_jenis])){
                foreach($j as $k_j => $j_val){
                    if(isset($tempData[$k_jenis][$k_j])){
                        $j[$k_j] = $tempData[$k_jenis][$k_j];
                    }
                }
            }
            $data[] = $j;
        }

        return response()->json($data);
    }

    /* khusus Admin & Provinsi */
    public function sarprasIndex(){

        return view('pages.anggaran-lembaga.report.sarpras');
    }

    /* khusus Admin & Provinsi */
    public function sarprasGrid(){

        $data = Kota::select(
            'master_kota.id as kotaid', 'master_kota.nama as nama_kota',
            'dat.layak', 'dat.tidak_layak', 'dat.total'
        )->leftJoin(DB::raw('
            (
                SELECT
                    kota.id AS kotaid, kota.nama AS nama_kota,
                    sum(jumlah_layak) AS layak, sum(jumlah_tidak_layak) AS tidak_layak, sum(jumlah) AS total
                FROM
                    form_sarpras AS s
                INNER JOIN
                    users AS u ON u.id = s.user_id
                INNER JOIN
                    master_kota AS kota ON kota.id = u.kota
                GROUP BY kota.id
            ) as dat
        '), function($query){
            $query->on('dat.kotaid', '=', 'master_kota.id');
        })
        ->orderBy('master_kota.nama', 'asc')
        ->get()
        ->toArray();

        return response()->json($data);
    }

    public function sarprasDetail(Request $request){

        $query = FormSarpras::select('form_sarpras.*')
        ->join('users as u', 'u.id', '=', 'form_sarpras.user_id')
        ->where('u.kota', $request->kotaid)
        ->get()->toArray();
        $data = [];
        foreach($query as $q){
            $data[$q['formid']] = $q;
        }
        $kategori = Helpers::formSarpras();
        $html = view('pages.anggaran-lembaga.report.sarpras-detail', compact('data', 'kategori'))->render();

        return $html;
    }

    /* khusus Admin & Provinsi */
    public function trantibumIndex(){

        $dataColumn = [
            [
                'caption' => "Jenis Kegiatan",
                'dataField' => "nama_kegiatan",
                'dataType' => "string",
                'width' => 400
            ]
        ];
        foreach(Helpers::listMonth() as $month){
            $month = [
                'caption' => $month['name'],
                'dataField' => $month['number'],
                'dataType' => "string",
            ];
            array_push($dataColumn, $month);
        }
        $dataColumn = json_encode($dataColumn);

        $total = FormKegiatan::queryReport()
        ->groupBy('form_kegiatan.jenis_kegiatan')
        ->orderBy('total', 'desc')
        ->first();

        $kota = Kota::orderBy('nama','asc')->get();

        return view('pages.anggaran-lembaga.report.trantibum', compact('dataColumn', 'total', 'kota'));
    }

    /* khusus Admin & Provinsi */
    public function trantibumGrid(Request $request){

        $query = FormKegiatan::queryReport();
        if($request->kotaid){
            $query->where('u.kota', $request->kotaid);
        }
        $query->groupBy('form_kegiatan.jenis_kegiatan', 'tanggal');
        $query->orderBy('form_kegiatan.jenis_kegiatan');
        $query->orderBy('form_kegiatan.tanggal_kegiatan', 'DESC');
        $query = $query->get()->toArray();

        $jenisKegiatan = [];
        foreach($this->getListJenisKegiatan() as $jenis){
            $jenis['nama_kegiatan'] = ucwords($jenis['nama_kegiatan']);
            foreach(Helpers::listMonth() as $month){
                $jenis[$month['number']] = '';
            }
            $jenisKegiatan[$jenis['nama_kegiatan']] = $jenis;
        }

        $tempData = [];
        foreach($query as $que){
            $que['jenis_kegiatan'] = ucwords($que['jenis_kegiatan']);
            $monthOnly = date_format(date_create($que['tanggal']), 'm');
            $tempData[$que['jenis_kegiatan']][$monthOnly] = $que['total'];
        }

        $data = [];
        foreach($jenisKegiatan as $k_jenis => $j){
            if(isset($tempData[$k_jenis])){
                foreach($j as $k_j => $j_val){
                    if(isset($tempData[$k_jenis][$k_j])){
                        $j[$k_j] = $tempData[$k_jenis][$k_j];
                    }
                }
            }
            $data[] = $j;
        }

        return response()->json($data);
    }

    public function getListJenisKegiatan(){

        $data = MasterKegiatan::select('nama_kegiatan')
            ->groupBy('nama_kegiatan')
            ->orderBy('nama_kegiatan', 'asc')
            ->get()
            ->toArray();

        return $data;
    }

    public function getListJenisPelanggaran(){

        $data = JenisPelanggaran::select('jenis_pelanggaran as jenis')
            ->groupBy('jenis_pelanggaran')
            ->orderBy('jenis_pelanggaran', 'asc')
            ->get()
            ->toArray();

        return $data;
    }
}
