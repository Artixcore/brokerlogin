<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    function users(){
        return $this->belongsTo(User::class);
    }
}
