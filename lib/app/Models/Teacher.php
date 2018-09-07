<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teacher';
    protected $primaryKey = 'tea_id';
    protected $guarded = [];

    public function acc(){
    	return $this->belongsTo('App\Models\Account','tea_acc_id');
    }
    public function story(){
    	return $this->hasMany('App\Models\Story','sto_tea_id','tea_id');
    }
    public function rate(){
    	return $this->hasMany('App\Models\Teacher_Rating','tr_tea_id','tea_id');
    }
}
