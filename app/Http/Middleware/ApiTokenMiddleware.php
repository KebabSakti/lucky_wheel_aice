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
        $Login = $Login::where('username', $request->username)
                       ->where('api_token', $request->api_token)
                       ->orderBy('id','desc')
                       ->limit(1)
                       ->get();

        //cek apakah user sudah di autentikasi di server
        if(count($Login)){
            return $next($request);
        }

        return response()->json([
            'response' => false,
            'message' => 'Autentikasi user gagal',
            'data' => ''
        ]);
    }
}
