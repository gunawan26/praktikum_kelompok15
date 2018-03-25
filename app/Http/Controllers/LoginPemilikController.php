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

    protected $redirectTo = '/pemilik/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    public function showloginpemilik(){

        if ($this->guard()->check()) {
            return redirect('pemilik/dashboard');
        }
        return view('pemilik.auth.login');
    }

    public function login(Request $request){
        
        $this->attemptlogin();
    }


    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email'=> 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function attemptlogin (Request $request){
        $this->validate($request, [
            'email'=> 'required|string',
            'password' => 'required|string',

        ]);

        if($this->guard()->attempt(['email' =>$request->email, 'password' =>$request->password], $request->filled('remember'))) {
            return redirect('pemilik/dashboard');
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


    
    // public function authenticate(Request $request){
    //     $password = $request->input('password');
    //     $name = $request->input('email');


    //     if (Auth::attempt(['email' => $email, 'password' => $password])){
    //         return redirect()->intended('pemilik.dashboard');
    //     }else{
    //         return redirect ('pemilik.login')->with('message','Error ketika login');
    //     }

    // }

    // public function loggout(){
    //     Auth::logout();
    // }
    protected function guard(){
        return Auth::guard('web_pemiliks');
    }

}
