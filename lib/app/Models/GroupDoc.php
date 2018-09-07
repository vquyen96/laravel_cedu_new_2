<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupDoc extends Model
{
    protected $table = 'groupdoc';
    protected $primaryKey = 'grdoc_id';
    protected $guarded = [];

    public function group(){
    	return $this->belongsTo('App\Models\Group','grdoc_gr_id');
    }
    public function doc()
    {
        return $this->hasMany('App\Models\Doc','doc_grdoc_id','grdoc_id');
    }
    
}
