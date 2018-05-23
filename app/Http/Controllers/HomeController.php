<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kendaraan;
use DB;
use App\kabupatenkota;
use Illuminate\Support\Facades\Validator;
use Auth;
class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    /* Fungsi redirectPath() digunakan untuk melakukan redirect ke halaman utama pada sistem.
    */
    protected function redirectPath(){
        return redirect()->route('dashboard.home');
    }
    /* Fungsi index() berfungsi untuk menampilakn data kendaraan yang tersedia dengan pagination dan menampilkan list kabupaten yang tersedia
        untuk kolom search pada halaman home.
    */
    public function index()
    {

        //$kendaraans = kendaraan::where('id_status','1')->get();
        $kabupatens = kabupatenkota::all();

        $user = $this->detailUser();
        //pagenation
        $kendaraans = DB::table('kendaraans')
        ->join('kabupatenkotas','kendaraans.id_kabupatenkota','=','kabupatenkotas.id')
        ->join('provinsis','kabupatenkotas.provinsi_id','=','provinsis.id')
        ->select('kendaraans.*','kabupatenkotas.nama_kabupaten','provinsis.nama_provinsi')
        ->where('id_status','1')
        ->paginate(5);
       
        return view('Menu',compact('kendaraans','kabupatens','user'));

    }


    /* Fungsi searchAjax(Request $request) untuk melakukan pencarian kendaraan tersedia dengan menggunakan ajax
    sehingga tidak diperlukan melakukan refresh pada halaman. kategori search yang digunakan yaitu nama kendaraan,
    tanggal peminjaman, tanggal kembali dan kabputen kendaraan asal 
    */
    public function searchAjax(Request $request){
        if($request->ajax()){
            $validator = Validator::make($request->all(),[

                'tgl_pesan' => 'nullable|required_with:tgl_kembali|date',
                'tgl_kembali' => 'nullable|required_with:tgl_pesan|date',
                'nama_kendaraan' => 'nullable|string|max:50',
                'kabupaten_asal' => 'nullable',
    
    
            ]);
        
            if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
            }
            
            
    
           if(!$request->tgl_pesan || !$request->tgl_kembali){
        
                $kendaraans = DB::table('kendaraans')
                            ->join('kabupatenkotas','kendaraans.id_kabupatenkota','=','kabupatenkotas.id')
                            ->join('provinsis','kabupatenkotas.provinsi_id','=','provinsis.id')
                            ->where('kendaraans.nama_kendaraan','like','%'.$request->nama_kendaraan.'%')
                            ->where('kendaraans.id_kabupatenkota','=',$request->kabupaten_asal)
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
           } 
           $returnHtml = view('pemilik.dashboard.ajax.result',compact('kendaraans'));
           return (String) $returnHtml;
        }
    }

    public function detailUser(){
        if(auth::guard()){
            $dataUser = auth::guard()->user();

            return $dataUser;
        }
    }


        


}
