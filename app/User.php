<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
        //model User digunakan untuk menyimpan
    //class php yang berhubungan langsung ke database dengan nama tabel
    //users, tabel users menyimpan field id, nama_depan, nama_belakang, email, no_telp, username, password, remember_token,
    //created_at, updated_at, KTP  
    //yang berfungsi untuk  menyimpan data pelanggan 
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'email',
        'no_telp',
        'username',
        'password',
        

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'username',
        'password',

    ];


}
