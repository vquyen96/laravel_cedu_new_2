<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'cou_id';
    protected $guarded = [];

    public function tea(){
    	return $this->belongsTo('App\Models\Account','cou_tea_id');
    }
    public function group(){
    	return $this->belongsTo('App\Models\Group','cou_gr_id');
    }
    public function rating()
    {
        return $this->hasMany('App\Models\Rating','rat_cou_id','cou_id');
    }
    public function part()
    {
        return $this->hasMany('App\Models\Part','part_cou_id','cou_id');
    }
    public function orderDe()
    {
        return $this->hasMany('App\Models\OrderDetail','orderDe_cou_id','cou_id');
    }
}
