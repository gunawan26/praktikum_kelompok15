<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class UserController extends Controller
{
    /* Fungsi transaksi() untuk menampilkan data transaksi yang
    sudah masuk ke pembayaran
    yang dilakukan oleh user atau penyewa kendaraan
    berdasarkan user yang loggin */
    public function transaksi()
    {
        $userId = $this->userId();

        
        $transaksis = DB::table('transaksis')
                    ->join('pembayarans','transaksis.id','=','pembayarans.id_transaksi')
                    ->where('transaksis.id_user',$userId)
                    ->get();
        
        
        return view('user.dataTransaksi');
    }
    /*
        Fungsi transBaru() untuk menampilkan data transaksi yang
  belum masuk ke pembayaran
    yang dilakukan oleh user atau penyewa kendaraan
    berdasarkan user yang loggin */


  
    public function transBaru()
    {   
        $userId = $this->userId();
        $transaksiBarus = DB::table('transaksis')
                        ->select('*')
                        ->join('kendaraans','transaksis.id_kendaraan','=','kendaraans.id')
                        ->join('pemiliks','kendaraans.id_pemilik','=','pemiliks.id')
                        ->whereNotExists(function($q){
                            $q->select('pembayarans.id_transaksi')
                            ->from('pembayarans')
                            ->where('pembayarans.id_transaksi','=',DB::raw('transaksis.id'));
                        })
                        ->select('kendaraans.nama_kendaraan','pemiliks.nama_depan','transaksis.*')
                        ->get();
        $count = $transaksiBarus->count();
   

    return view('user.transaksibaru',compact('transaksiBarus'));
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

           /*
        Fungsi userId() untuk mendapatkan id dari user
        atau penyewa yang login
        */

    protected function userId(){
        
        $id = Auth::guard()->user()->id;
        return $id;
    }

}
