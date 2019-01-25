<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Outlet extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_toko','lat','lng'
    ];

    public function prizes(){
    	return $this->hasMany('App\Prize','kode_asset','kode_asset');
    }
}
