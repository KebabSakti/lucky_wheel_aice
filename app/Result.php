<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'no_telp','kode_asset','beli','drawn','menang','kalah','hadiah'
    ];
}
