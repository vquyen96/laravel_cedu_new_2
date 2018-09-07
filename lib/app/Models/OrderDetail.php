<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'orderdetail';
    protected $primaryKey = 'orderDe_id';
    protected $guarded = [];

    public function course(){
    	return $this->belongsTo('App\Models\Course','orderDe_cou_id');
    }
    public function order(){
    	return $this->belongsTo('App\Models\Order','orderDe_ord_id');
    }
    public function aff(){
    	return $this->belongsTo('App\Models\Account','orderDe_aff_id');
    }
    public function code(){
        return $this->hasOne('App\Models\Code', 'code_orderDe_id', 'orderDe_id');
    }
}
