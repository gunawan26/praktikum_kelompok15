<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kendaraan extends Model
{
    //
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

}
