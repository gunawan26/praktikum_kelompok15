<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
/* Fungsi loginContorller untuk melakukan login user penyewa kendaraan
*/
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }


    
    // public function authenticated(Request $request){
    //     if($request->user()->myrole('admin')){
    //         return redirect('/admin/');

    //     }else if($request->user()->myrole('pemilik_kendaraan')){
    //         return redirect('/pemilik/');
    //     }else{
    //         return redirect('/member/');
    //     }
    // }
}
