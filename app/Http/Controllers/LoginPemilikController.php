<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginPemilikController extends Controller
{
    //
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

}
