<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';
    protected $primaryKey = 'rat_id';
    protected $guarded = [];


    public function acc(){
    	return $this->belongsTo('App\Models\Account','rat_acc_id');
    }
    public function cou(){
    	return $this->belongsTo('App\Models\Course','rat_cou_id');
    }
}
