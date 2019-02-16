<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class UtilitiesController extends Controller
{
    public function getDaftarProduk(Request $request){
    	return view('utilities.get_produk', ['kode_produk' => $request->kode, 'nama_produk' => $request->nama]);
    }
}
