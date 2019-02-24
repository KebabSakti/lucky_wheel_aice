<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_telp','nama','sp_prize'
    ];

    public function results(){
        return $this->hasMany('App\Result','no_telp','no_telp');
    }
}
