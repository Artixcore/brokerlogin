@extends('broker.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="aNeinnymous" referrerpolicy="Nein-referrer" />

@endsection
@section('content')

<form action="{{route('broker.form.car')}}" method="post">
    @csrf
    <div class="container">
        <div class="card">
            <div class="card-body">
        <div class="row">

            <div class="col-4">
                <label class="form-label">Gesellschaft wählen</label>
                <select name="insurance_email" class="form-control">
                    <option selected>Select One</option>
                    @foreach (App\InsuranceCompany::all() as $company)
                    <option value="{{ $company->company_email }}">{{ $company->company_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-4">
                <label class="form-label">Gesellschaft wählen</label>
                <select name="insurance_email_b" class="form-control">

                    <option value="admin@ibrs.ch" selected> keine </option>
                    @foreach (App\InsuranceCompany::all() as $company)
                    <option value="{{ $company->company_email }}">{{ $company->company_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-4">
                <label class="form-label">Gesellschaft wählen</label>
                <select name="insurance_email_c" class="form-control">
                <option value="admin@ibrs.ch" selected> keine </option>
                    @foreach (App\InsuranceCompany::all() as $company)
                    <option value="{{ $company->company_email }}">{{ $company->company_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        </div>
        </div>
    </div>



        <div class="container py-2">

            <div class="row">
               <div class="col-6">
                <div class="card">
                <div class="card-body">
                    <h4>Fahrzeughalter</h4>
                    <div class="row g-3 align-items-center">
                        <div class="col-6">
                          <label for="inputPassword6" class="col-form-label">Anrede</label>
                        </div>
                        <div class="col-6">
                            <input type="checkbox" class="form-check-input" value="Herr." name="salutation" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input">Herr</label>

                            <input type="checkbox" class="form-check-input" value="Frau." name="salutation" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input2">Frau</label>

                            <input type="checkbox" class="form-check-input" value="Firma" name="salutation" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input3">Firma</label>

                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">Vorname</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="f_name" required>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label"> Nachname </label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="l_name" required>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">Strasse / Nr.</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="street" required>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">PLZ / Ort</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="post_code" required>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">Nationalität</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="nationality" required>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">Geburtsdatum</label>
                        </div>
                        <div class="col-6">
                            <input type="date" class="form-control" name="date_of_birth" required>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">Tel</label>
                        </div>
                        <div class="col-6">
                            <input type="phone" class="form-control" name="phone_number" required>
                        </div>
                    </div>
                </div>
                </div>
               </div>

               <div class="col-6">
                <div class="card">
                <div class="card-body">

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">Email</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="email" required>
                        </div>
                    </div>

                    <input type="hidden" name="insurance_type" value="Car Insurance">

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">Aufenthaltsbew</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="residence" required>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">1. Prüfung seit</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="examination_since">
                        </div>
                    </div>

                </div>
                </div>
               </div>
            </div>
        </div>

        <div class="container py-2">
            <div class="row">
               <div class="col-6">
                <div class="card">
                <div class="card-body">
                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Prüfung abgegeben? </label>
                        </div>
                        <div class="col-6">
                            <input type="checkbox" class="form-check-input" value="Ja" name="e_s_i_5_y_a" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input">Ja</label>

                            <input type="checkbox" class="form-check-input" value="Nein" name="e_s_i_5_y_a" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input2">Nein</label>

                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">wenn ja, wieviel Mal </label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="how_many">
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">wie lange</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="how_long">
                        </div>
                    </div>
                </div>
                </div>
               </div>

               <div class="col-6">
                <div class="card">
                <div class="card-body">

                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Lenker unter 26 ?</label>
                        </div>
                        <div class="col-6">
                            <input type="checkbox" class="form-check-input" value="Ja" name="driver_under_26" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input">Ja</label>

                            <input type="checkbox" class="form-check-input" value="Nein" name="driver_under_26" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input2">Nein</label>

                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Leasing?</label>
                        </div>
                        <div class="col-6">
                            <input type="checkbox" class="form-check-input" value="Ja" name="leasing" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input">Ja</label>

                            <input type="checkbox" class="form-check-input" value="Nein" name="leasing" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input2">Nein</label>

                        </div>
                    </div>
                </div>
                </div>
               </div>
            </div>
        </div>

        <div class="container py-2">
            <div class="row">
               <div class="col-6">
                <div class="card">
                <div class="card-body">
                    <h4>Fahrzeug</h4>
                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Marke</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="vehicle_brand">
                        </div>
                    </div>


                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Modell</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="vehicle_model">
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Typenschein</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="vehicle_certificate_type">
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Stammnummer</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="vehicle_master_number">
                        </div>
                    </div>
                </div>
                </div>
               </div>

               <div class="col-6">
                <div class="card">
                <div class="card-body">


                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">1. Inverkehrs.</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="vehicle_date_in_traffic">
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Katalogpreis</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="vehicle_catalog_price">
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Zubehör</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="vehicle_equipment_price">
                        </div>
                    </div>

                </div>
                </div>
               </div>
            </div>
        </div>


        <div class="container py-2">
            <div class="row">
               <div class="col-6">
                <div class="card">
                <div class="card-body">
                <h4>Versicherungsleistungen</h4>
                <div class="row p-2">
                    <div class="col-6">
                      <label class="col-form-label">Haftpflicht SB</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="0.-" name="insurance_liability"  autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">0.-</label>
                        <input type="checkbox" class="form-check-input" value="1'000.-" name="insurance_liability" id="form-check-input2" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">1,000.-</label>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                      <label class="col-form-label">Teilkasko</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Ja" name="partially_comprehensive"  autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Ja</label>
                        <input type="checkbox" class="form-check-input" value="Nein" name="partially_comprehensive" id="form-check-input2" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">Nein</label>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <label class="col-form-label"> Selbstbehalt </label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="0.-" name="partially_deductible"  autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">0.-</label>

                        <input type="checkbox" class="form-check-input" value="200.-" name="partially_deductible"  autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">200.-</label>

                        <input type="checkbox" class="form-check-input" value="500.-" name="partially_deductible"  autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">500.-</label>

                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <label class="col-form-label"> Scheinwerfer </label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Ja" name="insurance_headlights"  autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Ja</label>
                        <input type="checkbox" class="form-check-input" value="Nein" name="insurance_headlights" id="form-check-input2" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">Nein</label>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <label class="col-form-label"> Bonusschutz </label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Ja" name="insurance_bonus_protection"  autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Ja</label>
                        <input type="checkbox" class="form-check-input" value="Nein" name="insurance_bonus_protection" id="form-check-input2" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">Nein</label>
                    </div>
                </div>

                </div>
                </div>
               </div>


               <div class="col-6">
                <div class="card">
                <div class="card-body">

                <div class="row p-2">
                    <div class="col-6">
                        <label class="col-form-label">Vollkasko</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Ja" name="insurance_fully_compenensive" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Ja</label>
                        <input type="checkbox" class="form-check-input" value="Nein" name="insurance_fully_compenensive" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">Nein</label>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                      <label class="col-form-label">Selbstbehalt</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="500.-" name="insurance_deductible" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">500.-</label>
                        <input type="checkbox" class="form-check-input" value="1'000.-" name="insurance_deductible" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">1,000.-</label>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <label class="col-form-label">Parkschaden</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="1000.-" name="insurance_parkschaden" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">1000.-</label><br/>
                        <input type="checkbox" class="form-check-input" value="unlimitiert" name="insurance_parkschaden" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">unlimitiert</label><br/>
                        <input type="checkbox" class="form-check-input" value="Nein" name="insurance_parkschaden" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">Nein</label>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                      <label class="col-form-label">Selbstbehalt</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="0.-" name="parkschaden_deductible" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">0.-</label>
                        <input type="checkbox" class="form-check-input" value="200.-" name="parkschaden_deductible" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">200.-</label>
                        <input type="checkbox" class="form-check-input" value="500.-" name="parkschaden_deductible" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">500.-</label>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <label class="col-form-label">Mitgeführte Sachen</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Ja" name="insurance_item_carried" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Ja</label>
                        <input type="checkbox" class="form-check-input" value="Nein" name="insurance_item_carried" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">Nein</label>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <label class="col-form-label">Zeitwertzusatz / Neuwert</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Ja" name="insurance_current_value" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Ja</label>
                        <input type="checkbox" class="form-check-input" value="Nein" name="insurance_current_value" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">Nein</label>
                    </div>
                </div>
                </div>
                </div>
               </div>

            </div>
        </div>

        <div class="container py-2">
            <div class="row">
               <div class="col-6">
                <div class="card">
                <div class="card-body">
                <div class="row p-2">
                    <div class="col-6">
                      <label class="col-form-label">Anzahl Schäden Haft</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="how_many_damages_1">
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                      <label class="col-form-label">Anzahl Schäden Teilkasko</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="how_many_damages_2">                </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <label class="col-form-label"> Anzahl Schäden Vollkasko </label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="how_many_damages_3">
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <label class="col-form-label"> Versicherungsbeginn </label>
                    </div>
                    <div class="col-6">
                        <input type="date" class="form-control" name="date">
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <label class="col-form-label"> Zahlweise </label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="jährlich" name="Zahlweise"  autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">jährlich</label><br/>
                        <input type="checkbox" class="form-check-input" value="halbjährlich" name="Zahlweise" id="form-check-input2" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">halbjährlich</label><br/>
                        <input type="checkbox" class="form-check-input" value="vierteljährlich" name="Zahlweise" id="form-check-input2" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">vierteljährlich</label>
                    </div>
                </div>

                </div>
                </div>
               </div>


               <div class="col-6">
                <div class="card">
                <div class="card-body">

                <div class="row p-2">
                    <div class="col-6">
                      <label class="col-form-label">Kontrollschild</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="Kontrollschild">
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <label class="col-form-label">Km / Jahr</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" name="Km_Jahr">
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                      <label class="col-form-label">Pannenhilfe</label>
                    </div>
                    <div class="col-6">

                        <input type="checkbox" class="form-check-input" value="Ja" name="Pannenhilfe">
                        <label class="form-check-label" for="form-check-input">Ja</label>
                        <input type="checkbox" class="form-check-input" value="Nein" name="Pannenhilfe">
                        <label class="form-check-label" for="form-check-input2">Nein</label>

                    </div>
                </div>


                </div>
                </div>
               </div>

            </div>
        </div>

        <div class="container py-2">
        <div class="row">
        <div class="card">
        <div class="card-body">
            <label class="form-label">Bermerkungen:</label>
            <textarea type="text" class="form-control" name="insurance_comments"></textarea>

        </div>
        </div>

        <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">speichern</button>

          </div>
        </div>

    </form>
@endsection
@section('footer_js')

@endsection
