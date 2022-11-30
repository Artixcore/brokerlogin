<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Application;
use App\Customer;
use App\AppDoc;
use PDF;


class ContactsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function contact(){
        return view('admin.contact.contact');
    }

    function customer_number($customer_number){
        $customer = Customer::where('customer_number', $customer_number)->get();
        return view('admin.contact.view', compact('customer'));
    }

    function dos($customer_number){
        $customer = Customer::where('customer_number', $customer_number)->get();
        return view('admin.contact.dos', compact('customer'));
    }

    function application_number($application_number){
       $app = Application::where('application_number', $application_number)->get();
       return view('admin.contact.singleapp', compact('app'));
    }

    function application_doc($application_number){
        $doc = Application::where('application_number', $application_number)->get();
        return view('admin.contact.senddoc', compact('doc'));
     }



     function doc($doc_number){
        $customer = AppDoc::where('doc_number', $doc_number)->get();
        return view('admin.contact.dos', compact('customer'));
    }

    function docs(Request $request){


        if($request->file('insurance_doc'))
        {
            $pdf = $request->file('insurance_doc');
            $pdfname = time() . '.' . $request->file('insurance_doc')->extension();
            $pdfPath = public_path() . '/pdfs/uploads/';
            $pdf->move($pdfPath, $pdfname);
        }

        $application = new AppDoc;
        $application->user_id = Auth::user()->id;
        $application->doc_number = "Doc:".Auth::user()->id.rand(1111,9999);

        $application->insurance_type = $request->insurance_type;
        $application->insurance_email = $request->insurance_email;
        $application->customer_number = $request->customer_number;
        $application->customer_f_name = $request->customer_f_name;
        $application->customer_l_name = $request->customer_l_name;
        $application->customer_email  = $request->customer_email;
        $application->customer_phone  = $request->customer_phone;
        $application->customer_mobile = $request->customer_mobile;
        $application->customer_street = $request->customer_street;
        $application->customer_zip    = $request->customer_zip;
        $application->customer_place  = $request->customer_place;
        $application->doc_comment  = $request->doc_comment;
        $application->insurance_doc = $pdfname;

        $application->save();

        return redirect()->back()->with('success', 'Gespeichert');
    }
}
