<?php

namespace App\Http\Controllers\Broker;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContractMail;
use App\Application;
use App\Customer;
use App\AppDoc;
use PDF;
use Alert;
use App\Fremdvertrag;
use App\Nachweis;

class ApplicationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function view_page($customer_number){

        $customer = Customer::where('customer_number', $customer_number)->get();
        return view('broker.application.application', compact('customer'));
    }

    function update_status(Request $request, $id){

        $app = Application::find($id);

        $app->status = $request->status;

        $app->save();

        return redirect()->back()->with('success', 'Gespeichert');

        }

    function new(){
        return view('broker.insurance.form');
    }

    function post_application(Request $request){

        // $application->pdf = $request->pdf;
        if($request->file('pdf'))
        {
            $pdf = $request->file('pdf');
            $pdfname = time() . '.' . $request->file('pdf')->extension();
            $pdfPath = public_path() . '/pdfs/uploads/';
            $pdf->move($pdfPath, $pdfname);
        }

        $application = new Application;
        $application->user_id = Auth::user()->id;
        $application->application_number = "Application:".Auth::user()->id.rand(1111,9999);

        $application->customer_number = $request->customer_number;

        $application->customer_f_name = $request->customer_f_name;
        $application->customer_l_name = $request->customer_l_name;
        $application->customer_email  = $request->customer_email;
        $application->customer_phone  = $request->customer_phone;
        $application->customer_mobile = $request->customer_mobile;
        $application->customer_street = $request->customer_street;
        $application->customer_zip    = $request->customer_zip;
        $application->customer_place  = $request->customer_place;

        $application->insurance_type  = $request->insurance_type;
        // $application->insurance_company = $request->insurance_company;
        $application->insurance_email = $request->insurance_email;
        $application->education = $request->education;
        $application->start = $request->start;
        $application->end = $request->end;
        $application->beginning = $request->beginning;
        $application->policy_no = $request->policy_no;
        $application->premium = $request->premium;
        $application->note = $request->note;
        $application->app_comment = $request->app_comment;
        $application->pdf = $pdfname;
        // $application->status = $request->status;
        $application->save();

        return redirect()->back()->with('success', 'Gespeichert');
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
        $application->doc_number = "Doc:". uniqid();
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



    function fremdvertrag(){
        $for = Fremdvertrag::all();
        return view('broker.application.fremdvertrags', compact('for'));
    }

    function fremdvertrag_delete($id){
        $app = Fremdvertrag::find($id);
        $app->delete();
        return redirect()->back();
    }

    function fremdvertrag_edit($con_number){
        $apps = Fremdvertrag::where('con_number', $con_number)->get();
        return view('broker.application.viewfor', compact('apps'));
    }

    function fremdvertrag_page($customer_number){
        $customer = Customer::where('customer_number', $customer_number)->get();
        return view('broker.application.viewfor', compact('customer'));
    }

    function fremdvertrag_post(Request $request){
        if($request->file('pdf'))
        {
            $pdf = $request->file('pdf');
            $pdfname = time() . '.' . $request->file('pdf')->extension();
            $pdfPath = public_path() . '/pdfs/uploads/';
            $pdf->move($pdfPath, $pdfname);
        }

        $application = new Fremdvertrag();

        $application->id = rand(1111,9999);
        $application->user_id = $request->user_id;
        $application->con_number = "F:".Auth::user()->id.rand(1111,9999);

        $application->customer_number = $request->customer_number;

        $application->customer_f_name = $request->customer_f_name;
        $application->customer_l_name = $request->customer_l_name;
        $application->customer_email  = $request->customer_email;
        $application->customer_phone  = $request->customer_phone;
        $application->customer_mobile = $request->customer_mobile;
        $application->customer_street = $request->customer_street;
        $application->customer_zip    = $request->customer_zip;
        $application->customer_place  = $request->customer_place;
        $application->insurance_type  = $request->insurance_type;
        $application->insurance_email = $request->insurance_email;
        $application->start = $request->start;
        $application->end = $request->end;
        $application->beginning = $request->beginning;
        $application->policy_no = $request->policy_no;
        $application->premium = $request->premium;
        $application->note = $request->note;
        $application->pdf = $pdfname;


        $application->save();


        return redirect()->back()->with('success', 'Gespeichert');
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


        return redirect()->back()->with('success', 'Success');

    }

}
