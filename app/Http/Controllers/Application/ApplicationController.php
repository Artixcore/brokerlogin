<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContractMail;
use App\Mail\HomeMail;
use App\Fremdvertrag;
use App\Mail\Nachweis;
use App\Mail\CarMail;
use App\Mail\AppDocs;
use App\Application;
use App\Customer;
use App\AppDoc;
use PDF;
use Alert;

class ApplicationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function view_page($customer_number){

        $customer = Customer::where('customer_number', $customer_number)->get();
        return view('admin.application.application', compact('customer'));
    }


    function new(){
        return view('admin.insurance.form');
    }

    function view_mail($application_number){
        $apps = Application::where('application_number', $application_number)->get();
        return view('admin.application.mail', compact('apps'));
    }

    function fremdvertrag(){
        $for = Fremdvertrag::all();
        return view('admin.application.fremdvertrags', compact('for'));
    }

    function fremdvertrag_delete($id){
        $app = Fremdvertrag::find($id);
        $app->delete();
        return redirect()->back();
    }

    function fremdvertrag_edit($con_number){
        $apps = Fremdvertrag::where('con_number', $con_number)->get();
        return view('admin.application.viewfor', compact('apps'));
    }

    function fremdvertrag_page($customer_number){
        $customer = Customer::where('customer_number', $customer_number)->get();
        return view('admin.application.viewfor', compact('customer'));
    }

    function fremdvertrag_post(Request $request){
        if($request->file('pdf'))
        {
            $pdf = $request->file('pdf');
            $pdfname = time() . '.' . $request->file('pdf')->extension();
            $pdfPath = public_path() . '/pdfs/uploads/';
            $pdf->move($pdfPath, $pdfname);
        }

        $application = new Fremdvertrag;

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

    function upgrade(Request $request, $id){


        $request->validate([
            'pdf' => 'nullable|sometimes|max:255',
        ]);

        if($request->file('pdf'))
        {
            $pdf = $request->file('pdf');
            $pdfname = time() . '.' . $request->file('pdf')->extension();
            $pdfPath = public_path() . '/pdfs/uploads/';
            $pdf->move($pdfPath, $pdfname);
        }

        $application = Application::find($id);

        $application->pdf = $pdfname;
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
        $application->education = $request->education;
        $application->start = $request->start;
        $application->end = $request->end;
        $application->beginning = $request->beginning;
        $application->policy_no = $request->policy_no;
        $application->premium = $request->premium;
        $application->note = $request->note;
        $application->app_comment = $request->app_comment;

        $application->save();


        return redirect()->back()->with('success', 'Gespeichert');
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
        $application->user_id = $request->user_id;
        $application->application_number = "A:".Auth::user()->id.rand(1111,9999);

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
        $application->education = $request->education;
        $application->start = $request->start;
        $application->end = $request->end;
        $application->beginning = $request->beginning;
        $application->policy_no = $request->policy_no;
        $application->premium = $request->premium;
        $application->note = $request->note;
        $application->pdf = $pdfname;
        $application->app_comment = $request->app_comment;

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
        $application->doc_number = "Doc:".Auth::user()->id.rand(1111,9999);
        $application->insurance_type = $request->insurance_type;
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

    function delete_docu($id){

        $app = AppDoc::find($id);
        $app->delete();

        return redirect()->back();
    }

    function delete_app($id){

        $app = Application::find($id);
        $app->delete();

        return redirect()->back();
    }


}
