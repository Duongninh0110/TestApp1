<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckAdmin
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
        if(empty(Session::has('admin'))){
            return redirect('/')->with('flash_message_error', 'Only Admin can access to admin pages ');
            
        }else {
            return $next($request);
        }
    }
}
