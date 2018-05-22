<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;


class LoginPemilikController extends Controller
{
    

    //use AuthenticatesUsers;

    protected $redirectTo = 'kendaraan.index';

    /* __construct() merupakan fungsi yang pertamakali dijalankan pada saat class diapnggil
    untuk melakukan pengecekan user pemilik sudah melakukan login atau belum*/
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    /*showLoginpemilik() untuk melakukan apakah session dari pemilik kendaraan masih atau tidak,
    jika masih maka akan di lakukan redirect menuju halaman dashboard pemilik, jika tidak
    maka akan menampilkan halaman login pemilik kendaraan*/

    public function showloginpemilik(){

        if ($this->guard()->check()) {
            return redirect()->route('kendaraan.index');
        }
        return view('pemilik.auth.login');
    }


/*
    Fungsu attemptlogin (Request $request) untuk mengecek pemilik kendaraan
    yang melakukan login, jika email dan password benar maka akan lanjut 
    ke halaman dashbaord pemilik



*/
    public function attemptlogin (Request $request){
        $this->validate($request, [
            'email'=> 'required|string',
            'password' => 'required|string',

        ]);

        if($this->guard()->attempt(['email' =>$request->email, 'password' =>$request->password], $request->filled('remember'))) {
            $pemilik = $this->guard()->user()->id;
            return redirect()->route('dashboard.home');
        }
        return $this->sendFailedLoginResponse($request);

    


    }

    /* Fungsi sendFailedLoginResponse(Request $request) untuk memberi
    notifikasi error jika email atau password yang diinputkan 
    salah
    */

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    

    /* fungsi logout(Request $request) untuk melakukan loggout pada
    pemilik kendaraan di halaman dashboard pemilik kendaraan
    */
    public function logout(Request $request){
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }


    
    /* Fungsi guard() untuk mengecek user yang melakukan login memilik role
    pemilik kendaraan pada dashboard pemilik
    */
    protected function guard(){
        return Auth::guard('web_pemiliks');
    }

}
