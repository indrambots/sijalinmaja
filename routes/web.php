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

Route::get('/', 'HomeController@index')->name('home');
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
});            

Route::prefix('kasus')->group(function () {
    Route::get('/', 'KasusController@index');
    Route::get('create/{id}','KasusController@create');
    Route::post('save','KasusController@save');
    Route::get('datatable','KasusController@datatable');
    Route::prefix('modal')->group(function () {
        Route::post('show-verif','KasusController@show_verif');
        Route::post('verif','KasusController@verif');
    });
    Route::post('delete','KasusController@delete');
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

Route::prefix('popup')->group(function(){
    Route::get('kasandra-kasus/{id}','KasusController@kasandra_list');
    Route::post('kasandra-kasus/save','KasusController@kasandra_save');
});

Auth::routes();
