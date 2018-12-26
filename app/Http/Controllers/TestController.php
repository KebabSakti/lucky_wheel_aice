<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function base(Request $request){

    	$file = $request->file('pics')->store(public_path().'/images/content');

    	return response()->json([
    		'return' => true,
    		'data' => $file
    	]);

    }
}
