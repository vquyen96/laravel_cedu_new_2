<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckLogedIn
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
        if(Auth::check()){
            return $next($request);
        }
        else{
            return redirect('');
        }
        // if(Auth::check() && Auth::user()->level > 7){
        //     // Auth::logout();
        //     return redirect('/sairoi');
        // }
        
        
    }
}
