<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kendaraan extends Model
{
    //
    //model kendaraan digunakan untuk menyimpan
    //class php yang berhubungan langsung ke database dengan nama tabel
    //kendaraans, tabel kendaraans menyimpan field id, dan nama_kendaraan, id_pemilik, plat_nomor, deskripsi, harga_sewa, id_kategori
    //id_kabupatenkota, id_status, gambar_kendaraan, foto_stnk, warna_kendaraan, transmisi dan id_bahan_bakar
    //yang berfungsi untuk menyimpan data kendaraan
    public $timestamps = false;
    protected $fillable = [
        'id_pemilik',
        'nama_kendaraan',
        'plat_nomor',
        'deskripsi',
        'harga_sewa',
        'id_kategori',
        'id_kabupatenkota',
        'id_status', 
        'gambar_kendaraan',
        'foto_stnk',
        'warna_kendaraan',
        'transmisi',
        'id_bahan_bakar',

    ];

    protected $hidden = [

    ];

    public function pemilik(){

        return $this->belongsTo(pemilik::class);
    }
    public function kategori(){
        return $this->belongsTo(kategori::class);
    }

    public function namakategori(){
        return $this->belongsTo(kategori::class,'id_kategori');
    }


    public function namakabupaten(){
        return $this->belongsTo(kabupatenkota::class,'id_kabupatenkota');
    }

    public function kendaraans(){
        return $this->hasManyThrough(provinsi::class,kabupatenkota::class,'provinsi_id','id','id','provinsi_id');
    }

    public function pemiliks(){
        return $this->belongsTo(pemilik::class,'id_pemilik');
    }

    public function bahanbakars(){
        return $this->belongsTo(jenis_bahanbakar::class,'id_bahan_bakar');
    }

}
