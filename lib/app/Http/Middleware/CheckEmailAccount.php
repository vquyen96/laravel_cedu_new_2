<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckEmailAccount
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
        if (Auth::guest()){
            return $next($request);
        }
        else{
            $arr_mail = explode('@', Auth::user()->email);
            if (count($arr_mail) > 1) return $next($request);
            else return redirect('get_email');
        }


    }
}
