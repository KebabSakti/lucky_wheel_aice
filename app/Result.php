<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'session','no_telp','kode_asset','beli','drawn','menang','kalah','hadiah'
    ];

    public function outlet(){
        return $this->hasMany('App\Outlet','kode_asset','kode_asset');
    }

    public function customer(){
        return $this->hasMany('App\Customer','no_telp','no_telp');
    }
}
