<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lead extends Model
{
    protected $table = 'leads';

    protected $fillable = ["f_name","l_name","street","zip","place","phone","email","date_of_birth","current_insurance","number_of_person"];

    function users(){
        return $this->belongsTo(User::class);
    }

    public static function getLead(){

    $records = DB::table('leads')->select("id", "f_name","l_name","street","zip","place","phone","email","date_of_birth","current_insurance","number_of_person")->orderBy('id','ase');
    return $records;

    }

}
