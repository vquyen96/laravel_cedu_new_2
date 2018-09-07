<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'account_request';
    protected $primaryKey = 'req_id';
    protected $guarded = [];


    public function acc(){
    	return $this->belongsTo('App\Models\Account','req_acc_id');
    }
   	
}
