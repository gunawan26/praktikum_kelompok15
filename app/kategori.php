<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    //
    protected $fillable = [



    ];

    public function kendaraan(){
        return $this->hasMany(kendaraan::class);
    }
}
