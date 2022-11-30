<?php


namespace App\Http\Controllers\Broker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function view_dashboard(){
        return view('broker.dashboard.dashboard');
    }
}
