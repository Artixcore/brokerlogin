<?php

namespace App\Http\Controllers\Broker;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\LeadStatus;
use App\LeadNote;
use App\Lead;

class LeadController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function lead(){
        return view('broker.lead.lead');
    }

    function save_lead(Request $request){

        $lead = new Lead;

        $lead->lead_number = "Lead:".Auth::user()->name. uniqid();
        $lead->user_id = Auth::user()->id;
        $lead->f_name = $request->f_name;
        $lead->l_name = $request->l_name;
        $lead->street = $request->street;
        $lead->zip = $request->zip;
        $lead->place = $request->place;
        $lead->phone = $request->phone;
        $lead->email = $request->email;
        $lead->date_of_birth = $request->date_of_birth;
        $lead->current_insurance = $request->current_insurance;
        $lead->number_of_person = $request->number_of_person;
        $lead->lead_status = $request->lead_status;
        $lead->lead_note = $request->lead_note;

        $lead->save();

        return redirect()->back()->with('success', 'Successfully Created Lead');

    }


    function update_lead(Request $request, $id){

        $lead = Lead::find($id);

        $lead->lead_number = $request->lead_number;
        $lead->user_id = $request->user_id;
        $lead->f_name = $request->f_name;
        $lead->l_name = $request->l_name;
        $lead->street = $request->street;
        $lead->zip = $request->zip;
        $lead->place = $request->place;
        $lead->phone = $request->phone;
        $lead->email = $request->email;
        $lead->date_of_birth = $request->date_of_birth;
        $lead->current_insurance = $request->current_insurance;
        $lead->number_of_person = $request->number_of_person;
        $lead->lead_status = $request->lead_status;
        $lead->lead_note = $request->lead_note;
        $lead->save();

        return redirect()->back()->with('success', 'Successfully Created Lead');

    }

    function leadnote(Request $request){

        $note = new LeadNote;
        $note->user_id = $request->user_id;
        $note->lead_number = $request->lead_number;
        $note->lead_note = $request->lead_note;
        $note->save();

        return redirect()->back();

    }

    function leadstatus(Request $request, $id){

        $status = LeadStatus::find($id);
        $status->user_id = $request->user_id;
        $status->lead_number = $request->lead_number;
        $status->lead_status = $request->lead_status;
        $status->save();

        return redirect()->back();
    }

    function view_all($lead_number){
        $leads = Lead::where('lead_number', $lead_number)->get();
        return view('broker.lead.new', compact('leads'));
    }


}
