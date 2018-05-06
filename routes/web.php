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



Route::get('/', 'HomeController@index')->name('menu');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/////////////////////// ROUTE UNTUK PEMILIK//////////////////////////////////////
Route::get('pemilik/login','LoginPemilikController@showloginpemilik');
Route::post('pemilik/login','LoginPemilikController@attemptlogin');
Route::get('pemilik/register','RegisterPemilikController@ShowRegisterForm');
Route::post('pemilik/register','RegisterpemilikController@register');
Route::post('pemilik/logout','LoginPemilikController@logout'); 
Route::get('/home/search','HomeController@searchAjax')->name('home.search');

Route::group(['prefix'=>'pemilik/dashboard','middleware'=> ['auth:web_pemiliks'] ],function(){
    Route::get('/home','KendaraanController@home')->name('dashboard.home');
    Route::get('/riwayat','KendaraanController@riwayat')->name('dashboard.riwayat');
    Route::get('/kendaraan','KendaraanController@kendaraan')->name('dashboard.kendaraan');
    Route::patch('/hapus/{kendaraan}','KendaraanController@hapus')->name('kendaraan.hapus');
    Route::resource('kendaraan', 'KendaraanController');    
    
});

Route::get('home/kendaraan/detail/{kendaraan}', 'TransaksiController@index')->name('detail.formview');
Route::group(['prefix' => 'home','middleware'=>['auth']], function () {
    
    Route::get('kendaraan/detail/{kendaraan}/transaksi', 'TransaksiController@createtransaksi')->name('transaksi.formview');
    Route::post('kendaraan/detail/{kendaraan}/transaksi','TransaksiController@storetransaksi')->name('transaksi.store');
    Route::get('kendaraan/detail/{kendaraan}/pembayaran/{transaksi}','PembayaranController@index')->name('pembayaran.formview');
    Route::post('kendaraan/detail/{kendaraan}/pembayaran/{transaksi}','PembayaranController@store')->name('pembayaran.store');
    Route::get('kendaraan/detail/{kendaraan}/pembayaran/{transaksi}/checkout','PembayaranController@show')->name('pembayaran.checkout');
});