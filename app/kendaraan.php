<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kendaraan extends Model
{
    //
    protected $fillable = [
        'nama_kendaraan',
        'plat_nomor',
        'deskripsi',
        'harga_sewa',
        'id_kategori',
        'id_kabupatenkota',
        'id_status', 
        'gambar_kendaraan',
        'foto_stnk',

    ];

    protected $hidden = [

    ];

    public function pemilik(){

        return $this->belongsTo(pemilik::class);
    }
}
