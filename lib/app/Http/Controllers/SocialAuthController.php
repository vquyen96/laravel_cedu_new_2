<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Log;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Socialite, Redirect, Session, URL;
class SocialAuthController extends Controller
{
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        try {
            $user = SocialAccountService::createOrGetUser(Socialite::driver($social)->user(), $social);
            auth()->login($user);

            return redirect()->to('/home');
        } catch (Exception $e) {
           return redirect('errors');
        }
       
    }

    public function redirectToProvider($provider)
    {
        try {
            if(!Session::has('pre_url')){
                Session::put('pre_url', URL::previous());
            }else{
                if(URL::previous() != URL::to('login')) Session::put('pre_url', URL::previous());
            }
            return Socialite::driver($provider)->redirect();
        }

        catch (customException $e) {
           return redirect('errors');
        }
            
    }  

    /**
     * Lấy thông tin từ Provider, kiểm tra nếu người dùng đã tồn tại trong CSDL
     * thì đăng nhập, ngược lại nếu chưa thì tạo người dùng mới trong SCDL.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {

        try {
            $user = Socialite::driver($provider)->stateless()->user();
//             dd($user);
            $authUser = $this->findOrCreateUser($user, $provider);
            $arr = ['email' => $authUser->email, 'password' => $authUser->provider_id];
            Auth::loginUsingId($authUser->id);
            if(Auth::check()){
                // return Redirect::to(Session::get('pre_url'));
                if (Auth::user()->level > 6) {
                    return redirect('')->with('success','Đăng nhập thành công');
                }
                else{
                    return redirect('admin/account');
                }
            }
            else{
                return redirect('')->withInput()->with('error','Bạn đã có tài khoản rồi');
            }
            return Redirect::to(Session::get('pre_url'));
        }

        catch (customException $e) {
           return redirect('errors');
        }
            
    }

    /**
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {

        try {
            $authUser = Account::where('provider_id', $user->id)->first();
            if ($authUser) return $authUser;

//            if ($user->email == null || $user->email == "" ) {
//                $user->email = $user->id;
//            }
            return Account::create([
                'name'     => $user->name,
                'email'    => $user->email,
                'img'      => $user->avatar,
                'provider' => $provider,
                'provider_id' => $user->id,
                'password' => bcrypt($user->id)
            ]);
            
        }

        catch (customException $e) {
           return redirect('errors');
        }
            
    }
}