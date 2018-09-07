<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher_Rating extends Model
{
    protected $table = 'teacher_rating';
    protected $primaryKey = 'tr_id';
    protected $guarded = [];

    public function teacher(){
    	return $this->belongsTo('App\Models\Teacher','tr_tea_id');
    }
    public function acc(){
    	return $this->belongsTo('App\Models\Account','tr_acc_id');
    }
    // public function story(){
    // 	return $this->hasMany('App\Models\Story','sto_tea_id','tea_id');
    // }

}
