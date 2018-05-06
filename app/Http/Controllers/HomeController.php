<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kendaraan;
use DB;
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
        //$kendaraans = kendaraan::where('id_status','1')->get();
        $kendaraans = DB::table('kendaraans')
        ->join('kabupatenkotas','kendaraans.id_kabupatenkota','=','kabupatenkotas.id')
        ->join('provinsis','kabupatenkotas.provinsi_id','=','provinsis.id')
        ->select('kendaraans.*','kabupatenkotas.nama_kabupaten','provinsis.nama_provinsi')
        ->where('id_status','1')
        ->get();
        //pagenation
        $kendaraans = DB::table('kendaraans')
        ->join('kabupatenkotas','kendaraans.id_kabupatenkota','=','kabupatenkotas.id')
        ->join('provinsis','kabupatenkotas.provinsi_id','=','provinsis.id')
        ->select('kendaraans.*','kabupatenkotas.nama_kabupaten','provinsis.nama_provinsi')
        ->where('id_status','1')
        ->paginate(5);
        return view('Menu',compact('kendaraans'));
    }


    public function showKendaraaan(){


        


    }
}
