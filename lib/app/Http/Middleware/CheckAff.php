<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckAff
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
            if(Auth::user()->level == 8){
                return $next($request);
            }
            else{
                return redirect('');
            }
        }
        else{
            return redirect('');
        }
    }
}
