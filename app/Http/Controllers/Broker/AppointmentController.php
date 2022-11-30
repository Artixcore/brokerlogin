<?php

namespace App\Http\Controllers\Broker;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Appointment;
use App\Application;
use App\AppDoc;
use PDF;

class AppointmentController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function appointment(){

        return view('broker.appointment.appointment');
    }



    function update_status(Request $request, $id){

    $app = Application::find($id);

    $app->status = $request->status;

    $app->save();

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
        $application->pdf = $pdfname;
        // $application->status = $request->status;
        $application->save();

        return redirect()->back()->with('success', 'Gespeichert');
    }


    function docs(Request $request){

        // $application->pdf = $request->pdf;
        if($request->file('insurance_doc'))
        {
            $pdf = $request->file('insurance_doc');
            $pdfname = time() . '.' . $request->file('insurance_doc')->extension();
            $pdfPath = public_path() . '/pdfs/uploads/';
            $pdf->move($pdfPath, $pdfname);
        }

        $application = new AppDoc;
        $application->user_id = Auth::user()->id;
        $application->application_number = "Doc:".Auth::user()->id.rand(1111,9999);
        $application->customer_number = $request->customer_number;
        $application->insurance_type = $request->insurance_type;
        $application->customer_name = $request->customer_f_name;
        $application->customer_f_name = $request->customer_l_name;
        $application->customer_phone = $request->customer_phone;
        $application->customer_email = $request->customer_email;
        $application->insurance_doc = $pdfname;
        $application->save();

        return redirect()->back()->with('success', 'Gespeichert');
    }
}
