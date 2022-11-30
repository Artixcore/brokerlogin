<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FremdvertragExport;
use App\Exports\CarInsuranceExport;
use App\Exports\ApplicationExport;
use App\Exports\NachweisExport;
use App\Exports\CustomerExport;
use App\Exports\TravelExport;
use App\Exports\HomeExport;
use App\Exports\LawExport;
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

        return view('admin.appointment.appointment');
    }

    function appointment_post(Request $request){

        $app = new Appointment;

        $app->user_id = Auth::user()->id;
        $app->appointment_number = "A".Auth::user()->name.rand(11111,99999);
        $app->appointment_type = $request->appointment_type;
        $app->appointment_date = $request->appointment_date;
        $app->appointment_time = $request->appointment_time;
        $app->customer_name = $request->customer_name;
        $app->customer_phone = $request->customer_phone;
        $app->customer_email = $request->customer_email;
        $app->appointment_desc = $request->appointment_desc;

        $app->save();

        return redirect()->back()->with('success', 'New Appointment Added');

    }

    public function appExport()
    {
        return Excel::download(new ApplicationExport, 'Application-collection.xlsx');
    }

    public function nachExport()
    {
        return Excel::download(new NachweisExport, 'Nachweis-collection.xlsx');
    }

    function customerExport()
    {
        return Excel::download(new CustomerExport, 'Customer-collection.xlsx');
    }

    function FremdvertragExport()
    {
        return Excel::download(new FremdvertragExport, 'Fremdvertrag-collection.xlsx');
    }

    function CarInsuranceExport()
    {
        return Excel::download(new CarInsuranceExport, 'CarInsurance-collection.xlsx');
    }

    function HomeExport()
    {
        return Excel::download(new HomeExport, 'HomeInsurance-collection.xlsx');
    }

    function LawExport()
    {
        return Excel::download(new LawExport, 'Law Insurance-collection.xlsx');
    }

    function TravelExport()
    {
        return Excel::download(new TravelExport, 'TravelInsurance-collection.xlsx');
    }

    function update_status(Request $request, $id){

    $app = Application::find($id);

    $app->status = $request->status;

    $app->save();

    return redirect()->back()->with('success', 'Status Updated');

    }

    function comission(Request $request, $id){

        $app = Application::find($id);

        $app->commission = $request->commission;
        // $app->commission = $request->commission;

        $app->save();

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
        $application->application_number = "Doc:".Auth::user()->id.rand(1111,9999);
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

        return redirect()->back()->with('success', 'Successfully Added');
    }
}
