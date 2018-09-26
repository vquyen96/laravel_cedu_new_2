<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';
    protected $guarded = [];

    public function acc(){
    	return $this->belongsTo('App\Models\Account','acc_id');
    }
}
