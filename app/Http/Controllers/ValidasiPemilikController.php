<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidasiPemilikController extends Controller
{
    //

    public function __construct(){

    }
    // melihat daftar pembayaran pada dashboard pemilik
    public function showDaftarPembayaran(){
        
        $pembayarans = DB::table('pembayaran')
                        ->join('transaksis','pembayarans.id_transaksi','=','transaksis.id')
                        ->join('kendaraans','transaksis.id_kendaraan','=','kendaraans.id')
                        ->where('kendaraans.id_pemilik','=',$pemilikParam)
                        ->where('pembayaranas.id_status_validasi','=',1)
                        ->get();


        return $pembayarans;
    }


    //melihat detail pembayaran pada dashboard pemilik
    public function detailDaftarPembayaran($id_kendaraan){
        $pemilikParam = $this->guard()->user()->id;
        $pembayaran_detail = DB::table('pembayaran')
        ->join('transaksis','pembayarans.id_transaksi','=','transaksis.id')
        ->join('kendaraans','transaksis.id_kendaraan','=','kendaraans.id')
        ->join('users','transaksis.id_user','=','users.id')
        ->where('transaksis.id_kendaraan','=',$id_kendaraan)
        ->where('kendaraans.id_pemilik','=',$pemilikParam)
        ->where('pembayaranas.id_status_validasi','=',1)
        ->get();

        return $pembayaran_detail;

    }
    
    //pemilik melakukan validasi pembayaran
    public function validate(Pembayaran $pembayaran){
       $pembayaran->id_status_validasi = 2;
       $pembayaran->save();

       return "dashboard";
    }
    protected function guard(){
      return Auth::guard('web_pemilik');
    }

}
