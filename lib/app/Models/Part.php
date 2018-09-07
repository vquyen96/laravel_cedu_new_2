<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $table = 'part';
    protected $primaryKey = 'part_id';
    protected $guarded = [];

    public function cou(){
    	return $this->belongsTo('App\Models\Course','part_cou_id');
    }
    public function lesson()
    {
        return $this->hasMany('App\Models\Lesson','les_part_id','part_id');
    }
}
