<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Product;

class TestController extends Controller
{

    public function base(Request $request){
       
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

        dd($Product);
    }
}
