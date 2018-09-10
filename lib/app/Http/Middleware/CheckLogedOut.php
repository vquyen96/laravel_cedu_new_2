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
            return $next($request);
        }
        else{
            return redirect('/');
        }

        // if(Auth::user()->level > 7){
        //     return redirect('/');
        // }
        
    }
}
