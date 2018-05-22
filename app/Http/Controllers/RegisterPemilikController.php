<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemilik;

use Illuminate\Support\Facades\Validator;

use Auth;

class RegisterPemilikController extends Controller
{

    protected $redirectpath ='pemilik/kendaraan';
    

    /* Fungsi ShowRegisterForm() untuk menampilkan halaman pendaftaran
    pemilik

    */
    public function ShowRegisterForm(){

        return view('pemilik.auth.register');
    }

    /* fungsi register(Request $request) untuk menjalankan beberapa fungsi yang ada
    seperti fungsi validator dan fungsi create, apabila semua data yang dimasukan benar
    maka akan menuju halaman dashboard pemilik */
    
    public function register(Request $request){
        //validasi data
        //dd($request);
        $this->validator($request->all())->validate();
        $foto_ktp = time().$request->ktp->getClientOriginalName();
        $request->ktp->storeAs('public/gambar_ktp',$foto_ktp);
        //membuat pemilik penyewa
        $pemilik = $this->create($request->all());

        // autentukasi penyewa
        $this->guard()->login($pemilik);

        //redirect penyewa

        return redirect($this->redirectpath);



    }

    /* Fungsi validator(array $data) merupakan fungsi
    untuk melakukan validasi pada tiap data pemilik 
    kendaraan yang ada,tergantung dari data tersebut

    */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pemiliks',
            'ktp' => 'required|image|mimes:jpeg,jpg,png,bmp',
            'no_telp' => 'required|string|max:18',
            'username' => 'required|string|max:30|unique:pemiliks',
            'password' => 'required|string|min:6|confirmed',
 
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Pemilk
     */
    /* Fungsi create(array $data) untuk memasukan semua data request
    kedalam variabel yang berada didalam array, yang nanti nilai tiap 
    variabel akan masuk ke database dengan eloquent
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
    /* Fungsi guard() untuk mengecek user yang melakukan login memilik role
    pemilik kendaraan pada dashboard pemilik
    */
    protected function guard(){
        return Auth::guard('web_pemiliks');
    }
}
