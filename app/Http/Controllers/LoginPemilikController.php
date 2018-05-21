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

    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    public function showloginpemilik(){

        if ($this->guard()->check()) {
            return redirect()->route('kendaraan.index');
        }
        return view('pemilik.auth.login');
    }



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

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    


    public function logout(Request $request){
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }


    

    protected function guard(){
        return Auth::guard('web_pemiliks');
    }

}
