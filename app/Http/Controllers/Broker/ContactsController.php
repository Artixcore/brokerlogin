<?php

namespace App\Http\Controllers\Broker;

use App\AppDoc;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Application;
use App\Customer;


class ContactsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function contact(){
        return view('broker.contact.contact');
    }

    function customer_number($customer_number){
        $customer = Customer::where('customer_number', $customer_number)->get();
        return view('broker.contact.view', compact('customer'));
    }

    function doc($doc_number){
        $customer = AppDoc::where('doc_number', $doc_number)->get();
        return view('broker.contact.doc', compact('customer'));
    }

    function appli($application_number){
        $app = Application::where('application_number', $application_number)->get();
        return view('broker.contact.app', compact('app'));
    }
}


