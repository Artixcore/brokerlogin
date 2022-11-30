<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NachweisMail;
use App\Mail\CarMail;
use App\Mail\HomeMail;
use Illuminate\Http\Request;
use App\Customer;
use App\Nachweis;
use App\User;
use Alert;
use App\Application as AppApplication;
use Application;
use PDF;

class CustomerController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function view_customer(){
        return view('admin.customer.customer');
    }

    function nachweis_view($nachweis_number){
        $nachweis = Nachweis::where('nachweis_number', $nachweis_number)->get();
        return view('admin.customer.viewn', compact('nachweis'));
    }

    function save_customer(Request $request){

        $customer = new Customer;

        $customer->customer_number = "CUS". uniqid();
        $customer->customer_type = $request->customer_type;
        $customer->customer_f_name = $request->customer_f_name;
        $customer->customer_l_name = $request->customer_l_name;
        $customer->customer_street = $request->customer_street;
        $customer->customer_zip = $request->customer_zip;
        $customer->customer_place = $request->customer_place;
        $customer->customer_phone = $request->customer_phone;
        $customer->customer_mobile = $request->customer_mobile;
        $customer->customer_email = $request->customer_email;
        $customer->customer_date_of_birth = $request->customer_date_of_birth;
        $customer->user_id = $request->user_id;

        $customer->save();

        return back()->with('success', 'Kunde gespeichert');
    }


    function edit_customer($customer_number){

        $customer = Customer::where('customer_number', $customer_number)->get();
        return view('admin.application.edit', compact('customer'));
    }

    function delete_customer($id){

        $cus = Customer::find($id);
        $cus->delete();
        return redirect()->back();

    }

    function update_customer(Request $request, $id){

        $customer = Customer::find($id);

        $customer->customer_f_name = $request->customer_f_name;
        $customer->customer_l_name = $request->customer_l_name;
        $customer->customer_street = $request->customer_street;
        $customer->customer_zip = $request->customer_zip;
        $customer->customer_place = $request->customer_place;
        $customer->customer_phone = $request->customer_phone;
        $customer->customer_mobile = $request->customer_mobile;
        $customer->customer_email = $request->customer_email;
        $customer->customer_date_of_birth = $request->customer_date_of_birth;
        $customer->user_id = $request->user_id;
        $customer->save();

        return redirect()->back();


    }


    function nachweis($customer_number){
        $customer = Customer::where('customer_number', $customer_number)->get();
        return view('admin.customer.nachweis', compact('customer'));
    }

    function post_nachweis(Request $request){

        $customer = new Nachweis;

        $customer->user_id = Auth::user()->id;
        $customer->nachweis_number = "N:". uniqid();
        $customer->customer_number = $request->customer_number;
        $customer->customer_type = $request->customer_type;
        $customer->customer_f_name = $request->customer_f_name;
        $customer->customer_l_name = $request->customer_l_name;
        $customer->customer_street = $request->customer_street;
        $customer->customer_zip = $request->customer_zip;
        $customer->customer_place = $request->customer_place;
        $customer->customer_phone = $request->customer_phone;
        $customer->kontrollschild = $request->kontrollschild;
        $customer->grund = $request->grund;
        $customer->customer_mobile = $request->customer_mobile;
        $customer->customer_email = $request->customer_email;
        $customer->customer_date_of_birth = $request->customer_date_of_birth;
        $customer->company_email = $request->company_email;
        $customer->model = $request->model;
        $customer->marke = $request->marke;
        $customer->typenschein = $request->typenschein;
        $customer->inv = $request->inv;
        $customer->Stammnummer = $request->Stammnummer;

        $customer->save();


        return redirect()->route('admin.customer')->with('success', 'Mailed');

    }

    function edit_nachweis($customer_number){
       $customer = Nachweis::where('customer_number', $customer_number)->get();
       return view('admin.customer.editn', compact('customer'));
    }


}
