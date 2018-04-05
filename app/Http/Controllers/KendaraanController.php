<?php

namespace App\Http\Controllers;

use App\kendaraan;
use Illuminate\Http\Request;
use App\kabupatenkota;
use App\kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Input;

class KendaraanController extends Controller
{
    
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        

    }
    
    public function index()
    {
        $pemilik = Auth::guard('web_pemiliks')->user()->id; 
        $kendaraans = kendaraan::where([['id_pemilik',$pemilik],['id_status','<>','3'],])->get();

        return view('pemilik.kendaraan.dashboard',compact('kendaraans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
        $kategoris = kategori::where('id_kategori','<>','3');
        $kabupatenkotas = kabupatenkota::all();
        return view('pemilik.kendaraan.register',compact('kabupatenkotas','kategoris')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $kendaraan = new kendaraan;

       $this->validate($request,[
        
            'nama_kendaraan'=>'required|string|max:100',
            'plat_nomor'=>'required|string|unique:kendaraans|max:15',
            'deskripsi'=>'required|string|min:10',
            'harga_sewa'=>'required',
            'id_kategori'=>'required',
            'id_kabupatenkota'=>'required',
            'id_status'=>'required', 
            'warna_kendaraan' => 'required',
            'gambar_kendaraan' => 'required|image|mimes:jpeg,jpg,png,bmp',
            'foto_stnk' => 'required|image|mimes:jpeg,jpg,png,bmp',
        ]);
        $gambar_kendaraan = $request->gambar_kendaraan->getClientOriginalName();
        $request->gambar_kendaraan->storeAs('public/gambar_mobil',$gambar_kendaraan);

        $foto_stnk =$request->foto_stnk->getClientOriginalName();
        $request->foto_stnk->storeAs('public/gambar_stnk',$foto_stnk);

        $kendaraan->warna_kendaraan = $request->warna_kendaraan;
        $kendaraan->id_pemilik = Auth::guard('web_pemiliks')->user()->id;
        $kendaraan->nama_kendaraan  = $request->nama_kendaraan;
        $kendaraan->plat_nomor = $request->plat_nomor;
        $kendaraan->deskripsi = $request->deskripsi;
        $kendaraan->harga_sewa = $request->harga_sewa;
        $kendaraan->id_kategori = $request->id_kategori;
        $kendaraan->id_kabupatenkota = $request->id_kabupatenkota;
        $kendaraan->id_status = $request->id_status;
        $kendaraan->gambar_kendaraan =$gambar_kendaraan;
        $kendaraan->foto_stnk =$foto_stnk;    
        $kendaraan->save();
        return redirect()->route('kendaraan.index');;

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(kendaraan $kendaraan)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(kendaraan $kendaraan)
    {
        //
        $kategoris = kategori::all();
        $kabupatenkotas = kabupatenkota::all();
       // $kendaraan_old = kendaraan::where('id',$kendaraan);
       $pemilik = Auth::guard('web_pemiliks')->user()->id;

       // dd($pemilik);
        if($kendaraan->id_pemilik == $pemilik ){

            return view('pemilik.kendaraan.edit',compact('kabupatenkotas','kategoris','kendaraan'));
        }else{
            return 'you dont have acess';
        }
       
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kendaraan $kendaraan)
    {
        $this->validate($request,[
         
             'nama_kendaraan'=>'required|string|max:100',
             'plat_nomor'=>'required|string|max:15',
             'deskripsi'=>'required|string|min:10',
             'harga_sewa'=>'required',
             'id_kategori'=>'required',
             'id_kabupatenkota'=>'required',
             'id_status'=>'required', 
             'warna_kendaraan' => 'required',
             'gambar_kendaraan' => 'image|mimes:jpeg,jpg,png,bmp',
             'foto_stnk' => 'image|mimes:jpeg,jpg,png,bmp',
         ]);

         if($request->hasFile('gambar_kendaraan')){
            
             // tambah foto baru
             $gambar_kendaraan = $request->gambar_kendaraan->getClientOriginalName();
             $request->gambar_kendaraan->storeAs('public/gambar_mobil',$gambar_kendaraan);
            
            //nama file gambar lama 
             $old_gambar = $kendaraan->gambar_kendaraan;
             // update database
             $kendaraan->gambar_kendaraan =$gambar_kendaraan;

             // hapus foto lama
             Storage::disk('delete')->delete($old_gambar);
         }
        

         if($request->hasFile('foto_stnk')){
           
           //tambah foto baru
            $foto_stnk =$request->foto_stnk->getClientOriginalName(); 
            $request->foto_stnk->storeAs('public/gambar_stnk',$foto_stnk);
            // nama file gambar la,ma
            $old_stnk = $kendaraan->foto_stnk;

            //update database

            $kendaraan->foto_stnk = $foto_stnk;

            Storege::disk('delete')->delete($old_stnk);



         }

        $kendaraan->warna_kendaraan = $request->warna_kendaraan;
        $kendaraan->id_pemilik = Auth::guard('web_pemiliks')->user()->id;
        $kendaraan->nama_kendaraan  = $request->nama_kendaraan;
        $kendaraan->plat_nomor = $request->plat_nomor;
        $kendaraan->deskripsi = $request->deskripsi;
        $kendaraan->harga_sewa = $request->harga_sewa;
        $kendaraan->id_kategori = $request->id_kategori;
        $kendaraan->id_kabupatenkota = $request->id_kabupatenkota;
        $kendaraan->id_status = $request->id_status;

        $kendaraan->save();
         
         return redirect()->route('kendaraan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(kendaraan $kendaraan)
    {
        

    }

    public function hapus(kendaraan $kendaraan)
    {

        $kendaraan->id_status = '3';
        $kendaraan->save();
        return redirect()->route('kendaraan.index');
    }



}
