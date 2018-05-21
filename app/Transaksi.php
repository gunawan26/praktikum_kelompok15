<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
            //model Transaksi digunakan untuk menyimpan
    //class php yang berhubungan langsung ke database dengan nama tabel
    //transaksis, tabel transaksis menyimpan field id, id_kendaraan
    //, id_user, email, tgl_transaksi,tgl_pesan, tgl_rencanakembali
    //yang berfungsi untuk  menyimpan data transaksi
    public $timestamps = false;
    protected $dates = ['tgl_transaksi'];
    protected $fillable = [
        'id_kendaraan',
        'id_user',
        'tgl_transaksi',
        'tgl_pesan',
        'tgl_rencanakembali',
    ];



}
