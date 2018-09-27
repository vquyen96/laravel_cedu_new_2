<?php

namespace App\Models;

use Mockery\Exception;
use Illuminate\Support\Facades\Hash;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Illuminate\Database\Eloquent\Model;

class Account extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    protected $table = 'accounts';
    protected $primaryKey = 'id';
    protected $guarded = [];

    const ADMIN_SUPER = 1;
    const ADMIN = 2;
    const ACCOUNTANT = 3;
    const EDITOR = 4;
    const MANAGING_TEA = 5;
    const MANAGING_AFF = 6;
    const TEACHER = 7;
    const AFFILIATE = 8;
    const USER =  9;


    public function course()
    {
        return $this->hasMany('App\Models\Course','cou_tea_id','id');
    }
    public function order()
    {
        return $this->hasMany('App\Models\Order','ord_acc_id','id');
    }
     public function aff_orderDe()
    {
        return $this->hasMany('App\Models\OrderDetail','orderDe_aff_id','id');
    }

    public function teacher()
    {
        return $this->hasOne('App\Models\Teacher','tea_acc_id','id');
    }
    public function aff()
    {
        return $this->hasOne('App\Models\Aff','aff_acc_id','id');
    }
    public function sale()
    {
        return $this->hasMany('App\Models\Sale','acc_id','id');
    }
    public function addNew($input)
    {
        $check = static::where('facebook_id',$input['facebook_id'])->first();

        if(is_null($check)){
            return static::create($input);
        }

        return $check;
        
    }
//    public function __construct()
//    {
//        $user = Auth::user();
//    }



    // public function code()
    // {
    //     return $this->hasMany('App\Models\Code','code_acc_id','id');
    // }
    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        // TODO: Implement getAuthIdentifierName() method.
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        // TODO: Implement getAuthIdentifier() method.
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        // TODO: Implement getEmailForPasswordReset() method.
    }

    /**
     * Send the password reset notification.
     *
     * @param  string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        // TODO: Implement sendPasswordResetNotification() method.
    }
}
