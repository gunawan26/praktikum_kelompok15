<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class pemilik extends Authenticatable
{
    //model pemilik digunakan untuk menyimpan
    //class php yang berhubungan langsung ke database dengan nama tabel
    //pemiliks, tabel pemiliks menyimpan field id, nama_depan, nama_belakang, 
    //email, ktp, no_telp, username, password, remember_token, created_at, updated_at
    //yang berfungsi untuk menyimpan data pemilik kendaraan
    use Notifiable;
    protected $table = 'pemiliks';

    protected $fillable =[
        'nama_depan',
        'nama_belakang',
        'email',
        'ktp',
        'no_telp',
        'username',
        'password',
    ];

    protected $hidden =[
        'email',
        'username',
        'password',
    ];

    public function kendaraan(){

        return $this->hasMany(kendaraan::class);
    }

}
