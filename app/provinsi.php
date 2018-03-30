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

}
