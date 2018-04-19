<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\kendaraan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use Auth;
use Storage;

class TransaksiController extends Controller
{
        //Return View detail mobil
    public function index(kendaraan $kendaraan)
    {
        //

        
        return view('transaksi.detailform',compact('kendaraan'));
    }

        // return view transaksi
    public function createtransaksi()
    {
        //
        $foto =$this->getKtp();

       
        return view('transaksi.transaksiform',compact('foto'));
    }

    
    // Get user KTP photos
    
    public function getKtp(){
        $foto_ktp = auth::guard()->user()->ktp;
        
        $file = Storage::disk('ktp')->exists($foto_ktp);
        if($file) return $foto_ktp;
     
    }
    
    public function storetransaksi(Request $request,kendaraan $kendaraan, user $user)
    {
        //
        $transaksi = new Transaksi;
        //$user = new User;
        
       $checkKtp  = $this->getKtp();

       if($checkKtp != 'null'){
           $request->foto_ktp = $checkKtp;
       }
       
        $this->validate($request,[

            'tgl_pesan' => 'required|date',
            'tgl_rencanakembali' => 'required|date',
            'foto_ktp' => 'required|image|mimes:jpeg,jpg,png,bmp',


        ]);
        
        if($checkKtp == 'null'){
            
            $foto_ktp =time().$request->foto_ktp->getClientOriginalName();
            $request->foto_ktp->storeAs('public/gambar_ktp/user',$foto_ktp);
            //$request->gambar_kendaraan->storeAs('public/gambar_mobil',$gambar_kendaraan);
            $user->foto_ktp = $foto_ktp;
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
        
        return redirect()->route('pembayaran ???');
        
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
