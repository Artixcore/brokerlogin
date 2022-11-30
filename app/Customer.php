<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    function users(){
        return $this->belongsTo(User::class);
    }
}
