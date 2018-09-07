<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'com_id';
    protected $guarded = [];


    public function acc(){
    	return $this->belongsTo('App\Models\Account','com_acc_id');
    }
    public function cou(){
    	return $this->belongsTo('App\Models\Course','com_cou_id');
    }
}
