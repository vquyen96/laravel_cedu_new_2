<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';
    protected $primaryKey = 'id';
    protected $guarded = [];

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
    public function addNew($input)
    {
        $check = static::where('facebook_id',$input['facebook_id'])->first();

        if(is_null($check)){
            return static::create($input);
        }

        return $check;
        
    }

    // public function code()
    // {
    //     return $this->hasMany('App\Models\Code','code_acc_id','id');
    // }
}
