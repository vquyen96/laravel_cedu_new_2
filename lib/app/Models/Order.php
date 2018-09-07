<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'ord_id';
    protected $guarded = [];

    public function acc(){
    	return $this->belongsTo('App\Models\Account','ord_acc_id');
    }
    public function ctv(){
    	return $this->belongsTo('App\Models\Account','ord_ctv_id');
    }
    public function orderDe(){
    	return $this->hasMany('App\Models\OrderDetail','orderDe_ord_id','ord_id');
    }
}
