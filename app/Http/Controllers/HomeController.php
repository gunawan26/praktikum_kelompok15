<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kendaraan;
use DB;
use App\kabupatenkota;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$kendaraans = kendaraan::where('id_status','1')->get();
        $kabupatens = kabupatenkota::all();
        $kendaraans = DB::table('kendaraans')
        ->join('kabupatenkotas','kendaraans.id_kabupatenkota','=','kabupatenkotas.id')
        ->join('provinsis','kabupatenkotas.provinsi_id','=','provinsis.id')
        ->select('kendaraans.*','kabupatenkotas.nama_kabupaten','provinsis.nama_provinsi')
        ->where('id_status','1')
        ->paginate(15);
        return view('Menu',compact('kendaraans','kabupatens'));
    }


    public function showKendaraaan(){


        //$query = preg_replace('/[^\p{L}\p{N}\s]/u', '', $request->q);


    }
    public function searchAjax(Request $request){

            $validator = Validator::make($request->all(),[

                'tgl_pesan' => 'nullable|required_with:tgl_kembali|date',
                'tgl_kembali' => 'nullable||required_with:tgl_pesan|date',
                'nama_kendaraan' => 'nullable|string|max:50',
    
    
            ]);
            if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
            }
            
            
    
           if(!$request->tgl_pesan){
    
                $kendaraans = DB::table('kendaraans')
                            ->join('kabupatenkotas','kendaraans.id_kabupatenkota','=','kabupatenkotas.id')
                            ->join('provinsis','kabupatenkotas.provinsi_id','=','provinsis.id')
                            ->where('kendaraans.nama_kendaraan','like','%'.$request->nama_kendaraan.'%')
                            ->select('kendaraans.*','kabupatenkotas.*','provinsis.*')
                            ->get();
    
                
           }else{
                $pesanTgl = $request->tgl_pesan;
                $kembaliTgl = $request->tgl_kembali;
                $kendaraans =  DB::table('kendaraans')
                        ->join('kabupatenkotas','kendaraans.id_kabupatenkota','=','kabupatenkotas.id')
                        ->join('provinsis','kabupatenkotas.provinsi_id','=','provinsis.id')
                        ->leftJoin('transaksis as t1','kendaraans.id','=','t1.id_kendaraan')
                        ->where('kendaraans.nama_kendaraan','like','%'.$request->nama_kendaraan.'%')
                        
                        ->whereNotExists(function($query)use($pesanTgl,$kembaliTgl){
                            
                            $query->select('*')
                                ->groupBy('kendaraans.id')
                                ->from('transaksis as t2')
                                ->where('t2.id','=','t1.id')
                                ->where('t2.tgl_pesan','<',$kembaliTgl)
                                ->orWhereNull('t2.tgl_pesan')
                                ->where('t2.tgl_rencanakembali','<',$kembaliTgl)
                                ->orWhereNull('t2.tgl_rencanakembali')
                                ->where(function($q)use($pesanTgl,$kembaliTgl){
                                    $q->whereBetween('t2.tgl_pesan', [$pesanTgl,$kembaliTgl])
                                    ->orWhereBetween('t2.tgl_rencanakembali',[$pesanTgl,$kembaliTgl]);
                                });
                        
                        })->select('kendaraans.*','kabupatenkotas.*','provinsis.*')
                        ->get();
               // dd($kendaraans);
                
                       
                
          
           }
         
           $returnHtml = view('pemilik.dashboard.ajax.result',compact('kendaraans'));
           return (String) $returnHtml;
        
            
           











      

        





        }
        


    public function s(Request $request){
      
            $kendaraans =  DB::table('kendaraans')
                    ->leftJoin('transaksis as t1','kendaraans.id','=','t1.id_kendaraan')
                    // ->where('kendaraans.nama_kendaraan','like','%'.$request->nama_kendaraan.'%')
                   ->get();
   

      
            return response($kendaraans);
        
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
}
