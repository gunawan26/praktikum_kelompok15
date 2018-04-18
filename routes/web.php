<?php

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

Route::get('/', function () {
    return view('menu');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/////////////////////// ROUTE UNTUK PEMILIK//////////////////////////////////////
Route::get('pemilik/login','LoginPemilikController@showloginpemilik');
Route::post('pemilik/login','LoginPemilikController@attemptlogin');
Route::get('pemilik/register','RegisterPemilikController@ShowRegisterForm');
Route::post('pemilik/register','RegisterpemilikController@register');
Route::post('pemilik/logout','LoginPemilikController@logout'); 

Route::group(['prefix'=>'pemilik','middleware'=> ['auth:web_pemiliks'] ],function(){

    Route::patch('kendaraan/hapus/{kendaraan}','KendaraanController@hapus')->name('kendaraan.hapus');
    Route::resource('kendaraan', 'KendaraanController');    
    
});

Route::get('home/kendaraan/detail/{kendaraan}', 'TransaksiController@index')->name('detail.formview');
Route::group(['prefix' => 'home','middleware'=>['auth']], function () {
    
    Route::get('home/kendaraan/detail/{kendaraan}/transaksi', 'TransaksiController@index')->name('transaksi.formview');
   

});