<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    protected $primaryKey = 'gr_id';
    protected $guarded = [];

    public function course()
    {
        return $this->hasMany('App\Models\Course','cou_gr_id','gr_id');
    }
}
