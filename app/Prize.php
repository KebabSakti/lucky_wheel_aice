<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prize extends Model
{
    use SoftDeletes;

    public function product(){
    	return $this->hasOne('App\Product','kode','kode_produk');
    }

    public function outlet(){
    	return $this->belongsTo('App\Outlet', 'kode_asset');
    }
}
