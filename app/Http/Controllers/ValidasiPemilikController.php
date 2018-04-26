<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidasiPemilikController extends Controller
{
    //

    public function __construct(){

    }

    public function showDaftarPembayaran(){
        $pemilikParam = $this->guard()->user()->id;
        $pembayarans = DB::table('pembayaran')
                        ->join('transaksis','pembayarans.id_transaksi','=','transaksis.id')
                        ->join('kendaraans','transaksis.id_kendaraan','=','kendaraans.id')
                        ->where('kendaraans.id_pemilik','=',$pemilikParam)
                        ->where('pembayaranas.id_status_validasi','=',1)
                        ->get();


        return $pembayarans;
    }



    public function detailDaftarPembayaran($id_kendaraan){
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

    public function validate(Pembayaran $pembayaran){
       $pembayaran->id_status_validasi = 2;
       $pembayaran->save();

       return "dashboard";
    }
    protected function guard(){
      return Auth::guard('web_pemilik');
    }

}
