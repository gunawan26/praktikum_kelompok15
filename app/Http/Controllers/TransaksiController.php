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
use DB;
class TransaksiController extends Controller
{
        //Return View detail mobil
    public function index(kendaraan $kendaraan)
    {
        //

        return view('transaksi.detailform',compact('kendaraan'));
    }

    public function validasiTransaksi(){
        $id = auth::guard()->user()->id;
        //      select count(transaksis.id) from transaksis left join pembayarans on pembayarans.`id_transaksi` = transaksis.`id` where id_user = 2  and pembayarans.`id` is null or pembayarans.`id_status_validasi` = 1
        $valid_Trans = DB::table('transaksis')
                            ->leftJoin('pembayarans','pembayarans.id_transaksi','=','transaksis.id')
                            ->where('id_user',$id)
                            ->where(function($query){
                                $query->whereNull('pembayarans.id')
                                    ->orWhere('pembayarans.id_status_validasi',1);
                            }) 
                            ->get()->count();

        if($valid_Trans > 5){
            return "error transaksi maksimal hanya sampai 5";
        }

    }

    public function validasiMobilTersedia($mobilId,Request $request){
        //SELECT DISTINCT COUNT(id_kendaraan) 
                        //FROM transaksis WHERE id_kendaraan = 12 
                        //AND (tgl_pesan BETWEEN '2018-04-26' 
                        //AND '2018-04-29' 
                        //OR tgl_rencanakembali BETWEEN '2018-04-26' AND '2018-04-29')

       
        //Sdd($pesanTgl);
        $pesanTgl = $request->tgl_pesan;
        $kembaliTgl = $request->tgl_rencanakembali;
        $mobil = DB::table('transaksis')
            ->where('id_kendaraan',$mobilId)    
            -> where(function ($query)use($pesanTgl,$kembaliTgl){
                // $query  ->whereBetween('tgl_pesan',['2018-04-26','2018-04-29' ])
                //         ->orWhereBetween('tgl_rencanakembali',['2018-04-26','2018-04-29']);

                $query->whereBetween('tgl_pesan', [$pesanTgl,$kembaliTgl])
                ->orWhereBetween('tgl_rencanakembali',[$pesanTgl,$kembaliTgl]);
            })
            ->get()->count();
   
            if($mobil ==  0 ){
                return true;
            }else{
                return false;
            }

    }

        // return view transaksi
    public function createtransaksi(kendaraan $kendaraan)
    {
        //
        
       
            $foto = auth::guard()->user()->ktp;
       

        //$this->validasiTransaksi();
        return view('transaksi.transaksiform',compact('foto','kendaraan'));
    }

    
    // Get user KTP photos
    
    public function getKtp(){
        $foto_ktp = auth::guard()->user()->ktp;
        
        $file = Storage::disk('ktp')->exists($foto_ktp);
        
        return $file;
     
    }
    
    public function storetransaksi(Request $request,kendaraan $kendaraan,transaksi $transaksi)
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
        
        $valid_tanggal =  $this->validasiMobilTersedia($kendaraan->id,$request);
        //dd($valid_tanggal);
        if($valid_tanggal){

            if($checkKtp == false){
                $user = auth::guard()->user();
                $foto_ktp =time().$request->foto_ktp->getClientOriginalName();
                $request->foto_ktp->storeAs('public/gambar_ktp/user',$foto_ktp);
                $user->ktp = $foto_ktp;
                $user->save();
            }
            $transaksi->id_kendaraan = $kendaraan->id;
            $transaksi->id_user = auth::guard()->user()->id;
            $transaksi->tgl_transaksi = Carbon::now();
            $transaksi->tgl_pesan = $request->tgl_pesan;
            $transaksi->tgl_rencanakembali = $request->tgl_rencanakembali;
            $transaksi->save();
    
     
         
            
            return view('transaksi.pembayaran',compact('kendaraan','transaksi')); 

        }else{
            return "mobil tidak tersedia";
        }
        

        
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
