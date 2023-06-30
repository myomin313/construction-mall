<?php

namespace App\Http\Middleware;

use Closure;

class isCompany
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
        if ( !empty(\Auth::user()->role) && \Auth::user()->role === '2' ) {
            return $next($request);
        }
        else{
            return redirect('/'); 
        }
        return redirect('/');
    }
}
