<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FromCompany;
use App\Nachweis;

class InController extends Controller
{

        function delete_nach($id){
            $task = Nachweis::find($id);
            $task->delete();

            return redirect()->back();
        }

}
