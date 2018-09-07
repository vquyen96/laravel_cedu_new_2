<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use Socialite;
class AuthController extends Controller
{
    public function redirectToFacebook()
	{
	    return Socialite::driver('facebook')->redirect();
	}

	public function handleFacebookCallback()
	{
	    try {
	        $user = Socialite::driver('facebook')->user();
	        $create['name'] = $user->name;
	        $create['email'] = $user->email;
	        $create['facebook_id'] = $user->id;
	        dd($create);
	        $userModel = new Account;
	        $createdUser = $userModel->addNew($create);
	        Auth::loginUsingId($createdUser->id);
	        return redirect()->route('home');
	    } catch (Exception $e) {
	        return redirect('/');
	    }
	}
}
