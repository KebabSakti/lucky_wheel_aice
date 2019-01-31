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

    public function create(){
        $data = Outlet::with('prizes')->whereHas('prizes')->get();

        $Outlet = Outlet::whereNotIn('kode_asset', function($q){
            $q->select('kode_asset')->from('prizes');
        })->get();

        $Product = Product::all();
        
        return view('app.create', [
            'data' => $data->toArray(), 
            'outlet' => $Outlet->toArray(), 
            'product' => $Product->toArray()
        ]);
    }

    public function add(Request $request){
        $validation = $request->validate([
            'kode_asset' => 'required',
            'kode_produk' => 'required'
        ]);

        //maksimal 12 item sebagai hadiah
        if(count($request->kode_produk) > 12){
        	return redirect()->back()->with('alert', 'Gagal. Maksimal 12 item sebagai hadiah outlet');
        }

        //simpan setting
        for($i=0; $i<count($request->kode_produk); $i++){
        	$Prize = new Prize;
        	$Prize->kode_asset = $request->kode_asset;
        	$Prize->kode_produk = $request->kode_produk[$i];
        	$Prize->save();
        }

        return redirect()->back()->with('alert', 'Berhasil. Setting hadiah ditambahkan');
    }

    public function delete(Request $request){
    	//delete from prize table
    	$Prize = Prize::where('kode_asset', $request->kode_asset)->forceDelete();

    	return redirect()->back()->with('alert', 'Berhasil. Setting telah dihapus');
    }	
}
