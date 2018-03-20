<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    
    //public function
    public function user(){
        return $this->hasMany(User::class);
    }



}
