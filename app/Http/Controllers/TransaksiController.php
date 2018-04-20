<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\kendaraan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use Auth;
use Storage;
use App\Rules\checkKtpstatus;
class TransaksiController extends Controller
{
        //Return View detail mobil
    public function index(kendaraan $kendaraan)
    {
        //

        
        return view('transaksi.detailform',compact('kendaraan'));
    }

        // return view transaksi
    public function createtransaksi(kendaraan $kendaraan)
    {
        //
        
       
            $foto = auth::guard()->user()->ktp;
       

       
        return view('transaksi.transaksiform',compact('foto','kendaraan'));
    }

    
    // Get user KTP photos
    
    public function getKtp(){
        $foto_ktp = auth::guard()->user()->ktp;
        
        $file = Storage::disk('ktp')->exists($foto_ktp);
        
        return $file;
     
    }
    
    public function storetransaksi(Request $request,kendaraan $kendaraan, user $user)
    {
        //
        $transaksi = new Transaksi;
        $foto_ktp = auth::guard()->user()->ktp;
        //$user = new User;
        
       $checkKtp  = $this->getKtp();
       //    dd($checkKtp);
    //    if($checkKtp == true){
    //        $request['foto_ktp'] = $foto_ktp;
    //    }
        $tgl_sekarang = Carbon::now();
        $this->validate($request,[

            'tgl_pesan' => 'required|date|after_or_equal:now',
            'tgl_rencanakembali' => 'required|date|after:tgl_pesan',
            'foto_ktp' => [new checkKtpstatus,'image','mimes:jpeg,jpg,png,bmp'],


        ]);
  

        // dd($request);
        // if($request->tgl_pesan < $tgl_sekarang  && $request->tgl_pesan > $request->tgl_rencanakembali  ){

        //     return "salah kentod";

        // }



        if($checkKtp == false){
            $user = auth::guard()->user();
            $foto_ktp =time().$request->foto_ktp->getClientOriginalName();
            $request->foto_ktp->storeAs('public/gambar_ktp/user',$foto_ktp);
            //$request->gambar_kendaraan->storeAs('public/gambar_mobil',$gambar_kendaraan);
            $user->ktp = $foto_ktp;
            //$dir = public_path('storage/gambar_mobil/'.$foto_ktp);
            // Image::make($request->gambar_kendaraan)->resize(600,400)->save($dir);

            $user->save();
        }
        $transaksi->id_kendaraan = $kendaraan->id;
        $transaksi->id_user = auth::guard()->user()->id;
        $transaksi->tgl_transaksi = Carbon::now();
        $transaksi->tgl_pesan = $request->tgl_pesan;
        $transaksi->tgl_rencanakembali = $request->tgl_rencanakembali;
        $transaksi->save();
        
        return redirect()->route('pembayaran.formview',$kendaraan->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
