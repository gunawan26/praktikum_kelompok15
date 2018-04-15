<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kendaraan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraans = kendaraan::where('id_status','1')->get();
        return view('home',compact('kendaraans'));
    }


    public function showKendaraaan(){


        


    }
}
