<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use Illuminate\Http\Request;
use App\Transaksi;
class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('transaksi.pembayaran');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Transaksi $transaksi)
    {
        //
        $pembayaran = new Pembayaran;
        
         $this->validate($request,[
 
             'tgl_pesan' => 'required|date',
             'tgl_rencanakembali' => 'required|date',
             'foto_ktp' => 'required|image|mimes:jpeg,jpg,png,bmp',
 
 
         ]);
         
        $pembayaran->id_transaksi = $transaksi->id;
        $pembayaran->tgl_batasbayar = $transaksi->tgl_transaksi->addDays(7);
        $pembayaran->id_status_validasi = '1';
        $transaksi->save();
        return redirect()->route('pembayaran ???');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */

     
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
