<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppUser;
use Session;

class AppAuthController extends Controller
{
    public function index(){
    	return view('login');
    }

    public function login(Request $request){
    	$validation = $request->validate([
    		'username' => 'required|unique:app_user',
    		'password' => 'required'
    	]);

    	$AppUser = AppUser::where('username', $request->username)->first();
    	
    }
}
