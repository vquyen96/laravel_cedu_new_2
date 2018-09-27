<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Account;
use Auth;
class CheckDetailTeacher
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
            $levels = [Account::ADMIN_SUPER, Account::ADMIN, Account::MANAGING_TEA];
            if( in_array(Auth::user()->level, $levels) ){
                return $next($request);
            }
            else{
                return redirect('admin')->with('error','Bạn không được phép');
            }
        }
        else{
            return redirect('admin')->with('error','Bạn không được phép');
        }
    }
}
