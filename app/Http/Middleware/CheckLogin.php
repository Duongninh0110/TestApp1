<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckLogin
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
        if(empty(Auth::check())){
            return redirect('user-login')->with('flash_message_error', 'Please login or register to access');
            
        }else {
            return $next($request);
        }
    }
}
