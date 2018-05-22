<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use Illuminate\Http\Request;
use App\Transaksi;
use App\kendaraan;
use Carbon\carbon;
use DB;
class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* Fungsi index(Kendaraan $kendaraan,Transaksi $transaksi) untuk
    menuju ke halaman pembayaran jika user sudah melakukan transaksi
    */
    public function index(Kendaraan $kendaraan,Transaksi $transaksi)
    {
        //

       
        return view('transaksi.pembayaran',compact('kendaraan','transaksi'));
    }
/*  Fungsi store(Request $request,kendaraan $kendaraan,Transaksi $transaksi,Pembayaran $pembayaran)
untuk melakukan penyimpanan data pembayaran yang dilakukan user setelah user melakukan transaksi
*/


    public function store(Request $request,kendaraan $kendaraan,Transaksi $transaksi,Pembayaran $pembayaran)
    {
        //
        $validasiPembayaran = DB::table('pembayarans')
                            ->where('id_transaksi','=',$transaksi->id)
                            ->get()->count();

        if($validasiPembayaran == 0){
            $pembayaran = new Pembayaran;
            $not_valid = 1;
            $pembayaran->id_transaksi = $transaksi->id;
            $pembayaran->tanggal_bayar = NULL;
            $pembayaran->tgl_batasbayar = $transaksi->tgl_transaksi->addDays(7);
            $pembayaran->id_status_validasi = $not_valid;
            $pembayaran->save();
            return redirect()->route('pembayaran.checkout',[$kendaraan,$transaksi,$pembayaran]);


        }
        return "silakan lanjut ke pembayaran";


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */

     /* Fungsi show(kendaraan $kendaraan,Transaksi $transaksi,Pembayaran $pembayaran)
     untuk menampilkan sisa waktu batas pembayaran pada halaman checkout, jika user sudah
     melanjutkan dari pembayaran
     */

    public function show(kendaraan $kendaraan,Transaksi $transaksi,Pembayaran $pembayaran)
    {
        //
        //dd($pembayaran->id);
        $tanggal_sekarang = carbon::now();


        $tanggal_bts_bayar = $pembayaran->tgl_batasbayar;
        $conv_tgl_bts_bayar = strtotime($tanggal_bts_bayar);
        $conv_tanggal_skrng = Carbon::parse($tanggal_bts_bayar);
        //return redirect()->view('pembayaran.checkout')
        $sisa_waktu = $tanggal_sekarang->diffInSeconds($conv_tanggal_skrng);
       //    dd($sisa_waktu);
  
        return view('transaksi.checkout',compact('pembayaran','sisa_waktu'));
    }


    /* Fungsi validasiTransaksi() untuk membatasi user yang melakukan transaksi namun tidak melanjutkan 
    pembayaran, dengan batas transaksi tersebut sebanyak 5 transaksi
    */
    public function validasiTransaksi(){
        $id = $user = auth::guard()->user()->id;
        //      select count(transaksis.id) from transaksis left join pembayarans on pembayarans.`id_transaksi` = transaksis.`id` where id_user = 2  and pembayarans.`id` is null or pembayarans.`id_status_validasi` = 1
        $valid_Trans = DB::table('transaksis')
                            ->leftJoin('pembayarans','pembayarans.id_transaksi','=','transaksis.id')
                            ->where('id_user',$id)
                            ->where(function($query){
                                $query->whereNull('pembayarans.id')
                                    ->orWhere('pembayarans.id_status_validasi',1);
                            }) 
                            ->get();

        if($valid_Trans > 5){
            return "error transaksi maksimal hanya sampai 5";
        }

    }
    public function showDaftarBayarPemilik(){
            
    }
}
