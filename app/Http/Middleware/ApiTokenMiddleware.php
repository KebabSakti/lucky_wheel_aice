<?php

namespace App\Http\Middleware;

use Closure;
use App\Login;
use Carbon\Carbon;

class ApiTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //api token cannot be null
        $request->validate([
            'username' => 'bail|required',
            'api_token' => 'required'
        ]);

        //table login
        $Login = new Login;
        //get token berdasarkan username
        $getLogin = $Login::where('username', $request->username)
                          ->where('api_token', $request->api_token)
                          ->first();

        //cek apakah user sudah di autentikasi di server
        if($getLogin != null){
            return $next($request);
        }

        return response()->json([
            'return' => false,
            'message' => 'API Token mismatch',
            'data' => ''
        ]);
    }
}
