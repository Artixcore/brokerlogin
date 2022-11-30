<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FromCompany;

class OfferFromController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function view(){

    }
}
