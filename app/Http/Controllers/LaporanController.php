<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;
use App\Result;

class LaporanController extends Controller
{
    public function outlet(){

    	$Outlet = Outlet::whereHas('results')->get();

    	foreach ($Outlet as $outlet) {
    		$Result = Result::where('kode_asset', $outlet['kode_asset'])->get();

    		$o[] = array($outlet['nama_toko'] => array(array('main' => 0)));
    	}

    	dd($o[0]);

    	/*
    	$o[] = array($outlet['nama_toko'] => array(
    			'main' => count($Result->groupBy('session')),
    			'kustomer' => count($Result->groupBy('no_telp')),
    			'spin' => $Result->where('drawn', '>', 0)->count(),
    			'menang' => $Result->whereNotIn('hadiah', ['Zonk',''])->count(),
    			'kalah' => $Result->where('hadiah', 'Zonk')->count()
    		));
    		*/

    	//return view('laporan.outlet.outlet', ['outlet' => $o]);
    }
}
