<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $table = 'code';
    protected $primaryKey = 'code_id';
    protected $guarded = [];

    // public function acc(){
    // 	return $this->belongsTo('App\Models\Account','code_acc_id');
    // }
    // public function cou(){
    // 	return $this->belongsTo('App\Models\Course','code_cou_id');
    // }
    public function orderDe(){
    	return $this->belongsTo('App\Models\OrderDetail','code_orderDe_id');
    }

}
