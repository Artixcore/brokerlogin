<?php

namespace App\Http\Controllers\Mail;

use App\AdMail;
use App\AppDoc;
use App\AppMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\InMail;
use App\HomeInsurance;
use App\CarInsurance;
use App\KVG;
use App\LawMail;
use App\Nachweis as Naw;
use App\NaMail;
use App\TvMail;
use PDF;


class MailController extends Controller
{
    // Admin Part

    function home($insurance_number){
        $home = HomeInsurance::where('insurance_number', $insurance_number)->get();
        return view('mail.homes', compact('home'));
    }

    function car($insurance_number){
        $car = CarInsurance::where('insurance_number', $insurance_number)->get();
        return view('mail.cars', compact('car'));
    }

    function nachweis($customer_number){
        $customer = Naw::where('customer_number', $customer_number)->get();
        return view('mail.naw', compact('customer'));
    }

    function admin_nachweis_mail(Request $request){

        $nah = new NaMail;
        $nah->nachweis_number = $request->nachweis_number;
        $nah->status = '1';
        $nah->save();

        $details = [
            'agent' => Auth::user()->name,
            'email' => Auth::user()->email,
            'phone' => Auth::user()->phone,
            'company_email' => $request->get("company_email"),
            'model' => $request->get("model"),
            'marke' => $request->get('marke'),
            'typenschein' => $request->get('typenschein'),
            'inv' => $request->get('inv'),
            'Stammnummer' => $request->get('Stammnummer'),
            'kontrollschild' => $request->get('kontrollschild'),
            'grund' => $request->get('grund'),
            'customer_type' => $request->get('customer_type'),
            'customer_f_name' => $request->get('customer_f_name'),
            'customer_l_name' => $request->get('customer_l_name'),
            'customer_street' => $request->get('customer_street'),
            'date_of_birth' => $request->get('date_of_birth'),
            'customer_zip' => $request->get('customer_zip'),
            'customer_place' => $request->get('customer_place'),
            'customer_date_of_birth' => $request->get('customer_date_of_birth')
        ];


        $pdf = PDF::loadView('mail.naw', $details); 

        Mail::send('mail.nachweis', $details, function($message) use ($details, $pdf)
        {
            $message->from('donotreply@brokerlogin.ch', 'BrokerLogin');
            $message->to($details['company_email']);
            $message->subject('Nachweis')
                   ->attachData($pdf->output(), "Insurance.pdf");
        });

        return redirect()->back()->with('success', 'Gesendet');

    }



    function admin_application_mail(Request $request){

        $in = new AppMail();
        $in->application_number = $request->application_number;
        $in->status = '1';
        $in->save();

        $data = [
        'agent' => Auth::user()->name,
        'email' => Auth::user()->email,
        'phone' => Auth::user()->phone,
        'customer_f_name' => $request->get('customer_f_name'),
        'customer_l_name' => $request->get('customer_l_name'),
        'customer_email'  => $request->get('customer_email'),
        'customer_phone'  => $request->get('customer_phone'),
        'customer_mobile' => $request->get('customer_mobile'),
        'customer_street' => $request->get('customer_street'),
        'customer_zip'    => $request->get('customer_zip'),
        'customer_place'  => $request->get('customer_place'),
        'insurance_type'  => $request->get('insurance_type'),
        'insurance_email' => $request->get('insurance_email'),
        'education' => $request->get('education'),
        'start' => $request->get('start'),
        'end' => $request->get('end'),
        'beginning' => $request->get('beginning'),
        'policy_no' => $request->get('policy_no'),
        'premium' => $request->get('premium'),
        'note' => $request->get('note'),
        'pdf' => $request->get('pdf'),

        ];


        $pdf = PDF::loadView('mail.app', $data);

        Mail::send('mail.application', $data, function($message) use ($data, $pdf)
        {
          $message->from('donotreply@brokerlogin.ch', 'BrokerLogin');
          $message->to($data['insurance_email']);
          $message->attach(public_path('pdfs/uploads/'.$data['pdf']), [
            'as' => 'InsuracePDF',
            'mime' => 'application/pdf',
       ]);

          $message->subject('Policierung')
                   ->attachData($pdf->output(), "Application.pdf");
        });

        return redirect()->back()->with('success', 'Gesendet');

    }


    function admin_application_doc_mail(Request $request){

        $ad= new AdMail();
        $ad->doc_number = $request->doc_number;
        $ad->status = '1';
        $ad->save();

        $data = [
            'agent' => Auth::user()->name,
            'email' => Auth::user()->email,
            'phone' => Auth::user()->phone,
            'customer_f_name' => $request->get('customer_f_name'),
            'customer_l_name' => $request->get('customer_l_name'),
            'customer_email'  => $request->get('customer_email'),
            'customer_phone'  => $request->get('customer_phone'),
            'customer_mobile' => $request->get('customer_mobile'),
            'customer_street' => $request->get('customer_street'),
            'customer_zip'    => $request->get('customer_zip'),
            'customer_place'  => $request->get('customer_place'),
            'insurance_type'  => $request->get('insurance_type'),
            'insurance_email' => $request->get('insurance_email'),
            'insurance_doc'   => $request->get('insurance_doc'),
            ];


            $pdf = PDF::loadView('mail.doc', $data);

            Mail::send('mail.document', $data, function($message) use ($data, $pdf)
            {
            $message->from('donotreply@brokerlogin.ch', 'BrokerLogin');
            $message->to($data['insurance_email']);

            $message->attach(public_path('pdfs/uploads/'.$data['insurance_doc']), [
                'as' => 'insurance_doc',
                'mime' => 'application/pdf',
           ]);
              $message->subject('Dokumente')
                       ->attachData($pdf->output(), "Application.pdf");
            });

            return redirect()->back()->with('success', 'Gesendet');
    }

    function admin_offer_home_mail(Request $request){

        $ho= new InMail;
        $ho->insurance_number = $request->insurance_number;
        $ho->status = '1';
        $ho->save();

        $data = [
            'agent' => Auth::user()->name,
            'emaill' => Auth::user()->email,
            'phonee' => Auth::user()->phone,
            'salutation'   => $request->input('salutation'),
            'f_name' => $request->input('f_name'),
            'l_name' => $request->input('l_name'),
            'surename' => $request->input('surename'),
            'street' => $request->input('street'),
            'post_code' => $request->input('post_code'),

            'nationality' => $request->input('nationality'),
            'date_of_birth' => $request->input('date_of_birth'),
            'residence' => $request->input('residence'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),

            'c_i_p_5_y' => $request->input('c_i_p_5_y'),
            'how_many' => $request->input('how_many'),
            'amount_per_clain' => $request->input('amount_per_clain'),
            'operations' => $request->input('operations'),
            'terminated' => $request->input('terminated'),
            'flat_roof' => $request->input('flat_roof'),
            'building' => $request->input('building'),
            'type_of_building' => $request->input('type_of_building'),
            'address_from_the_object' => $request->input('address_from_the_object'),
            'rooms' => $request->input('rooms'),
            'persons' => $request->input('persons'),
            'sam_insured' => $request->input('sam_insured'),
            'f_o_e_d' => $request->input('f_o_e_d'),
            'f_o_e_d_deduetible' => $request->input('f_o_e_d_deduetible'),
            'theft_abroad' => $request->input('theft_abroad'),
            'theft_deduetible' => $request->input('theft_deduetible'),
            'electro' => $request->input('electro'),
            'electro_total' => $request->input('electro_total'),
            'electro_deduetible' => $request->input('electro_deduetible'),
            'water' => $request->input('water'),
            'buidliung' => $request->input('buidliung'),
            'luggage' => $request->input('luggage'),
            'luggage_total' => $request->input('luggage_total'),

            'building_water' => $request->input('building_water'),
            'building_glass' => $request->input('building_glass'),
            'floor_heating' => $request->input('floor_heating'),
            'hydrant' => $request->input('hydrant'),
            'bauart' => $request->input('bauart'),
            'valuables' => $request->input('valuables'),

            'how_many_damages_1' => $request->input('how_many_damages_1'),
            'how_many_damages_2' => $request->input('how_many_damages_2'),
            'how_many_damages_3' => $request->input('how_many_damages_3'),
            'date' => $request->input('date'),
            'Zahlweise' => $request->input('Zahlweise'),
            'Kontrollschild' => $request->input('Kontrollschild'),
            'Km_Jahr' => $request->input('Km_Jahr'),
            'Pannenhilfe' => $request->input('Pannenhilfe'),


            'glass' => $request->input('glass'),
            'cyber_schutz' => $request->input('cyber_schutz'),
            'personal_liability' => $request->input('personal_liability'),
            'personal_liability_total' => $request->input('personal_liability_total'),
            'personal_liability_deductible' => $request->input('personal_liability_deductible'),
            'other_insurance' => $request->input('other_insurance'),
            'comments' => $request->input('comments'),
            'insurance_email' => $request->input('insurance_email'),
            'insurance_email_b' => $request->input('insurance_email_b'),
            'insurance_email_c' => $request->input('insurance_email_c'),

        ];

  $pdf = PDF::loadView('mail.home', $data);

  Mail::send('mail.mailhome', $data, function($message) use ($data, $pdf)
  {
    $message->from('donotreply@brokerlogin.ch', 'BrokerLogin');
    $message->to(array($data['insurance_email'],$data['insurance_email_b'],$data['insurance_email_c']));

    $message->subject('Offertenanfrage KHH')
             ->attachData($pdf->output(), "Insurance.pdf");
  });

  return redirect()->back()->with('success', 'Gesendet');

        return redirect()->back()->with('success', 'Gesendet');
    }

    function admin_offer_car_mail(Request $request){

        $ca= new InMail;
        $ca->insurance_number = $request->insurance_number;
        $ca->status = '1';
        $ca->save();

            $data = [
                      'agent' => Auth::user()->name,
                      'emaill' => Auth::user()->email,
                      'phone' => Auth::user()->phone,
                      'salutation'   => $request->input('salutation'),
                      'f_name' => $request->input('f_name'),
                      'l_name' => $request->input('l_name'),
                      'surename' => $request->input('surename'),
                      'street' => $request->input('street'),
                      'post_code' => $request->input('post_code'),
                      'nationality' => $request->input('nationality'),
                      'residence' => $request->input('residence'),
                      'date_of_birth' => $request->input('date_of_birth'),
                      'phone_number' => $request->input('phone_number'),
                      'e_s_i_5_y_a' => $request->input('e_s_i_5_y_a'),
                      'how_many' => $request->input('how_many'),
                      'how_long' => $request->input('how_long'),
                      'driver_under_26' => $request->input('driver_under_26'),
                      'examination_since' => $request->input('examination_since'),
                      'leasing' => $request->input('leasing'),
                      'vehicle_brand' => $request->input('vehicle_brand'),
                      'vehicle_model' => $request->input('vehicle_model'),
                      'vehicle_certificate_type' => $request->input('vehicle_certificate_type'),
                      'vehicle_master_number' => $request->input('vehicle_master_number'),
                      'vehicle_date_in_traffic' => $request->input('vehicle_date_in_traffic'),
                      'vehicle_catalog_price' => $request->input('vehicle_catalog_price'),
                      'vehicle_equipment_price' => $request->input('vehicle_equipment_price'),
                      'insurance_liability' => $request->input('insurance_liability'),
                      'insurance_fully_compenensive' => $request->input('insurance_fully_compenensive'),
                      'insurance_deductible' => $request->input('insurance_deductible'),
                      'partially_comprehensive' => $request->input('partially_comprehensive'),
                      'partially_deductible' => $request->input('partially_deductible'),
                      'insurance_parkschaden' => $request->input('insurance_parkschaden'),
                      'parkschaden_deductible' => $request->input('parkschaden_deductible'),
                      'insurance_item_carried' => $request->input('insurance_item_carried'),
                      'insurance_current_value' => $request->input('insurance_current_value'),
                      'insurance_headlights' => $request->input('insurance_headlights'),
                      'insurance_bonus_protection' => $request->input('insurance_bonus_protection'),

                      'how_many_damages_1' => $request->input('how_many_damages_1'),
                      'how_many_damages_2' => $request->input('how_many_damages_2'),
                      'how_many_damages_3' => $request->input('how_many_damages_3'),
                      'date' => $request->input('date'),
                      'Zahlweise' => $request->input('Zahlweise'),
                      'vierteljährlich' => $request->input('vierteljährlich'),
                      'Kontrollschild' => $request->input('Kontrollschild'),
                      'Km_Jahr' => $request->input('Km_Jahr'),
                      'Pannenhilfe' => $request->input('Pannenhilfe'),

                      'insurance_comments' => $request->input('insurance_comments'),
                      'insurance_email' => $request->input('insurance_email'),
                      'insurance_email_b' => $request->input('insurance_email_b'),
                      'insurance_email_c' => $request->input('insurance_email_c'),

                  ];

            $pdf = PDF::loadView('mail.car', $data);

            Mail::send('mail.mailcar', $data, function($message) use ($data, $pdf)
            {
            $message->from('donotreply@brokerlogin.ch', 'BrokerLogin');
            $message->to(array($data['insurance_email'],$data['insurance_email_b'],$data['insurance_email_c']));
            $message->subject('Offertenanfrage MF')
                       ->attachData($pdf->output(), "Insurance.pdf");
            });

            return redirect()->back()->with('success', 'Gesendet');
    }




    function law_mail(Request $request){

        $la= new LawMail();
        $la->law_number = $request->law_number;
        $la->status = '1';
        $la->save();

        $data = [
                  'agent' => Auth::user()->name,
                  'emaill' => Auth::user()->email,
                  'phonee' => Auth::user()->phone,

                  'salutation'   => $request->input('salutation'),
                  'f_name' => $request->input('f_name'),
                  'l_name' => $request->input('l_name'),
                  'surename' => $request->input('surename'),
                  'street' => $request->input('street'),
                  'zip' => $request->input('zip'),
                  'nationality' => $request->input('nationality'),
                  'place' => $request->input('place'),
                  'birthday' => $request->input('birthday'),
                  'phone' => $request->input('phone'),
                  'email' => $request->input('email'),
                  'employment_relation' => $request->input('employment_relation'),
                  'current_job' => $request->input('current_job'),
                  'private' => $request->input('private'),
                  'traffic' => $request->input('traffic'),
                  'self_employ' => $request->input('self_employ'),
                  'company' => $request->input('company'),
                  'scope' => $request->input('scope'),
                  'person' => $request->input('person'),

                  'comments' => $request->input('comments'),
                  'insurance_email' => $request->input('insurance_email'),
                  'insurance_email_b' => $request->input('insurance_email_b'),
                  'insurance_email_c' => $request->input('insurance_email_c'),

              ];

        $pdf = PDF::loadView('mail.law', $data);

        Mail::send('mail.lawer', $data, function($message) use ($data, $pdf)
        {
        $message->from('donotreply@brokerlogin.ch', 'BrokerLogin');
        $message->to(array($data['insurance_email'],$data['insurance_email_b'],$data['insurance_email_c']));
        $message->subject('Offertenanfrage Rechtsschutz')
                   ->attachData($pdf->output(), "RS.pdf");
        });

        return redirect()->back()->with('success', 'Gesendet');
}


function travel_mail(Request $request){

    $tv = new TvMail;
    $tv->travel_number = $request->travel_number;
    $tv->status = '1';
    $tv->save();

    $data = [
              'agent' => Auth::user()->name,
              'emaill' => Auth::user()->email,
              'phonee' => Auth::user()->phone,

              'salutation'   => $request->input('salutation'),
              'f_name' => $request->input('f_name'),
              'l_name' => $request->input('l_name'),
              'surename' => $request->input('surename'),
              'street' => $request->input('street'),
              'zip' => $request->input('zip'),
              'nationality' => $request->input('nationality'),
              'place' => $request->input('place'),
              'birthday' => $request->input('birthday'),
              'phone' => $request->input('phone'),
              'email' => $request->input('email'),
              'employment_relation' => $request->input('employment_relation'),
              'current_job' => $request->input('current_job'),

              'laggage' => $request->input('laggage'),
              'begin' => $request->input('begin'),
              'scope' => $request->input('scope'),
              'person' => $request->input('person'),
              'Summe' => $request->input('Summe'),
              'SB' => $request->input('SB'),

              'comments' => $request->input('comments'),
              'insurance_email' => $request->input('insurance_email'),
              'insurance_email_b' => $request->input('insurance_email_b'),
              'insurance_email_c' => $request->input('insurance_email_c'),

          ];

    $pdf = PDF::loadView('mail.travel', $data);

    Mail::send('mail.travels', $data, function($message) use ($data, $pdf)
    {
    $message->from('donotreply@brokerlogin.ch', 'BrokerLogin');
    $message->to(array($data['insurance_email'],$data['insurance_email_b'],$data['insurance_email_c']));
    $message->subject('Offertenanfrage Reiseversicherung')
               ->attachData($pdf->output(), "Reise.pdf");
    });

    return redirect()->back()->with('success', 'Gesendet');
}



function agent_kvg_mail(Request $request){

    $data = [
              'application_number'   => $request->input('application_number'),
              'name' => $request->input('name'),
              'email' => $request->input('email'),
              'insurance_type' => $request->input('insurance_type'),
              'company_name' => $request->input('company_name'),
              'cus_name' => $request->input('cus_name'),
              'cus_lname' => $request->input('cus_lname'),
              'customer_email' => $request->input('customer_email'),
              'customer_date_of_birth' => $request->input('customer_date_of_birth'),
          ];


    Mail::send('mail.kvg', $data, function($message) use ($data)
    {
    $message->from('donotreply@brokerlogin.ch', 'BrokerLogin');
    $message->to(array($data['email']));
    $message->subject('Annahmebestätigung');
    });

    return redirect()->back()->with('success', 'Gesendet');

}



function agent_vvg_mail(Request $request){

    $data = [
        'application_number'   => $request->input('application_number'),
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'insurance_type' => $request->input('insurance_type'),
        'company_name' => $request->input('company_name'),
        'cus_name' => $request->input('cus_name'),
        'cus_lname' => $request->input('cus_lname'),
        'customer_email' => $request->input('customer_email'),
        'customer_date_of_birth' => $request->input('customer_date_of_birth'),
    ];


    Mail::send('mail.vvg', $data, function($message) use ($data)
    {
    $message->from('donotreply@brokerlogin.ch', 'BrokerLogin');
    $message->to(array($data['email']));
    $message->subject('Annahmebestätigung');
    });

    return redirect()->back()->with('success', 'Gesendet');
}

function agent_kvgvvg_mail(Request $request){

    $data = [
        'application_number'   => $request->input('application_number'),
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'insurance_type' => $request->input('insurance_type'),
        'company_name' => $request->input('company_name'),
        'cus_name' => $request->input('cus_name'),
        'cus_lname' => $request->input('cus_lname'),
        'customer_email' => $request->input('customer_email'),
        'customer_date_of_birth' => $request->input('customer_date_of_birth'),
    ];


    Mail::send('mail.kvgvvg', $data, function($message) use ($data)
    {
    $message->from('donotreply@brokerlogin.ch', 'BrokerLogin');
    $message->to(array($data['email']));
    $message->subject('Annahmebestätigung');
    });

    return redirect()->back()->with('success', 'Gesendet');
}

}
