<?php

namespace App\Http\Controllers;

use App\kendaraan;
use Illuminate\Http\Request;
use App\kabupatenkota;
use App\kategori;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pemilik)
    {
        //
        
        $kendaraans = kendaraan::where('id_pemilik',$pemilik)->get();

        return view('pemilik.dashboard',compact('kendaraans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pemilik)
    {
        //
        $kategoris = kategori::all();
        $kabupatenkotas = kabupatenkota::all();
        return view('pemilik.kendaraan.register',compact('kabupatenkotas','kategoris')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // public function getkategori(){
    //     $kategoris = kategori::all();
    //     return $kategoris;


    // }

    // public function kota(){
        
    //     $kabupatenkotas = kabupatenkota::all();
    //     return $kabupatenkotas;
    // }

    // public function getdata(){
    //     $kategoris = kategori::all();
    //     $kabupatenkotas = kabupatenkota::all();

    // return view('/pemilik.kendaraan.register'/**,compact('kabupatenkotas','kategoris')*/);
    // }



    public function store(Request $request)
    {
        $kendaraan = new kendaraan;

        $this->validate($request,[
        
            'nama_kendaraan'=>'required|string|max:100',
            'plat_nomor'=>'required|string|unique|max:15',
            'deskripsi'=>'required|string|min:10',
            'harga_sewa'=>'required',
            'id_kategori'=>'required',
            'id_kabupatenkota'=>'required',
            'id_status'=>'required', 
            'gambar_kendaraan' => 'required|image|mimes:jpeg,jpg,png',
            'foto_stnk' => 'required|image|mimes:jpeg,jpg,png',

    
        ]);


        $kendaraan->nama_kendaraan  = $request->nama_kendaraan;
        $kendaraan->plat_nomor = $request->plat_nomor;
        $kendaraan->deskripsi = $request->deskripsi;
        $kendaraan->harga_sewa = $request->harga_sewa;
        $kendaraan->id_kategori = $request->id_kategori;
        $kendaraan->id_kabupatenkota = $request->id_kabupatenkota;
        $kendaraan->id_status = $request->id_status;
        $kendaraan->gambar_kendaraan = $request->gambar_kendaraan;
        $kendaraan->foto_stnk = $request->foto_stnk;
        $kendaraan->save();
        return redirect('/dashboard');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(kendaraan $kendaraan)
    {
        //
    }
}
