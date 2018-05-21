<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
    
class kabupatenkota extends Model
{
    //model kabupatenkota digunakan untuk menyimpan
    //class php yang berhubungan langsung ke database dengan nama tabel
    //kabupatenkotas, tabel kabupatenkotas menyimpan field id, dan nama_kabupaten, provinsi_id
    //yang berfungsi untuk keterangan asal pada kendaraan
    public $timestamps = false;
    
    protected $fillable = [



    ];

    public function provinsi(){

       return $this->belongsTo(provinsi::class);
    }
}
