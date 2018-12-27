<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class TestController extends Controller
{
    public function base(Request $request){

    	$fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $request->file('pics')->getClientOriginalExtension();
    	$file = $request->file('pics')->move(public_path('images'), $fileName);

    	return response()->json([
    		'return' => true,
    		'data' => asset('images/'.$fileName)
    	]);

    }
}
