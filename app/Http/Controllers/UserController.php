<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class UserController extends Controller
{
    //

    public function transaksi()
    {
        $userId = $this->userId();

        
        $transaksis = DB::table('transaksis')
                    ->join('pembayarans','transaksis.id','=','pembayarans.id_transaksi')
                    ->where('transaksis.id_user',$userId)
                    ->get();
        dd($transaksis);
        
        return view('user.dataTransaksi');
    }

    public function transBaru()
    {   
        $userId = $this->userId();

        $transaksiBarus = DB::table('transaksis')
                        ->whereNotExists(function($q){

                            $q->select('pembayarans.id_transaksi')
                            -> from('pembayarans');

                        })->get();

       // dd($transaksiBarus);
        return view('user.transaksibaru');
    }

    public function pembayaran()
    {
        $userId = $this->userId();
        $pembayarans = DB::table('pembayarans')
                        ->join('transaksis','pembayarans.id_transaksi','=','transaksis.id')
                        ->where('transaksis.id_user','=',$userId)
                        ->get();
        return view('user.pembayaran');
    }

    public function editakun()
    {
        
        return view('user.editakun');
    }

    protected function userId(){
        
        $id = Auth::guard()->user()->id;
        return $id;
    }

}
