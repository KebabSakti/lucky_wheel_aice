<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\AppUser;
use Session;

class AppAuthController extends Controller
{
    public function index(){
    	return view('login');
    }

    public function login(Request $request){
    	$validation = $request->validate([
    		'username' => 'required',
    		'password' => 'required'
    	]);

    	$AppUser = AppUser::where('username', $request->username)->first();

        if($AppUser != null){
            if(Hash::check($request->password, $AppUser['password'])){
                Session::put('username', $request->username);
                Session::put('level', $AppUser['level']);
                Session::put('auth_token', mt_rand(100000,999999));

                return redirect()->route('app.index');
            }else{
                return redirect()->back()->with('alert','Password salah');
            }
        }else{
            return redirect()->back()->with('alert','User tidak ditemukan');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();

        return redirect()->route('login');
    }
}
