<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class UtilitiesController extends Controller
{
    public function getDaftarProduk(Request $request){
        $Product = Product::where('is_prize', 1)->get();

    	return view('utilities.get_produk', ['produk' => $Product]);
    }
}
