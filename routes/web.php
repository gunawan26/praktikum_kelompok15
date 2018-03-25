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
    return view('welcome');
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
    Route::get('/dashboard',function(){
        return view('pemilik.dashboard');
    });
    // Route::get('/home', function () {
    //     return view('pemilik.home');     
    // });
});



// Route::group(['prefix' => 'admin','middleware'=>['auth','role:admin']], function () {

//     Route::get('/',function(){
//         return view('admin');
//     });
    
// });
// Route::group(['prefix' => 'member', 'middleware' => ['auth','role:member']], function(){
// 	Route::get('/', function(){
// 		return view('member');
// 	});
// });