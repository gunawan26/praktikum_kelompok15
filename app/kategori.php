<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    //model kategori digunakan untuk menyimpan
    //class php yang berhubungan langsung ke database dengan nama tabel
    //kategoris, tabel kategoris menyimpan field id, dan nama_kategori
    //yang berfungsi untuk keterangan kategori pada kendaraan
    //
    protected $fillable = [



    ];

    public function kendaraan(){
        return $this->hasMany(kendaraan::class);
    }
}
