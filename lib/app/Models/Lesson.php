<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Leaning;

class Lesson extends Model
{
    protected $table = 'lesson';
    protected $primaryKey = 'les_id';
    protected $guarded = [];

    public function part(){
        return $this->belongsTo('App\Models\Part','les_part_id');
    }

//
}
