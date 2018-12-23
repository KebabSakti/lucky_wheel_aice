<?php

namespace App\Http\Middleware;

use Closure;
use User;
use Login;

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

        if($request->name != 'aice'){
            return response()->json([
                'return' => false,
                'reason' => 'Not aice',
                'data' => ''
            ]);
        }

        return $next($request);
    }
}
