<?php

use Illuminate\Support\Facades\Route;

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
Route::get('', 'HomeController@indexs')->name('home');

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
        Route::post('update-sarpras','Damkar\HomeController@sarpras_update');
        Route::post('update-sdm','Damkar\HomeController@sdm_update');

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
});
Route::prefix('report')->group(function(){
    Route::prefix('kegiatan')->group(function(){
        Route::get('seksi','Report\KegiatanController@seksi');
        Route::post('seksi-grid','Report\KegiatanController@seksi_grid');
    });
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
});

// Route::get('/foo', function () {
//     Artisan::call('storage:link');
// });
Auth::routes();
