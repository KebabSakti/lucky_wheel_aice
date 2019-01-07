<?php

namespace App\Http\Middleware;

use Closure;
use App\Login;
use Carbon\Carbon;
use Validator;

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
        $validator = Validator::make($request->all(), [
          'api_token' => 'required'
        ]);

        if($validator->fails()){
          $return = false;
          $message = 'Akses tidak di izinkan';
          $data = '';
        }else{
          //table login
          $Login = new Login;
          //get token berdasarkan username
          $getLogin = $Login::where('username', $request->username)
                            ->where('api_token', $request->api_token)
                            ->first();

          //cek apakah user sudah di autentikasi di server
          if($getLogin != null){
              return $next($request);
          }else{
            $return = false;
            $message = 'Akses tidak di izinkan';
            $data = '';
          }
        }

        return response()->json([
            'status' => $return,
            'message' => $message,
            'data' => ''
        ]);
    }
}
