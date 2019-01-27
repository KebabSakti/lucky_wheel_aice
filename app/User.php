<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'username', 'password','level','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*
    protected $hidden = [
        'password'
    ];
    */

    public function getCreatedAtAttribute($value){
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-m-Y H:i:s');
    }

    public function outlet(){
        return $this->hasOne('App\Outlet','username','username');
    }
}
