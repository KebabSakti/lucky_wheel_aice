<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Login;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //validasi input
        $request->validate([
            'username' => 'bail|required',
            'password' => 'required'
        ]);

        //tabel user
        $User =  new User;
        $User = $User::where('username', $request->username)
                     ->where('status', 'ON')
                     ->first();

        if($User != null){
            //cek password
            if(Hash::check($request->password, $User->password)){
                //password benar
                $Login = new Login;
                $getLogin = $Login::where('username', $request->username)
                               ->orderBy('id','desc')
                               ->first();
                
                if($getLogin != null){
                    //update token
                    $getLogin->api_token = Hash::make(mt_rand(1000,9999));
                    $getLogin->save();
                }else{
                    //set new token
                    $Login->username = $request->username;
                    $Login->api_token = Hash::make(mt_rand(1000,9999));
                    $Login->save();
                }

                //oke
                $return = true;
                $message = '';
                $data = $Login::where('username', $request->username)->first();
            }else{
                //passowrd salah
                $return = false;
                $message = 'Password salah';
                $data = '';
            }
        }else{
            //user tidak ditemukan
            $return = false;
            $message = 'User tidak ditemukan';
            $data = '';
        }

        return response()->json([
            'return' => $return,
            'message' => $message,
            'data' => $data
        ]);
    }
}
