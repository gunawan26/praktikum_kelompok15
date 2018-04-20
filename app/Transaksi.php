<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    public $timestamps = false;
    
    protected $fillable = [
        'id_kendaraan',
        'id_user',
        'tgl_transaksi',
        'tgl_pesan',
        'tgl_rencanakembali',


    ];
}
