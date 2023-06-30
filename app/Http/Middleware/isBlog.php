<?php

namespace App\Http\Middleware;

use Closure;

class isBlog
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
        if ( !empty(\Auth::user()->role) && (\Auth::user()->role === '4' || \Auth::user()->role === '5' || \Auth::user()->role === '3')){
            return $next($request);
        }
        else{
            return redirect('/'); 
        }
        return redirect('/');
    }
}
