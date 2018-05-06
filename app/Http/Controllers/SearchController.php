<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function search(Request $request){



        $kendaraans =  DB::table('kendaraans')
                    ->leftJoin('transaksis as t1','kendaraans.id','=','t1.id_kendaraan')
                    ->where('kendaraans.nama_kendaraan','like','%'.$request->kendaraanParam.'%')
                    ->whereNotExists(function($query,$queryTwo){
                        
                        $query->DB::table('transaksis as t2')
                            ->where('t2.id','=','t1.id');
                    
                    
                    })->where(function($q){
                        $q->whereBetween('tgl_pesan', [$pesanTgl,$kembaliTgl])
                        ->orWhereBetween('tgl_rencanakembali',[$pesanTgl,$kembaliTgl]);
                    })->paginate(15);
                    
        return view('home',compact('kendaraans'));

    }
}


/*
SELECT DISTINCT 
  * 
FROM
  kendaraans 
  LEFT JOIN transaksis t1 
    ON kendaraans.`id` = t1.`id_kendaraan` 
WHERE NOT EXISTS 
  (SELECT DISTINCT 
    * 
  FROM
    transaksis t2 
  WHERE t2.`id` = t1.`id` 
    AND( t2.`tgl_pesan` BETWEEN "2018-01-01" 
    AND "2019-01-02" OR tgl_rencanakembali BETWEEN "2018-01-01" AND "2019-01-02"))



*/