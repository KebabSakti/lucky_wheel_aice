<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function base(){
    	return response()->json([
    		'return' => true,
    		'data' => 'passed'
    	]);
    }
}
