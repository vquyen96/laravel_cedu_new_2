<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table = 'story';
    protected $primaryKey = 'sto_id';
    protected $guarded = [];

    public function teacher(){
    	return $this->belongsTo('App\Models\Teacher','sto_tea_id');
    }
    
}
