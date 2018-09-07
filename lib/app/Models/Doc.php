<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    protected $table = 'doc';
    protected $primaryKey = 'doc_id';
    protected $guarded = [];

    public function acc(){
    	return $this->belongsTo('App\Models\Account','doc_acc_id');
    }
    public function grdoc(){
    	return $this->belongsTo('App\Models\GroupDoc','doc_grdoc_id');
    }
    
}
