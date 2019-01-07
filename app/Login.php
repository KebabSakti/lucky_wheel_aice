<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public function outlet(){
        return $this->hasOne('App\Outlet','username','username');
    }
}
