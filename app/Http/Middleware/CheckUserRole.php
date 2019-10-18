<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Auth;
class CheckUserRole
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
        if($request->user()->role === 'user'){
            return redirect()->route('user.homepage');
        }
        return $next($request);
    }
}
