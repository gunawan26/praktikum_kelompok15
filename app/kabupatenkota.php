<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kabupatenkota extends Model
{
    //
    public $timestamps = false;
    
    protected $fillable = [



    ];

    public function provinsi(){

       return $this->belongsTo(provinsi::class);
    }
}
