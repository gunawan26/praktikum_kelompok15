<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    //
            //model Pembayaran digunakan untuk menyimpan
    //class php yang berhubungan langsung ke database dengan nama tabel
    //pembayarans, tabel pembayarans menyimpan field id, id_transaksi
    //tanggal_bayar, tgl_batasbayar, bukti_pembayaran,id_status_validasi,created_at, updated_at
    //yang berfungsi untuk menyimpan data pembayaran pelanggan
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
