<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckLogedOut
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
        if(Auth::guest()){
            return redirect('login');
        }

        if(Auth::user()->level > 7){
            return redirect('/');
        }
        return $next($request);
    }
}
