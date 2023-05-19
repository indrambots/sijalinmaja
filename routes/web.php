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

if (env('APP_ENV') == 'production' ||env('APP_ENV') == 'prod' )
{URL::forceScheme('https');}
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
    Route::post('laporan/save','KegiatanController@laporan/save');
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

    Route::prefix('profil')->group(function () {
        Route::post('save','Damkar\HomeController@profil_save');
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
    Route::get('kegiatan','Rekap\KegiatanController@index');
});

Route::prefix('download')->group(function(){
    Route::get('spt/{id}','DownloadController@download_spt');
});

Auth::routes();
