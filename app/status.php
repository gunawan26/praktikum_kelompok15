<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    //model status digunakan untuk menyimpan
    //class php yang berhubungan langsung ke database dengan nama tabel
    //statuses, tabel statuses menyimpan field id, dan nama_status
    //yang berfungsi untuk  menyimpan keterangan status untuk data kendaraan
    public $timestamps = false;
}
