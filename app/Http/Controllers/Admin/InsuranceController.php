<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Insurance_Type;
use App\HomeInsurance;
use App\CarInsurance;
use App\Mail\CarMail;
use App\Mail\HomeMail;
use App\Mail\Car;
use App\UpFile;
use Alert;
use App\Law;
use App\Travel;

class InsuranceController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }


    function commission(){
        return view('admin.commission.commission');
    }


    function insurance(){

        return view('admin.insurance.all');
    }

    function form(){
        return view('admin.insurance.form');
    }

    function home(){
        return view('admin.insurance.home');
    }

    function car_list(){
        return view('admin.insurance.list.car');
    }

    function view_single_car($insurance_number){
        $insurance = CarInsurance::where('insurance_number', $insurance_number)->get();
        return view('admin.insurance.list.viewcar', compact('insurance'));
    }


    function home_list(){
        return view('admin.insurance.list.home');
    }

    function view_single_home($insurance_number){
        $insurance = HomeInsurance::where('insurance_number', $insurance_number)->get();
        return view('admin.insurance.list.viewhome', compact('insurance'));
    }

    function insurance_home_delete($id){
           $insurance = HomeInsurance::find($id);
           $insurance->delete();
           return redirect()->back();
    }

    function insurance_car_delete($id){
        $insurance = CarInsurance::find($id);
        $insurance->delete();
        return redirect()->back();
    }


    // Travel
    function travel(){
        return view('admin.insurance.travel');
    }

    function travel_list(){
        $list = Travel::where('user_id', auth()->id())->get();
        return view('admin.insurance.list.travel', compact('list'));
    }

    function travel_edit($travel_number){
        $travel = Travel::where('travel_number', $travel_number)->get();
        return view('admin.insurance.list.viewtravel', compact('travel'));
    }

    function travel_post(Request $request){

        $law = new Travel();

        $law->travel_number = 'T:'. uniqid();
        $law->user_id = Auth::user()->id;
        $law->salutation = $request->salutation;
        $law->f_name = $request->f_name;
        $law->l_name = $request->l_name;
        $law->street = $request->street;
        $law->zip = $request->zip;
        $law->email = $request->email;
        $law->phone = $request->phone;
        $law->place = $request->place;
        $law->birthday = $request->birthday;
        $law->nationality = $request->nationality;
        $law->employment_relation = $request->employment_relation;
        $law->current_job = $request->current_job;
        $law->begin = $request->begin;
        $law->laggage = $request->laggage;
        $law->Summe = $request->Summe;
        $law->SB = $request->SB;
        $law->scope = $request->scope;
        $law->person = $request->person;
        $law->comments = $request->comments;
        $law->insurance_type = $request->insurance_type;
        $law->insurance_email = $request->insurance_email;
        $law->insurance_email_b = $request->insurance_email_b;
        $law->insurance_email_c = $request->insurance_email_c;

        $law->save();

        return redirect()->back()->with('success', 'Gespeichert');
    }

    function travel_delete($id){
        $form = Travel::find($id);
        $form->delete();
        return redirect()->back();
    }


    function travel_update(Request $request, $id){

        $law = Travel::find($id);

        $law->salutation = $request->salutation;
        $law->f_name = $request->f_name;
        $law->l_name = $request->l_name;
        $law->street = $request->street;
        $law->zip = $request->zip;
        $law->email = $request->email;
        $law->phone = $request->phone;
        $law->place = $request->place;
        $law->birthday = $request->birthday;
        $law->nationality = $request->nationality;
        $law->employment_relation = $request->employment_relation;
        $law->current_job = $request->current_job;
        $law->laggage = $request->laggage;
        $law->begin = $request->begin;
        $law->scope = $request->scope;
        $law->person = $request->person;
        $law->comments = $request->comments;
        $law->insurance_type = $request->insurance_type;
        $law->insurance_email = $request->insurance_email;
        $law->insurance_email_b = $request->insurance_email_b;
        $law->insurance_email_c = $request->insurance_email_c;

        $law->save();

        return redirect()->route('admin.form.law.list')->with('success', 'Gespeichert');
    }




    function law(){
        return view('admin.insurance.law');
    }

    function law_list(){
        $list = Law::where('user_id', auth()->id())->get();
        return view('admin.insurance.list.law', compact('list'));
    }

    function law_delete($id){
        $form = Law::find($id);
        $form->delete();
        return redirect()->back();
    }

    function law_post(Request $request){

        $law = new Law();

        $law->law_number = 'L:'. uniqid();
        $law->user_id = Auth::user()->id;
        $law->salutation = $request->salutation;
        $law->f_name = $request->f_name;
        $law->l_name = $request->l_name;
        $law->street = $request->street;
        $law->zip = $request->zip;
        $law->email = $request->email;
        $law->phone = $request->phone;
        $law->place = $request->place;
        $law->birthday = $request->birthday;
        $law->nationality = $request->nationality;
        $law->employment_relation = $request->employment_relation;
        $law->current_job = $request->current_job;
        $law->private = $request->private;
        $law->traffic = $request->traffic;
        $law->self_employ = $request->self_employ;
        $law->company = $request->company;
        $law->scope = $request->scope;
        $law->person = $request->person;
        $law->comments = $request->comments;
        $law->insurance_type = $request->insurance_type;
        $law->insurance_email = $request->insurance_email;
        $law->insurance_email_b = $request->insurance_email_b;
        $law->insurance_email_c = $request->insurance_email_c;

        $law->save();

        return redirect()->back()->with('success', 'Gespeichert');
    }


    function law_edit($law_number){
        $law = Law::where('law_number', $law_number)->get();
        return view('admin.insurance.list.viewlaw', compact('law'));
    }


    function law_update(Request $request, $id){

        $law = Law::find($id);

        $law->salutation = $request->salutation;
        $law->f_name = $request->f_name;
        $law->l_name = $request->l_name;
        $law->street = $request->street;
        $law->zip = $request->zip;
        $law->email = $request->email;
        $law->phone = $request->phone;
        $law->place = $request->place;
        $law->birthday = $request->birthday;
        $law->nationality = $request->nationality;
        $law->employment_relation = $request->employment_relation;
        $law->current_job = $request->current_job;
        $law->private = $request->private;
        $law->traffic = $request->traffic;
        $law->self_employ = $request->self_employ;
        $law->company = $request->company;
        $law->scope = $request->scope;
        $law->person = $request->person;
        $law->comments = $request->comments;
        $law->insurance_type = $request->insurance_type;
        $law->insurance_email = $request->insurance_email;
        $law->insurance_email_b = $request->insurance_email_b;
        $law->insurance_email_c = $request->insurance_email_c;

        $law->save();

        return redirect()->route('admin.form.law.list')->with('success', 'Gespeichert');
    }

    function view_single_home_post(Request $request, $id){

        $request->validate([
            'home_file' => 'nullable|max:255',
            'c_i_p_5_y' => 'nullable|max:255',
            'how_many' => 'nullable|max:255',
            'amount_per_clain' => 'nullable|max:255',
            'operations' => 'nullable|max:255',
            'terminated' => 'nullable|max:255',
            'flat_roof' => 'nullable|max:255',
            'building' => 'nullable|max:255',
            'type_of_building' => 'nullable|max:255',
            'address_from_the_object' => 'nullable|max:255',
            'rooms' => 'nullable|max:255',
            'persons' => 'nullable|max:255',
            'sam_insured' => 'nullable|max:255',

            'building_water' => 'nullable|max:255',
            'building_glass' => 'nullable|max:255',
            'floor_heating' => 'nullable|max:255',
            'bauart' => 'nullable|max:255',
            'hydrant' => 'nullable|max:255',
            'valuables' => 'nullable|max:255',


            'f_o_e_d' => 'nullable|max:255',
            'f_o_e_d_deduetible' => 'nullable|max:255',
            'theft_abroad' => 'nullable|max:255',
            'theft_deduetible' => 'nullable|max:255',
            'electro' => 'nullable|max:255',
            'electro_total' => 'nullable|max:255',
            'electro_deduetible' => 'nullable|max:255',
            'water' => 'nullable|max:255',
            'buidliung' => 'nullable|max:255',
            'luggage' => 'nullable|max:255',
            'luggage_total' => 'nullable|max:255',
            'glass' => 'nullable|max:255',
            'cyber_schutz' => 'nullable|max:255',
            'personal_liability' => 'nullable|max:255',
            'personal_liability_total' => 'nullable|max:255',
            'personal_liability_deductible' => 'nullable|max:255',
            'other_insurance' => 'nullable|max:255',
            'comments' => 'nullable|max:255',
            'insurance_email_c' => 'nullable|max:255',
            'insurance_email_b' => 'nullable|max:255',
        ]);

        $home = HomeInsurance::find($id);

        $home->insurance_type = $request->insurance_type;


        $home->salutation = $request->salutation;
        $home->f_name = $request->f_name;
        $home->l_name = $request->l_name;
        $home->surename = $request->surename;
        $home->street = $request->street;
        $home->post_code = $request->post_code;
        $home->nationality = $request->nationality;
        $home->date_of_birth = $request->date_of_birth;
        $home->residence = $request->residence;
        $home->phone = $request->phone;
        $home->email = $request->email;

        $home->c_i_p_5_y = $request->c_i_p_5_y;
        $home->how_many = $request->how_many;
        $home->amount_per_clain = $request->amount_per_clain;
        $home->operations = $request->operations;
        $home->terminated = $request->terminated;
        $home->flat_roof = $request->flat_roof;
        $home->building = $request->building;
        $home->type_of_building = $request->type_of_building;
        $home->address_from_the_object = $request->address_from_the_object;
        $home->rooms = $request->rooms;
        $home->persons = $request->persons;
        $home->sam_insured = $request->sam_insured;

        // new

        $home->building_water = $request->building_water;
        $home->building_glass = $request->building_glass;
        $home->floor_heating = $request->floor_heating;
        $home->hydrant = $request->hydrant;
        $home->bauart = $request->bauart;
        $home->valuables = $request->valuables;

        // Details

        $home->f_o_e_d = $request->f_o_e_d;
        $home->f_o_e_d_deduetible = $request->f_o_e_d_deduetible;
        $home->theft_abroad = $request->theft_abroad;
        $home->theft_deduetible = $request->theft_deduetible;
        $home->electro = $request->electro;
        $home->electro_total = $request->electro_total;
        $home->electro_deduetible = $request->electro_deduetible;
        $home->water = $request->water;
        $home->buidliung = $request->buidliung;
        $home->luggage = $request->luggage;
        $home->luggage_total = $request->luggage_total;
        $home->glass = $request->glass;
        $home->cyber_schutz = $request->cyber_schutz;

        // Insurance

        $home->personal_liability = $request->personal_liability;
        $home->personal_liability_total = $request->personal_liability_total;
        $home->personal_liability_deductible = $request->personal_liability_deductible;
        $home->other_insurance = $request->other_insurance;
        $home->comments = $request->comments;
        $home->insurance_email = $request->insurance_email;
        $home->insurance_email_b = $request->insurance_email_b;
        $home->insurance_email_c = $request->insurance_email_c;

        $home->save();


        return redirect()->back()->with('success', 'Gespeichert');
    }


    function home_form(Request $request){

        $request->validate([
            'home_file' => 'nullable|max:255',
            'c_i_p_5_y' => 'nullable|max:255',
            'how_many' => 'nullable|max:255',
            'amount_per_clain' => 'nullable|max:255',
            'operations' => 'nullable|max:255',
            'terminated' => 'nullable|max:255',
            'flat_roof' => 'nullable|max:255',
            'building' => 'nullable|max:255',
            'type_of_building' => 'nullable|max:255',
            'address_from_the_object' => 'nullable|max:255',
            'rooms' => 'nullable|max:255',
            'persons' => 'nullable|max:255',
            'sam_insured' => 'nullable|max:255',
            'f_o_e_d' => 'nullable|max:255',
            'f_o_e_d_deduetible' => 'nullable|max:255',
            'theft_abroad' => 'nullable|max:255',
            'theft_deduetible' => 'nullable|max:255',
            'electro' => 'nullable|max:255',
            'electro_total' => 'nullable|max:255',
            'electro_deduetible' => 'nullable|max:255',
            'water' => 'nullable|max:255',
            'buidliung' => 'nullable|max:255',
            'luggage' => 'nullable|max:255',
            'luggage_total' => 'nullable|max:255',
            'glass' => 'nullable|max:255',
            'cyber_schutz' => 'nullable|max:255',
            'personal_liability' => 'nullable|max:255',
            'personal_liability_total' => 'nullable|max:255',
            'personal_liability_deductible' => 'nullable|max:255',
            'other_insurance' => 'nullable|max:255',
            'comments' => 'nullable|max:255',
            'insurance_email_b' => 'nullable|max:255',
            'insurance_email_c' => 'nullable|max:255',
        ]);


        $home = new HomeInsurance;


        $home->user_id = Auth::user()->id;
        $home->insurance_number = "Inc:Home".Auth::user()->name.rand(0000,9999);

        $home->insurance_type = $request->insurance_type;

        $home->salutation = $request->salutation;
        $home->f_name = $request->f_name;
        $home->l_name = $request->l_name;
        $home->surename = $request->surename;
        $home->street = $request->street;
        $home->post_code = $request->post_code;
        $home->nationality = $request->nationality;
        $home->date_of_birth = $request->date_of_birth;
        $home->residence = $request->residence;
        $home->phone = $request->phone;
        $home->email = $request->email;

        $home->c_i_p_5_y = $request->c_i_p_5_y;
        $home->how_many = $request->how_many;
        $home->amount_per_clain = $request->amount_per_clain;
        $home->operations = $request->operations;
        $home->terminated = $request->terminated;
        $home->flat_roof = $request->flat_roof;
        $home->building = $request->building;
        $home->type_of_building = $request->type_of_building;
        $home->address_from_the_object = $request->address_from_the_object;
        $home->rooms = $request->rooms;
        $home->persons = $request->persons;
        $home->sam_insured = $request->sam_insured;

        // Details

        $home->f_o_e_d = $request->f_o_e_d;
        $home->f_o_e_d_deduetible = $request->f_o_e_d_deduetible;
        $home->theft_abroad = $request->theft_abroad;
        $home->theft_deduetible = $request->theft_deduetible;
        $home->electro = $request->electro;
        $home->electro_total = $request->electro_total;
        $home->electro_deduetible = $request->electro_deduetible;
        $home->water = $request->water;
        $home->buidliung = $request->buidliung;
        $home->luggage = $request->luggage;
        $home->luggage_total = $request->luggage_total;
        $home->glass = $request->glass;
        $home->cyber_schutz = $request->cyber_schutz;

                // new

                $home->building_water = $request->building_water;
                $home->building_glass = $request->building_glass;
                $home->floor_heating = $request->floor_heating;
                $home->hydrant = $request->hydrant;
                $home->bauart = $request->bauart;
                $home->valuables = $request->valuables;

        // Insurance

        $home->personal_liability = $request->personal_liability;
        $home->personal_liability_total = $request->personal_liability_total;
        $home->personal_liability_deductible = $request->personal_liability_deductible;
        $home->other_insurance = $request->other_insurance;
        $home->comments = $request->comments;
        $home->insurance_email = $request->insurance_email;
        $home->insurance_email_b = $request->insurance_email_b;
        $home->insurance_email_c = $request->insurance_email_c;

        $home->save();

        return redirect()->back()->with('success', 'Gespeichert');
    }

    function car(){
        return view('admin.insurance.car');
    }

    function car_form(Request $request){



        $request->validate([
            'car_file' => 'nullable|max:255',
            'e_s_i_5_y_a' => 'nullable|max:255',
            'how_many' => 'nullable|max:255',
            'how_long' => 'nullable|max:255',
            'driver_under_26' => 'nullable|max:255',
            'leasing' => 'nullable|max:255',

            'vehicle_brand' => 'nullable|max:255',
            'vehicle_model' => 'nullable|max:255',
            'vehicle_certificate_type' => 'nullable|max:255',
            'vehicle_master_number' => 'nullable|max:255',
            'vehicle_date_in_traffic' => 'nullable|max:255',
            'vehicle_catalog_price' => 'nullable|max:255',
            'vehicle_equipment_price' => 'nullable|max:255',

            'how_many_damages_1' => 'nullable|max:255',
            'how_many_damages_2' => 'nullable|max:255',
            'how_many_damages_3' => 'nullable|max:255',
            'date' => 'nullable|max:255',
            'Zahlweise' => 'nullable|max:255',
            'vierteljährlich' => 'nullable|max:255',
            'Kontrollschild' => 'nullable|max:255',
            'Km_Jahr' => 'nullable|max:255',
            'Pannenhilfe' => 'nullable|max:255',

            'insurance_liability' => 'nullable|max:255',
            'insurance_fully_compenensive' => 'nullable|max:255',
            'insurance_deductible' => 'nullable|max:255',
            'partially_comprehensive' => 'nullable|max:255',
            'partially_deductible' => 'nullable|max:255',
            'insurance_parkschaden' => 'nullable|max:255',
            'parkschaden_deductible' => 'nullable|max:255',
            'insurance_item_carried' => 'nullable|max:255',
            'insurance_current_value' => 'nullable|max:255',
            'insurance_headlights' => 'nullable|max:255',
            'insurance_bonus_protection' => 'nullable|max:255',
            'insurance_comments' => 'nullable|max:255',
            'cyber_schutz' => 'nullable|max:255',
            'personal_liability' => 'nullable|max:255',
            'personal_liability_total' => 'nullable|max:255',
            'personal_liability_deductible' => 'nullable|max:255',
            'other_insurance' => 'nullable|max:255',
            'comments' => 'nullable|max:255',
            'examination_since' => 'nullable|max:255',
            'insurance_email_c' => 'nullable|max:255',
            'insurance_email_b' => 'nullable|max:255',
        ]);


        $car = new CarInsurance;


        $car->user_id = Auth::user()->id;
        $car->insurance_number = "Inc:Car".Auth::user()->name.rand(0000,9999);
        $car->salutation = $request->salutation;
        $car->f_name = $request->f_name;
        $car->insurance_type = $request->insurance_type;
        $car->l_name = $request->l_name;
        $car->surename = $request->surename;
        $car->street = $request->street;
        $car->post_code = $request->post_code;
        $car->nationality = $request->nationality;
        $car->date_of_birth = $request->date_of_birth;
        $car->residence = $request->residence;
        $car->examination_since = $request->examination_since;
        $car->phone_number = $request->phone_number;
        $car->email = $request->email;
        $car->e_s_i_5_y_a = $request->e_s_i_5_y_a;
        $car->how_many = $request->how_many;
        $car->how_long = $request->how_long;
        $car->driver_under_26 = $request->driver_under_26;
        $car->leasing = $request->leasing;

        // Vehicle

        $car->vehicle_brand = $request->vehicle_brand;
        $car->vehicle_model = $request->vehicle_model;
        $car->vehicle_certificate_type = $request->vehicle_certificate_type;
        $car->vehicle_master_number = $request->vehicle_master_number;
        $car->vehicle_date_in_traffic = $request->vehicle_date_in_traffic;
        $car->vehicle_catalog_price = $request->vehicle_catalog_price;
        $car->vehicle_equipment_price = $request->vehicle_equipment_price;

        // Insurance

        $car->insurance_liability = $request->insurance_liability;
        $car->insurance_fully_compenensive = $request->insurance_fully_compenensive;
        $car->insurance_deductible = $request->insurance_deductible;
        $car->partially_comprehensive = $request->partially_comprehensive;
        $car->partially_deductible = $request->partially_deductible;
        $car->insurance_parkschaden = $request->insurance_parkschaden;
        $car->parkschaden_deductible = $request->parkschaden_deductible;
        $car->insurance_item_carried = $request->insurance_item_carried;
        $car->insurance_current_value = $request->insurance_current_value;
        $car->insurance_headlights = $request->insurance_headlights;
        $car->insurance_bonus_protection = $request->insurance_bonus_protection;
        $car->insurance_comments = $request->insurance_comments;

                // New

                $car->how_many_damages_1 = $request->how_many_damages_1;
                $car->how_many_damages_2 = $request->how_many_damages_2;
                $car->how_many_damages_3 = $request->how_many_damages_3;
                $car->date = $request->date;
                $car->Zahlweise = $request->Zahlweise;
                $car->vierteljährlich = $request->vierteljährlich;
                $car->Kontrollschild = $request->Kontrollschild;
                $car->Km_Jahr = $request->Km_Jahr;
                $car->Pannenhilfe = $request->insurance_current_value;

        // Email To Cpmpanies

        $car->insurance_email = $request->insurance_email;
        $car->insurance_email_b = $request->insurance_email_b;
        $car->insurance_email_c = $request->insurance_email_c;


        $car->save();

        return redirect()->back()->with('success', 'Gespeichert');

    }


    function car_update_form(Request $request, $id){

        $request->validate([
            'car_file' => 'nullable|max:255',
            'e_s_i_5_y_a' => 'nullable|max:255',
            'how_many' => 'nullable|max:255',
            'how_long' => 'nullable|max:255',
            'driver_under_26' => 'nullable|max:255',
            'leasing' => 'nullable|max:255',

            'vehicle_brand' => 'nullable|max:255',
            'vehicle_model' => 'nullable|max:255',
            'vehicle_certificate_type' => 'nullable|max:255',
            'vehicle_master_number' => 'nullable|max:255',
            'vehicle_date_in_traffic' => 'nullable|max:255',
            'vehicle_catalog_price' => 'nullable|max:255',
            'vehicle_equipment_price' => 'nullable|max:255',

            'how_many_damages_1' => 'nullable|max:255',
            'how_many_damages_2' => 'nullable|max:255',
            'how_many_damages_3' => 'nullable|max:255',
            'date' => 'nullable|max:255',
            'Zahlweise' => 'nullable|max:255',
            'vierteljährlich' => 'nullable|max:255',
            'Kontrollschild' => 'nullable|max:255',
            'Km_Jahr' => 'nullable|max:255',
            'Pannenhilfe' => 'nullable|max:255',

            'insurance_liability' => 'nullable|max:255',
            'insurance_fully_compenensive' => 'nullable|max:255',
            'insurance_deductible' => 'nullable|max:255',
            'partially_comprehensive' => 'nullable|max:255',
            'partially_deductible' => 'nullable|max:255',
            'insurance_parkschaden' => 'nullable|max:255',
            'parkschaden_deductible' => 'nullable|max:255',
            'insurance_item_carried' => 'nullable|max:255',
            'insurance_current_value' => 'nullable|max:255',
            'insurance_headlights' => 'nullable|max:255',
            'insurance_bonus_protection' => 'nullable|max:255',
            'insurance_comments' => 'nullable|max:255',
            'cyber_schutz' => 'nullable|max:255',
            'personal_liability' => 'nullable|max:255',
            'personal_liability_total' => 'nullable|max:255',
            'personal_liability_deductible' => 'nullable|max:255',
            'other_insurance' => 'nullable|max:255',
            'comments' => 'nullable|max:255',
            'examination_since' => 'nullable|max:255',
            'insurance_email_c' => 'nullable|max:255',
            'insurance_email_b' => 'nullable|max:255',
        ]);



        $car = CarInsurance::find($id);


        $car->salutation = $request->salutation;
        $car->f_name = $request->f_name;
        $car->insurance_type = $request->insurance_type;
        $car->l_name = $request->l_name;
        $car->surename = $request->surename;
        $car->street = $request->street;
        $car->post_code = $request->post_code;
        $car->nationality = $request->nationality;
        $car->date_of_birth = $request->date_of_birth;
        $car->residence = $request->residence;
        $car->examination_since = $request->examination_since;
        $car->phone_number = $request->phone_number;
        $car->email = $request->email;
        $car->e_s_i_5_y_a = $request->e_s_i_5_y_a;
        $car->how_many = $request->how_many;
        $car->how_long = $request->how_long;
        $car->driver_under_26 = $request->driver_under_26;
        $car->leasing = $request->leasing;

        // Vehicle

        $car->vehicle_brand = $request->vehicle_brand;
        $car->vehicle_model = $request->vehicle_model;
        $car->vehicle_certificate_type = $request->vehicle_certificate_type;
        $car->vehicle_master_number = $request->vehicle_master_number;
        $car->vehicle_date_in_traffic = $request->vehicle_date_in_traffic;
        $car->vehicle_catalog_price = $request->vehicle_catalog_price;
        $car->vehicle_equipment_price = $request->vehicle_equipment_price;

                        // New

                        $car->how_many_damages_1 = $request->how_many_damages_1;
                        $car->how_many_damages_2 = $request->how_many_damages_2;
                        $car->how_many_damages_3 = $request->how_many_damages_3;
                        $car->date = $request->date;
                        $car->Zahlweise = $request->Zahlweise;
                        $car->vierteljährlich = $request->vierteljährlich;
                        $car->Kontrollschild = $request->Kontrollschild;
                        $car->Km_Jahr = $request->Km_Jahr;
                        $car->Pannenhilfe = $request->insurance_current_value;

        // Insurance

        $car->insurance_liability = $request->insurance_liability;
        $car->insurance_fully_compenensive = $request->insurance_fully_compenensive;
        $car->insurance_deductible = $request->insurance_deductible;
        $car->partially_comprehensive = $request->partially_comprehensive;
        $car->partially_deductible = $request->partially_deductible;
        $car->insurance_parkschaden = $request->insurance_parkschaden;
        $car->parkschaden_deductible = $request->parkschaden_deductible;
        $car->insurance_item_carried = $request->insurance_item_carried;
        $car->insurance_current_value = $request->insurance_current_value;
        $car->insurance_headlights = $request->insurance_headlights;
        $car->insurance_bonus_protection = $request->insurance_bonus_protection;
        $car->insurance_comments = $request->insurance_comments;

        // Email To Cpmpanies

        $car->insurance_email = $request->insurance_email;
        $car->insurance_email_b = $request->insurance_email_b;
        $car->insurance_email_c = $request->insurance_email_c;


        $car->save();

        return redirect()->back()->with('success', 'Gespeichert');

    }



    function insurance_type(Request $request){
        $insurance_type = new Insurance_Type;
        $insurance_type->name = $request->name;
        $insurance_type->icon = $request->icon;
        $insurance_type->save();
       return redirect()->back()->with('success', 'Gespeichert');
    }



}
