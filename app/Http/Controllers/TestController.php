<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function base(Request $request){

    	$file = $request->file('pics')->store('public');

    	return response()->json([
    		'return' => true,
    		'data' => asset('storage/ES7W9rGWKvFPGALoluqmnUs0PQQXXzcdjn6OMiI8.png')
    	]);

    }
}
