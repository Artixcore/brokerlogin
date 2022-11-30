<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    function users(){
        return $this->belongsTo(User::class);
    }
}
