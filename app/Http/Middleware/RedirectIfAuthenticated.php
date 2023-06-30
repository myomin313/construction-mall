<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
        if (Auth::user()->role == 1) {
            return redirect('/user/dashboard');
        }else if(Auth::user()->role == 2){
            return redirect('/company/dashboard');
        }else if(Auth::user()->role == 3){
            return redirect()->to('/freelancer/profile');
        }else if(Auth::user()->role == 4 || Auth::user()->role == 5 ){
             return redirect('/admin/companies');
        }
        else{
            return redirect('/');
        }
       }        
        return $next($request);
    }
}
