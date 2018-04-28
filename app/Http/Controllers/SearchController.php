<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function search(Request $request){

        $kendaraans = DB::table('kendaraans')
                    ->join('transaksis','kendaraans.id','=','transaksis.id_kendaraan')
                    // ->select('kendaraans.nama_kendaraan','kendaraans.plat_nomor',
                    // 'kendaraans.deskripsi','kendaraans.harga_sewa','kendaraans',
                    // 'kendaraans.id_kabupatenkota')
                    ->where('kendaraans.nama_kendaraan','like','%'.$request->nama_kendaraan.'%')
                    ->where('transaksis.')
                    ->get();

        return view('home',compact('kendaraans'));

    }
}
