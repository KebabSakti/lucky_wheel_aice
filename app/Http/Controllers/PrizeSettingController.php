<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prize;
use App\Outlet;
use App\Product;

class PrizeSettingController extends Controller
{
    public function prize(){

        $data = Outlet::with('prizes')->whereHas('prizes')->get();

        $Outlet = Outlet::whereNotIn('kode_asset', function($q){
            $q->select('kode_asset')->from('prizes');
        })->get();

        $Product = Product::all();

    	return view('app.prize', [
            'data' => $data->toArray(), 
            'outlet' => $Outlet->toArray(), 
            'product' => $Product->toArray()
        ]);
    }

    public function add(Request $request){
        $validation = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
    }
}
