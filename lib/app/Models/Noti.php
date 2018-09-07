<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noti extends Model
{
    protected $table = 'notification';
    protected $primaryKey = 'noti_id';
    protected $guarded = [];
}
