<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    //
    public $timestamps = false;
    
    protected $fillable = [



    ];
    public function kabupatenkota(){

        return $this->hasMany(kabupatenkota::class);
    }

    public function kendaraans(){
        return $this->hasManyThrough(kendaraan::class,kabupaten::class,'provinsi_id','id_kabupatenkota','id','id');
    }

}
