<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function view_page(){
        return view('admin.db.index');
    }
}
