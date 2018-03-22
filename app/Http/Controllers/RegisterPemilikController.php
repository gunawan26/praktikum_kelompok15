<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemilik;

use Illuminate\Support\Facades\Validator;

use Auth;

class RegisterPemilikController extends Controller
{

    protected $redirectpath ='pemilik_home';
    
    public function ShowRegisterForm(){

        return view('pemilik.auth.register');
    }


    public function register(Request $request){
        //validasi data
        $this->validator($request->all())->validate();

        //membuat pemilik penyewa
        $pemilik = $this->create($request->all());

        // autentukasi penyewa
        $this->guard()->login($pemilik);

        //redirect penyewa

        return redirect($this->redirectpath);



    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'ktp' => 'required|numeric',
            'no_telp' => 'required|string|max:18',
            'username' => 'required|string|max:30|unique:users',
            'password' => 'required|string|min:6|confirmed',
 
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Pemilk
     */
    protected function create(array $data)
    {
        return Pemilik::create([
            'nama_depan' => $data['nama_depan'],
            'nama_belakang' => $data['nama_belakang'],
            'email' => $data['email'],
            'ktp' => $data['ktp'],
            'no_telp' => $data ['no_telp'],
            'username' => $data ['username'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function guard(){
        return Auth::guard('web_pemiliks');
    }
}