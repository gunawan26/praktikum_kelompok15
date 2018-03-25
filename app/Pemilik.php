<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class pemilik extends Authenticatable
{
    //
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

    ];

    public function pemilik(){
        
    }
}
