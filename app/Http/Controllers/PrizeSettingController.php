<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prize;
use App\Outlet;

class PrizeSettingController extends Controller
{
    public function prize(){

    	/*
    	$prize = array();
    	foreach (Outlet::all() as $outlet) {
    		//$prize[] = Outlet::where('kode_asset', $outlet['kode_asset'])->first()->prizes()->get();	

    		$prize[$outlet['kode_asset']] = array(Outlet::where('kode_asset', $outlet['kode_asset'])->first()->prizes()->get());
    	}
    	*/

    	$prize = Prize::find(1);

    	/*
    	foreach ($prize as $p) {
    		dd($p);
    	}
    	*/

    	dd($prize->outlets);

    	return view('app.prize');
    }
}
