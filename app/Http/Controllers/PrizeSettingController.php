<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Prize;
use App\Outlet;
use App\Product;

class PrizeSettingController extends Controller
{
    public function prize(){

        $data = Outlet::with('prizes')->whereHas('prizes')->get();

        $pDetail = DB::table('prizes')
                     ->select('kode_produk', DB::raw('count(*) as total'))
                     ->groupBy('kode_produk')
                     ->get();

        $Outlet = Outlet::whereNotIn('kode_asset', function($q){
            $q->select('kode_asset')->from('prizes');
        })->get();

        $Product = Product::all();

        //dd($data->toArray()[0]['prizes']);

    	return view('app.prize', [
            'data' => $data->toArray(), 
            'pDetail' => $pDetail->toArray(),
            'outlet' => $Outlet->toArray(), 
            'product' => $Product->toArray()
        ]);
        

        //dd($pDetail->toArray()[0]->total / 12 * 100);
        
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
        
        $kode = array();
        //siapkan data produk untuk setting hadiah
        for($i=0; $i<count($request->kode_produk); $i++){
            $p = ceil($request->persentase[$i] / 100 * 12);
            
            for($s=0; $s<$p; $s++){
                $kode[] = $request->kode_produk[$i];
            }
        }

        //maksimal 12 item sebagai hadiah
        if(count($kode) > 11){
        	return redirect()->back()->with('alert', 'Gagal. Maksimal 11 item');
        }

        //simpan setting
        for($i=0; $i<count($kode); $i++){
        	$Prize = new Prize;
        	$Prize->kode_asset = $request->kode_asset;
        	$Prize->kode_produk = $kode[$i];
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
