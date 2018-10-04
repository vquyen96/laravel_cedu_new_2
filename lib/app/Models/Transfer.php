<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $table = 'transfers';
    protected $guarded = [];
    public $timestamps = false;


    public function orderDe(){
        return $this->belongsTo('App\Models\OrderDetail','orderDe_id');
    }
}
