<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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
        

    ];

    public function user(){
        return $this;
    }
    // public function myrole(){
    //     return $this->belongsTo(Role::class,'role_id');
    // }

    // public function hasRole($namaRole){
    //     $role = $this->myrole;
    //         if($role->nama_role === $namaRole){
    //             return true;
    //         }
    //         return false;
    

    // }
    

}
