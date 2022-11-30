<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Invoice;
use App\User;
use Alert;


class InvoiceController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }
    
    function invoice(){
        return view('admin.invoice.invoice');
    }

    function new(){
        return view('admin.invoice.make');
    }

    function post(Request $request){

        $invoice = new Invoice;

        $invoice->user_id = Auth::user()->id;
        $invoice->invoice_number = "Invoice".Auth::user()->id.rand(11111,99999);
        $invoice->customer_name = $request->customer_name;
        $invoice->customer_phone = $request->customer_phone;
        $invoice->customer_email = $request->customer_email;
        $invoice->agent_name = $request->agent_name;
        $invoice->agent_email = $request->agent_email;
        $invoice->agent_phone = $request->agent_phone;
        $invoice->insurance_type = $request->insurance_type;
        $invoice->insurance_company = $request->insurance_company;
        $invoice->insurance_date = $request->insurance_date;
        $invoice->details = $request->details;

        $invoice->save();

        return back('admin/invoice/invoice')->with('success', 'Invoice is Ready Please Check List');

    }

    function invoice_number($invoice_number){
       
    }


}

