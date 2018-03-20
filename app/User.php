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
        'ktp',
        'no_telp',
        'username',
        'password',
        'role_id'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        

    ];


    public function role(){
        return $this->belongsTo(Role::class,'role_id');
    }


    // public function getrole(){
            
    //     foreach ($this->getrole as $role){
    //         if(!$role->role_id){
    //             return false;
    //         }
    //         return $user->role_id;
    //     }


    // }
    

}
