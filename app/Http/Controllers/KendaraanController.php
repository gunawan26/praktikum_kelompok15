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
use Image;
use App\Jenis_bahanbakar;
use App\provinsi;
use DB;
use DateTime;
use Carbon\Carbon;
use App\Pembayaran;

class KendaraanController extends Controller
{
    
   
/*
Fungsi home() digunakan untuk menampilkan data pembayaran yang sudah dilakukan
jumlah transaksi yang belum divalidasi, total keseluruhan transaksi,
transaksi yang sudah melakukan pembayaran dan transaksi yang ditolak 
pemilik kendaraan
*/

    public function home(){
        $pemilik = $this->pemilikId();

        $pembayarans = DB::table('pembayarans')
                        ->join('transaksis','pembayarans.id_transaksi','=','transaksis.id')
                        ->join('kendaraans','transaksis.id_kendaraan','=','kendaraans.id')
                        ->where('kendaraans.id_pemilik',$pemilik)
                        ->where('pembayarans.id_status_validasi','=',1)
                        ->select('pembayarans.id as id_pembayaran','pembayarans.*','transaksis.id as id_trans','transaksis.*','kendaraans.*','kendaraans.id as id_kend')
                        ->get();
        
        $jumlahTrans = DB::table('transaksis')
                    ->join('kendaraans','transaksis.id_kendaraan','=','kendaraans.id')
                    ->join('pembayarans','transaksis.id','=','pembayarans.id_transaksi')
                    ->where('kendaraans.id_pemilik',$pemilik)
                    ->where('pembayarans.id_status_validasi',1)
                    ->get()->count();

        $totalTrans = DB::table('transaksis')
                    ->join('kendaraans','transaksis.id_kendaraan','=','kendaraans.id')
                    ->join('pembayarans','transaksis.id','=','pembayarans.id_transaksi')
                    ->where('kendaraans.id_pemilik',$pemilik)
                    ->get()->count();

        $transSukses = DB::table('transaksis')
                    ->join('kendaraans','transaksis.id_kendaraan','=','kendaraans.id')
                    ->join('pembayarans','transaksis.id','=','pembayarans.id_transaksi')
                    ->where('kendaraans.id_pemilik',$pemilik)
                    ->where('pembayarans.id_status_validasi',2)
                    ->get()->count();

        $transGagal =DB::table('transaksis')
                    ->join('kendaraans','transaksis.id_kendaraan','=','kendaraans.id')
                    ->join('pembayarans','transaksis.id','=','pembayarans.id_transaksi')
                    ->where('kendaraans.id_pemilik',$pemilik)
                    ->where('pembayarans.id_status_validasi',3)
                    ->get()->count();

     

        ###////
        return view('pemilik.dashboard.home',compact('pembayarans','jumlahTrans','totalTrans','transSukses','transGagal'));
    }
/*

    Fungsi updatePembayaran(Pembayaran $pembayaran) untuk melakukan proses penerimaan penyewaan kendaraan
    yang dilakukan oleh pemilik kendaraan kepada penyewa atau user


*/
    public function updatePembayaran(Pembayaran $pembayaran){
    
        $pembayaran->id_status_validasi = '2';
        $pembayaran->tanggal_bayar = carbon::now();
        $pembayaran->save();

        return redirect()->route('dashboard.home');


    }
/*
    Fungsi pembatalanPembayaran(Pembayaran $pembayaran) untuk melakukan proses pembatalan transaksi penyewaan kendaraan
    yang dilakukan oleh pemilik kendaraan kepada penyewa atau user

*/
    public function pembatalanPembayaran(Pembayaran $pembayaran){
        
        $pembayaran->id_status_validasi = '3';
        $pembayaran->tanggal_bayar = carbon::now();
        $pembayaran->save();

        return redirect()->route('dashboard.home');
    }
    
    /* Fungsi index() untuk menampilkan keseluruhan kendaraan yang dimiliki oleh 
    pemilik kendaraan yang tersedia*/
    public function index()
    {
        $pemilik = Auth::guard('web_pemiliks')->user()->id; 
        $kendaraans = kendaraan::where([['id_pemilik',$pemilik],['id_status','<>','3'],])->get();

        return view('pemilik.dashboard.kendaraan',compact('kendaraans'));
    }

/* Fungsi riwayat() untuk menampilkan riwayat transaksi kendaraan yang
dimiliki oleh pemilik kendaraan pada tiap kendaraannya.

*/

    public function riwayat(){
        $now = new DateTime();
        
        $riwayats = DB::table('transaksis')
        ->join('kendaraans','transaksis.id_kendaraan','=','kendaraans.id')
        ->join('pembayarans','transaksis.id','=','pembayarans.id_transaksi')
        ->join('validasipembayarans','pembayarans.id_status_validasi','=','validasipembayarans.id')
        ->where('transaksis.tgl_pesan','<',$now)

        ->orderBy('pembayarans.id')
        ->get();
      
        return view('pemilik.dashboard.riwayat',compact('riwayats'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     /* Fungsi create() untuk menampilkan data kategori, kabupaten yang tersedia, dan jenis bahan bakar
     untuk halaman tambahkendaraan pada dashboard pemilik
     */
    public function create()
    {
        //
       
        $kategoris = kategori::all();
        $kabupatenkotas = kabupatenkota::all();
        $bahanbakars = jenis_bahanbakar::all();

        return view('pemilik.dashboard.tambahkendaraan',compact('kabupatenkotas','kategoris','bahanbakars')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* fungsi store(Request $request) untuk melakukan penyimpanan data kendaraan baru yang
    diinputkan oleh pemilik kendaraan*/
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
         
            'warna_kendaraan' => 'required',
            'gambar_kendaraan' => 'required|image|mimes:jpeg,jpg,png,bmp',
            'foto_stnk' => 'required|image|mimes:jpeg,jpg,png,bmp',
            'transmisi' =>'required',
            'id_bahan_bakar' => 'required',
        ]);
        $gambar_kendaraan = time().$request->gambar_kendaraan->getClientOriginalName(); // buat nama biar ga sama 
        //$request->gambar_kendaraan->storeAs('public/gambar_mobil',$gambar_kendaraan);
        $dir = public_path('storage/gambar_mobil/'.$gambar_kendaraan);
        Image::make($request->gambar_kendaraan)->resize(600,400)->save($dir);
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
        $kendaraan->id_status = 1;
        $kendaraan->gambar_kendaraan =$gambar_kendaraan;
        $kendaraan->foto_stnk =$foto_stnk;
        $kendaraan->transmisi = $request->transmisi;
        $kendaraan->id_bahan_bakar = $request->id_bahan_bakar;    
        $kendaraan->save();
        return redirect()->route('kendaraan.index');

        //
    }

/* fungsi edit(kendaraan $kendaraan) untuk menampilkan halaman editkendaraan
yang ada di dashboard pemilik kendaraan
*/
    public function edit(kendaraan $kendaraan)
    {
        //
        $kategoris = kategori::all();
        $kabupatenkotas = kabupatenkota::all();
        $bahanbakars = Jenis_bahanbakar::all();
        // $kendaraan_old = kendaraan::where('id',$kendaraan);
        
        $pemilik = Auth::guard('web_pemiliks')->user()->id;

        // dd($pemilik);
        if($kendaraan->id_pemilik == $pemilik ){

            return view('pemilik.dashboard.editkendaraan',compact('kabupatenkotas','kategoris','kendaraan','bahanbakars'));
        }else{
            return abort(403, 'Unauthorized action.');
        }
        
    }


/* fungsi update(Request $request, kendaraan $kendaraan) untuk melakukan
perubahan data pada kendaraan yang dimiliki oleh pemilik 
kendaraan
*/
    public function update(Request $request, kendaraan $kendaraan)
    {   
       // dd($request);
        $this->validate($request,[
         
             'nama_kendaraan'=>'required|string|max:100',
             'plat_nomor'=>'required|string|max:15',
             'deskripsi'=>'required|string|min:10',
             'harga_sewa'=>'required',
             'id_kategori'=>'required',
             'id_kabupatenkota'=>'required',
             'id_status'=>'required', 
             'warna_kendaraan' => 'required',
             'gambar_kendaraan' => 'sometimes|image|mimes:jpeg,jpg,png,bmp',
             
             'foto_stnk' => 'sometimes|image|mimes:jpeg,jpg,png,bmp',
             'transmisi' =>'required',
             'id_bahan_bakar' => 'required',
         ]);

         if($request->hasFile('gambar_kendaraan')){
            
             // tambah foto baru
            $gambar_kendaraan = $request->gambar_kendaraan->getClientOriginalName();
            //$request->gambar_kendaraan->storeAs('public/gambar_mobil',$gambar_kendaraan);
            $dir = public_path('storage/gambar_mobil/'.$gambar_kendaraan);
            Image::make($request->gambar_kendaraan)->resize(600,400)->save($dir);
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
            // nama file gambar lama
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
        $kendaraan->transmisi = $request->transmisi;
        $kendaraan->id_bahan_bakar = $request->id_bahan_bakar;    
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
/* Fungsi hapus(kendaraan $kendaraan) untuk melakukan penghapusan data pada kendaraan 
yang dimiliki pemilik kendaraan */
    public function hapus(kendaraan $kendaraan)
    {

        $kendaraan->id_status = '3';
        $kendaraan->save();
        return redirect()->route('kendaraan.index');
    }

    /* fungsi pemilikId() untuk melakukan pengecekan id pada pemilik kendaraan
    yang melakukan loggin*/
    protected function pemilikId(){
        $pemilik = Auth::guard('web_pemiliks')->user()->id; 

        return $pemilik;
    }



}
