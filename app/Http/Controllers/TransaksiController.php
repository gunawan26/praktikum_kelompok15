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

    /* Fungsi index(kendaraan $kendaraan) untuk menampilkan detail data kendaraan
    yang akan disewa oleh user atau penyewa kendaraan
    */

    public function index(kendaraan $kendaraan)
    {
        //

        return view('transaksi.detailform',compact('kendaraan'));
    }

    /* Fungsi validasiTransaksi() untuk membatasi user yang melakukan transaksi namun tidak melanjutkan 
    pembayaran, dengan batas transaksi tersebut sebanyak 5 transaksi
    */
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
    /* Fungsi validasiMobilTersedia($mobilId,Request $request) untuk melakukan validasi
    mobil tersedia pada tanggal tertentu, ketika user ingin melakukan peminjaman 
    kendaraan
    */

    public function validasiMobilTersedia($mobilId,Request $request){
        $pesanTgl = $request->tgl_pesan;
        $kembaliTgl = $request->tgl_rencanakembali;
        $mobil = DB::table('transaksis')
            ->where('id_kendaraan',$mobilId)    
            -> where(function ($query)use($pesanTgl,$kembaliTgl){
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
    /* Fungsi createtransaksi(kendaraan $kendaraan,Transaksi $transaksi)
    menampilkan halaman transaksi saat user ingin melakukan transaksi pada kendaraan
    yang ditentukan.
    */

    public function createtransaksi(kendaraan $kendaraan,Transaksi $transaksi)
    {
        //
        

            $foto = auth::guard()->user()->ktp;
       

        //$this->validasiTransaksi();
        return view('transaksi.transaksiform',compact('foto','kendaraan'));
    }

    
    // Get user KTP photos
    
    /* Fungsi getKtp() untuk menampilkan data foto Ktp
    user yang melakukan penyewaan kendaraan
    */
    public function getKtp(){
        $foto_ktp = auth::guard()->user()->ktp;
        
        $file = Storage::disk('ktp')->exists($foto_ktp);
        
        return $file;
     
    }
    
    /* Fungsi storetransaksi(Request $request,kendaraan $kendaraan,Transaksi $transaksi)
    untuk menyimpan data transaksi setelah user memilih kendaraan, tanggal pesan dan 
    tanggal kembali kendaraan
    */

    public function storetransaksi(Request $request,kendaraan $kendaraan,Transaksi $transaksi)
    {
        $valid_tanggal =  $this->validasiMobilTersedia($kendaraan->id,$request);
        //dd($valid_tanggal);
        if($valid_tanggal){
        
            $transaksi = new Transaksi;
            $foto_ktp = auth::guard()->user()->ktp;
            $checkKtp  = $this->getKtp();
            $tgl_sekarang = Carbon::now();
            $this->validate($request,[
    
                'tgl_pesan' => 'required|date|after_or_equal:now',
                'tgl_rencanakembali' => 'required|date|after:tgl_pesan',
                'foto_ktp' => [new checkKtpstatus,'image','mimes:jpeg,jpg,png,bmp'],
    
    
            ]);
            

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
    
     
           
            return redirect()->route('transaksi.detail',[$kendaraan,$transaksi]);

        }else{
            
            $foto = auth::guard()->user()->ktp;
       

            //$this->validasiTransaksi();
            return view('transaksi.transaksiform',compact('foto','kendaraan'))->with('error','');
  
        }
        

        
    }

    /* Fungsi detailtransaksi(kendaraan $kendaraan,Transaksi $transaksi) untuk menampilakn
    halaman pembayaran setelah user melakukan transaksi 
    */
    public function detailtransaksi(kendaraan $kendaraan,Transaksi $transaksi)
    {

        $pembayaran_terakhir = $transaksi->tgl_transaksi->addDays(7);

        return view('transaksi.pembayaran',compact('kendaraan','transaksi','pembayaran_terakhir'));

    }

}
