<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aff extends Model
{
    protected $table = 'aff';
    protected $primaryKey = 'aff_id';
    protected $guarded = [];

    public function acc(){
    	return $this->belongsTo('App\Models\Account','aff_acc_id');
    }
    // public function orderDe(){
    // 	return $this->hasMany('App\Models\OrderDetail','orderDe_aff_id','aff_id');
    //     // return $this->hasMany('App\Models\OrderDetail','orderDe_ord_id','ord_id');
    // }
    // public function acc(){
    // 	return $this->belongsTo('App\Models\Account','tea_acc_id');
    // }
}
