<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    //

    protected $fillable = [

        'id_transaksi',
        'tanggal_bayar',
        'bukti_pembayaran',
        'id_status_validasi',

    ];

    protected $hidden = [

    ];


    public function Transaksi(){
        return $this->belongsTo(Transaksi::class);
    }
}
