<?php

namespace App\Http\Middleware;

use App\Models\Account;
use Closure;
use Auth;
class CheckTeacher
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
            $arr = [Account::TEACHER, Account::ADMIN_SUPER, Account::ADMIN];
            if(in_array(Auth::user()->level, $arr)){
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
