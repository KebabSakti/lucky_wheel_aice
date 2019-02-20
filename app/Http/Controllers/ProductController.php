<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function all(Request $request){
    	$Product = Product::where('is_prize', 0)->get();

    	if(count($Product)){
    		$return = true;
    		$message = '';
    		$data = $Product;
    	}else{
    		$return = false;
    		$message = 'Data produk belum ada';
    		$data = '';
    	}

    	return response()->json([
    		'status' => $return,
    		'message' => $message,
    		'data' => $data
    	]);
    }

    public function show($kode){
    	$getProduct = Product::where('kode', $kode)->first();

    	if($getProduct != null){
    		$return = true;
    		$message = '';
    		$data = $getProduct;
    	}else{
    		$return = false;
    		$message = 'Produk tidak ditemukan';
    		$data = '';
    	}

    	return response()->json([
    		'status' => $return,
    		'message' => $message,
    		'data' => $data
    	]);
    }
}
