<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\HealthInsuranceCompany;
use Illuminate\Http\Request;
use App\InsuranceCompany;
use App\Insurance_Type;
use Image;

class InsuranceCompanyController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function company(){
        return view('admin.company.company');
    }

    function save_insurance(Request $request){

        if($request->file('company_logo'))
        {
            $company_logo = $request->file('company_logo');
            $company_logoname = time() . '.' . $request->file('company_logo')->extension();
            $company_logoPath = public_path() . '/company/';
            $company_logo->move($company_logoPath, $company_logoname);
        }

        $company = new InsuranceCompany;

        $company->company_number = "Ins:".uniqid();
        $company->company_name = $request->company_name;
        $company->company_email = $request->company_email;
        $company->company_logo = $company_logoname;

        $company->save();

        return back();

    }

    function update_insurance_page($company_name){
        $company = InsuranceCompany::where('company_name', $company_name)->get();
        return view('admin.company.updatecompany', compact('company'));
    }

    function delete_insurance_company($id){

        $company = InsuranceCompany::find($id);
        $company->delete();

        return redirect()->back();

    }

    function delete_icon_company($id){
        $company = Insurance_Type::find($id);
        $company->delete();

        return redirect()->back();
    }

    function update_insurance(Request $request, $id){


        $company = InsuranceCompany::find($id);

        $company->company_name = $request->company_name;
        $company->company_email = $request->company_email;

        $company->save();

        return redirect()->route('admin.company');
    }

    function company_health(){
        return view('admin.insurance.health');
    }

    function delete_insurance_company_health($id){
        $company = HealthInsuranceCompany::find($id);
        $company->delete();

        return redirect()->back();
    }

    function update_insurance_page_health($name){
        $company = HealthInsuranceCompany::where('name', $name)->get();
        return view('admin.company.upcomh', compact('company'));
    }


    function update_insurance_post_logo(Request $request, $id){

        if($request->file('logo'))
        {
            $logo = $request->file('logo');
            $logoname = time() . '.' . $request->file('logo')->extension();
            $logoPath = public_path() . '/company/';
            $logo->move($logoPath, $logoname);
        }

        $logo = HealthInsuranceCompany::find($id);
        $logo->logo = $logoname;
        $logo->save();

        return redirect()->route('admin.company');
    }

    function update_insurance_post(Request $request, $id){

        $company = HealthInsuranceCompany::find($id);

        $company->name = $request->name;
        $company->link = $request->link;

        $company->save();

        return redirect()->route('admin.company');
    }



    function companyhealth(Request $request){

        if($request->file('logo'))
        {
            $company_logo = $request->file('logo');
            $company_logoname = time() . '.' . $request->file('logo')->extension();
            $company_logoPath = public_path() . '/company/';
            $company_logo->move($company_logoPath, $company_logoname);
        }
        $company =new HealthInsuranceCompany;

        $company->logo = $company_logoname;
        $company->name = $request->name;
        $company->link = $request->link;

        $company->save();

        return redirect()->back();
    }

    function delog($id){
        $logo = HealthInsuranceCompany::find($id);
        $logo->delete();
        return redirect()->back()->with('delete', 'Logo Deleted');
    }



}
