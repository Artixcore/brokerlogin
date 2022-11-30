<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\TotalApplication;
use App\TotalOExpanse;
use App\TotalExpanse;
use App\Fremdvertrag;
use App\TotalPayment;
use App\Application;
use Carbon\Carbon;
use App\Customer;
use App\OExpanse;
use App\UserDoc;
use App\Expanse;
use App\AppDoc;
use App\FixPay;
use App\Total;
use App\User;

class TotalController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function total($user_id){
       $agent = User::where('id', $user_id)->get();
       return view('admin.agent.cal', compact('agent'));

    }

    function total_app(Request $request){

        $total_app = new TotalApplication();

        $total_app->user_id = $request->user_id;
        $total_app->application_number = $request->application_number;
        $total_app->invoice_no = 'I:'. uniqid();
        $total_app->name = $request->name;
        $total_app->insurance_type = $request->insurance_type;
        $total_app->company = $request->company;
        $total_app->amount = $request->amount;
        $total_app->policy_no = $request->policy_no;

        $total_app->save();

        return redirect()->back();
    }

    function total_expanse(Request $request){

        $total_ex = new TotalExpanse();

        $total_ex->user_id = $request->user_id;
        $total_ex->e_number = 'E.'. uniqid();
        $total_ex->invoice_no = 'I.'. uniqid();
        $total_ex->name = $request->name;
        $total_ex->amount = $request->amount;
        $total_ex->ref = $request->ref;

        $total_ex->save();

        return redirect()->back();

    }

    function total_o_expanse(Request $request){

        $total_o = new OExpanse();

        $total_o->user_id = $request->user_id;
        $total_o->oe_number = 'O'. uniqid();
        $total_o->invoice_no ='I.'. uniqid();
        $total_o->name = $request->name;
        $total_o->amount = $request->amount;
        $total_o->eo_ref = $request->eo_ref;

        $total_o->save();

        return redirect()->back();

    }

    function total_pay(Request $request){

        $total_o = new TotalPayment();

        $total_o->user_id = $request->user_id;
        $total_o->invoice_no ='I.'. uniqid();
        $total_o->name = $request->name;
        $total_o->amount = $request->amount;

        $total_o->save();

        return redirect()->back();
    }

}
