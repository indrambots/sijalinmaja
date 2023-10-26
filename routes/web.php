<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// URL::forceScheme('https');

Route::get('', 'LandingController@indexs')->name('home');
Route::get('kasandra', 'LandingController@kasandra')->name('kasandra');
Route::post('kasandra/search', 'LandingController@kasandra_search');
// Route::get('', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('profil/save','HomeController@save_profil');
Route::get('kegiatan-datatable','HomeController@kegiatan_datatable');
Route::get('test','TestController@index');

Route::prefix('kegiatan')->group(function () {

    Route::get('/', 'KegiatanController@index');
    Route::get('create/{id}','KegiatanController@create');
    Route::get('print/{id}/{barcode}','KegiatanController@print');
    Route::post('update-link-spt','KegiatanController@update_link_spt');
    Route::post('laporan','KegiatanController@laporan');
    Route::post('laporan/cek','KegiatanController@laporan_cek');
    Route::get('laporan/{id}','KegiatanController@laporan_view');
    Route::post('save','KegiatanController@save');
    Route::post('delete','KegiatanController@delete');
    Route::get('datatable','KegiatanController@datatable');
    Route::post('filter-bidang','KegiatanController@filter_bidang');
    Route::post('filter-kegiatan','KegiatanController@filter_kegiatan');
    Route::post('batalkan','KegiatanController@batalkan');
});

Route::prefix('kasus')->group(function () {
    Route::get('/', 'KasusController@index');
    Route::get('history/{id}', 'KasusController@history');
    Route::post('history/create', 'KasusController@history_create');
    Route::post('history/save', 'KasusController@history_save');
    Route::get('create/{id}','KasusController@create');
    Route::post('save','KasusController@save');
    Route::get('datatable','KasusController@datatable');
    Route::prefix('modal')->group(function () {
        Route::post('show-verif','KasusController@show_verif');
        Route::post('verif','KasusController@verif');
        Route::post('show-kasandra','KasusController@show_kasandra');
    });
    Route::post('delete','KasusController@delete');
});

Route::prefix('penanganan')->group(function () {
    Route::get('','PenangananController@index');
    Route::get('datatable','PenangananController@datatable');
});

Route::prefix('ajax')->group(function () {
    Route::post('filter-trantib','AjaxController@filter_trantib');
    Route::post('filter-kecamatan','AjaxController@filter_kecamatan');
    Route::post('filter-kelurahan','AjaxController@filter_kelurahan');
});
Route::prefix('user')->group(function () {
    Route::post('gantipassword','UserController@gantipassword');
});

Route::prefix('peta')->group(function () {
    Route::get('','PetaController@index');
});

Route::prefix('damkar')->group(function () {
    Route::get('','Damkar\HomeController@index');
    Route::get('peta','Damkar\HomeController@peta');
    Route::post('update-sarpras','Damkar\HomeController@sarpras_update');
    Route::post('update-sdm','Damkar\HomeController@sdm_update');
    Route::prefix('report')->group(function () {
        Route::get('kejadian','Damkar\ReportController@kejadian');
        Route::get('kejadian-non-kebakaran','Damkar\ReportController@kejadian_non_kebakaran');
        Route::get('kelembagaan','Damkar\ReportController@kelembagaan');
        Route::get('sarpras','Damkar\ReportController@sarpras');
        Route::post('kelembagaan-grid','Damkar\ReportController@kelembagaan_grid');
        Route::post('kejadian-grid','Damkar\ReportController@kejadian_grid');
        Route::post('kejadian-non-grid','Damkar\ReportController@kejadian_non_grid');
        Route::post('sarpras-grid','Damkar\ReportController@sarpras_grid');
        Route::get('sdm','Damkar\ReportController@sdm');
        Route::post('sdm-grid','Damkar\ReportController@sdm_grid');
        Route::get('kejadian/dokumentasi/{id}','Damkar\ReportController@view_dokumentasi');
    });

    Route::prefix('profil')->group(function () {
        Route::post('save','Damkar\HomeController@profil_save');
        Route::post('spm-save','Damkar\HomeController@spm_save');
    });

    Route::prefix('laporan-kejadian')->group(function () {
        Route::get('','Damkar\LaporanKejadianController@index');
        Route::get('create/{id}','Damkar\LaporanKejadianController@create');
        Route::post('save','Damkar\LaporanKejadianController@save');
        Route::post('delete','Damkar\LaporanKejadianController@delete');
        Route::get('datatable','Damkar\LaporanKejadianController@datatable');
    });
});

Route::prefix('popup')->group(function(){
    Route::get('kasandra-kasus/{id}','KasusController@kasandra_list');
    Route::post('kasandra-kasus/save','KasusController@kasandra_save');
});
Route::prefix('rekap')->group(function(){
    Route::prefix('kegiatan')->group(function(){
        Route::get('','Rekap\KegiatanController@index');
        Route::get('personel','Rekap\KegiatanController@personel');
        Route::post('personel-grid','Rekap\KegiatanController@personel_grid');
        Route::post('lapor-seksi','Rekap\KegiatanController@laporan_seksi');
        Route::post('lapor-bentuk','Rekap\KegiatanController@laporan_bentuk');
        Route::post('modal-bentuk','Rekap\KegiatanController@modal_bentuk');
        Route::post('modal-batal-seksi','Rekap\KegiatanController@modalBatalSeksi');
        Route::post('modal-batal-bentuk','Rekap\KegiatanController@modalBatalBentuk');
    });
    Route::get('datatable-rekap-kegiatan','Rekap\KegiatanController@datatable_rekap_kegiatan');
    Route::post('kegiatan-bidang','Rekap\KegiatanController@kegiatan_bidang');
    Route::prefix('kasus')->group(function(){
        Route::get('','Rekap\KasusController@index');
        Route::post('kasus-grid','Rekap\KasusController@kasus_grid');
    });
});
Route::prefix('report')->group(function(){
    Route::prefix('kegiatan')->group(function(){
        Route::get('seksi','Report\KegiatanController@seksi');
        Route::get('seksi-grid','Report\KegiatanController@seksi_grid');
        Route::get('datatable-puskogap','Report\KegiatanController@datatable_puskogap');
    });
});


Route::prefix('pti')->group(function(){
    Route::get('','PtiController@index');
    Route::post('filter-tanggal-spt','PtiController@filter_tanggal_spt');
    Route::post('create','PtiController@create');
    Route::post('save','PtiController@save');
    Route::post('delete','PtiController@delete');
    Route::get('datatable','PtiController@datatable');
    Route::post('absen-save','PtiController@absen_save');
    Route::get('absen/{id}','PtiController@absen');
    Route::post('laporan-personel','PtiController@laporan_personel');
    Route::get('laporan/{id}','PtiController@laporan');
});

Route::prefix('user')->group(function(){
    Route::get('','UserController@index');
    Route::get('datatable','UserController@datatable');
    Route::post('reset-password','UserController@reset_password');
    Route::post('update-level','UserController@update_level');
});

Route::prefix('download')->group(function(){
    Route::get('spt/{id}','DownloadController@download_spt');
    Route::get('spm-damkar','DownloadController@spm_damkar');
    Route::get('kasus-ba/{id}','DownloadController@kasus_ba');
    Route::get('kasus-history/{id}','DownloadController@kasus_history');
});

Route::prefix('anggaran')->group(function(){

    Route::get('','AnggaranLembaga\HomeController@index');
    Route::get('datatable','AnggaranLembaga\HomeController@anggaranDatatable');

    Route::prefix('kelembagaan')->group(function () {
        Route::get('','AnggaranLembaga\HomeController@kelembagaan');
        Route::post('profil-lembaga/store','AnggaranLembaga\HomeController@ProfilStore');
        Route::post('bidang/store','AnggaranLembaga\HomeController@AnggaranStore');
        Route::delete('bidang/delete/{id}','AnggaranLembaga\HomeController@AnggaranDelete');
        Route::post('profil/spm-save','AnggaranLembaga\HomeController@SpmStore');

        Route::get('pegawai-kab/datatable','AnggaranLembaga\PegawaiKabController@datatable');
        Route::get('pegawai-kab','AnggaranLembaga\PegawaiKabController@index');
        Route::get('pegawai-kab/create/{id}','AnggaranLembaga\PegawaiKabController@createOrEdit');
        Route::post('pegawai-kab/store','AnggaranLembaga\PegawaiKabController@storeOrUpdate');
        Route::delete('pegawai-kab/delete/{id}','AnggaranLembaga\PegawaiKabController@destroy');

        Route::get('sarpras','AnggaranLembaga\FormSarprasController@index');
        Route::post('sarpras/store','AnggaranLembaga\FormSarprasController@storeOrUpdate');

        Route::get('alokasi-anggaran','AnggaranLembaga\FormAlokasiAnggaranController@index');
        Route::post('alokasi-anggaran/store','AnggaranLembaga\FormAlokasiAnggaranController@storeOrUpdate');
    });

    Route::prefix('perlindungan')->group(function () {
        Route::get('','AnggaranLembaga\HomeController@perlindungan');
        Route::get('anggota-satlinmas/datatable','AnggaranLembaga\AnggotaSatlinmasController@datatable');
        Route::get('anggota-satlinmas','AnggaranLembaga\AnggotaSatlinmasController@index');
        Route::get('anggota-satlinmas/create/{id}','AnggaranLembaga\AnggotaSatlinmasController@createOrEdit');
        Route::post('anggota-satlinmas/store','AnggaranLembaga\AnggotaSatlinmasController@storeOrUpdate');
        Route::delete('anggota-satlinmas/delete/{id}','AnggaranLembaga\AnggotaSatlinmasController@destroy');
        Route::post('anggota-satlinmas/utility/getLocation','AnggaranLembaga\AnggotaSatlinmasController@getLocation');

        Route::get('posko-satlinmas/datatable','AnggaranLembaga\PoskoSatlinmasController@datatable');
        Route::get('posko-satlinmas','AnggaranLembaga\PoskoSatlinmasController@index');
        Route::get('posko-satlinmas/create/{id}','AnggaranLembaga\PoskoSatlinmasController@createOrEdit');
        Route::post('posko-satlinmas/store','AnggaranLembaga\PoskoSatlinmasController@storeOrUpdate');
        Route::delete('posko-satlinmas/delete/{id}','AnggaranLembaga\PoskoSatlinmasController@destroy');
    });

    Route::prefix('trantibum')->group(function () {
        Route::get('','AnggaranLembaga\HomeController@trantibum');
        Route::get('kegiatan/datatable','AnggaranLembaga\FormKegiatanController@datatable');
        Route::get('kegiatan','AnggaranLembaga\FormKegiatanController@index');
        Route::get('kegiatan/create/{id}','AnggaranLembaga\FormKegiatanController@createOrEdit');
        Route::post('kegiatan/store','AnggaranLembaga\FormKegiatanController@storeOrUpdate');
        Route::delete('kegiatan/delete/{id}','AnggaranLembaga\FormKegiatanController@destroy');
    });

    Route::prefix('penegakan')->group(function () {
        Route::get('','AnggaranLembaga\HomeController@penegakan');
        Route::get('perda/datatable','AnggaranLembaga\PenegekanPerdaController@datatable');
        Route::get('perda','AnggaranLembaga\PenegekanPerdaController@index');
        Route::get('perda/create/{id}','AnggaranLembaga\PenegekanPerdaController@createOrEdit');
        Route::post('perda/store','AnggaranLembaga\PenegekanPerdaController@storeOrUpdate');
        Route::delete('perda/delete/{id}','AnggaranLembaga\PenegekanPerdaController@destroy');

        Route::get('kasandra/datatable','AnggaranLembaga\KasandraController@datatable');
        Route::get('kasandra','AnggaranLembaga\KasandraController@index');
        Route::get('kasandra/create/{id}','AnggaranLembaga\KasandraController@createOrEdit');
        Route::post('kasandra/store','AnggaranLembaga\KasandraController@storeOrUpdate');
        Route::delete('kasandra/delete/{id}','AnggaranLembaga\KasandraController@destroy');
        Route::post('kasandra/utility/getUraian','AnggaranLembaga\KasandraController@getUraian');

        Route::prefix('instrumen')->group(function () {
            Route::get('','AnggaranLembaga\InstrumenPerdaController@index');
        });
    });

    Route::prefix('report')->group(function () {
        Route::get('','AnggaranLembaga\ReportController@anggaran');
        Route::post('anggaran-grid','AnggaranLembaga\ReportController@anggaranGrid');

        Route::get('kelembagaan','AnggaranLembaga\ReportController@kelembagaanIndex');
        Route::post('kelembagaan-grid','AnggaranLembaga\ReportController@kelembagaanGrid');
    });
});
Route::get('tes-mail','HomeController@tes_mail');

// Route::get('/foo', function () {
//     Artisan::call('storage:link');
// });
Auth::routes();
