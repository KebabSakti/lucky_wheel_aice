<?php

namespace App\Http\Middleware;

use Closure;

class AppAuthMiddleware
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
        if(!empty($request->session()->get('username')) && !empty($request->session()->get('auth_token')) && !empty($request->session()->get('level'))){

            return $next($request);
        }

        return redirect()->route('login')->with('alert','Anda harus login untuk akses halaman ini');
    }
}
