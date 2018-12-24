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

        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        //validasi input
        $request->validate([
            'username' => 'bail|required',
            'password' => 'required'
        ]);

        //tabel user
        $User =  new User;
        $User = $User::where('username', $request->username)->get();

        if(count($User)){
            //cek password
            if(Hash::check($request->password, $User[0]->password)){
                //password benar
                $Login = new Login;

                //set token login
                $Login->username = $request->username;
                $Login->api_token = Hash::make(mt_rand(1000,9999));
                $Login->save();

                //oke
                $response = true;
                $message = '';
                $data = $Login::where('username', $request->username)->orderBy('id','desc')->limit(1)->get();
            }else{
                //passowrd salah
                $response = false;
                $message = 'Password salah';
                $data = '';
            }
        }else{
            //user tidak ditemukan
            $response = false;
            $message = 'User tidak ditemukan';
            $data = '';
        }

        return response()->json([
            'response' => $response,
            'message' => $message,
            'data' => $data
        ]);
    }
}
