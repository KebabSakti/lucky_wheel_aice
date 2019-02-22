<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

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

    public function getCreatedAtAttribute($value){
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-m-Y H:i:s');
    }

    public function prizes(){
    	return $this->hasMany('App\Prize','kode_asset','kode_asset')->with('product');
    }

    public function results(){
        return $this->hasMany('App\Result','kode_asset','kode_asset');
    }
}
