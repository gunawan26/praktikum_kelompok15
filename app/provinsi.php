<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    //
    //model provinsi digunakan untuk menyimpan
    //class php yang berhubungan langsung ke database dengan nama tabel
    //provinsis, tabel provinsis menyimpan field id, dan nama_provinsi
    //yang berfungsi untuk  menyimpan data provinsi 
    //yang tersedia
    public $timestamps = false;
    
    protected $fillable = [



    ];
    public function kabupatenkota(){

        return $this->hasMany(kabupatenkota::class);
    }



}
