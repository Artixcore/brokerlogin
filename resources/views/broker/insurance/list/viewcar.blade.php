@extends('broker.insurance.form')
@section('insurance')
@foreach ($insurance as $in)

<form action="{{route('broker.post.insurance.car' ,$in->id)}}" method="post">
    @csrf
    <div class="container">
        <div class="card">
            <div class="card-body">
        <div class="row">

            <div class="col-4">
                <label class="form-label">Gesellschaft wählen</label>
                <select name="insurance_email" class="form-control">
                    <option selected>Select One.</option>
                    @foreach (App\InsuranceCompany::all() as $company)
                    <option value="{{ $company->company_email }}">{{ $company->company_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-4">
                <label class="form-label">Gesellschaft wählen</label>
                <select name="insurance_email_b" class="form-control">
                    <option selected>Select One.</option>
                    @foreach (App\InsuranceCompany::all() as $company)
                    <option value="{{ $company->company_email }}">{{ $company->company_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-4">
                <label class="form-label">Gesellschaft wählen</label>
                <select name="insurance_email_c" class="form-control">
                    <option selected>Select One.</option>
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
                            <input type="checkbox" class="form-check-input" value="Mr." name="salutation" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input">Mr</label>

                            <input type="checkbox" class="form-check-input" value="Ms." name="salutation" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input2">Ms</label>

                            <input type="checkbox" class="form-check-input" value="Company" name="salutation" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input3">Company</label>

                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">Name</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="{{$in->f_name}}" name="f_name" required>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">Vorname</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="{{$in->l_name}}" name="l_name" required>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">Strasse / Nr.</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="{{ $in->street }}" name="street" required>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">PLZ / Ort</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="{{$in->post_code}}" name="post_code" required>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">Nationalität</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="{{$in->nationality}}" name="nationality" required>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">Geburtsdatum</label>
                        </div>
                        <div class="col-6">
                            <input type="date" class="form-control" value="{{ $in->date_of_birth}}" name="date_of_birth" required>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">Phone Number</label>
                        </div>
                        <div class="col-6">
                            <input type="phone" class="form-control" value="{{$in->phone_number}}" name="phone_number" required>
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
                            <input type="text" class="form-control" value="{{ $in->email }}" name="email" required>
                        </div>
                    </div>

                    <input type="hidden" name="insurance_type" value="Car Insurance">


                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">Aufenthaltsbew</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="{{$in->residence}}" name="residence" required>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">1. Prüfung seit</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="{{$in->examination_since}}" name="examination_since">
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
                            <input type="checkbox" class="form-check-input" value="Yes" name="e_s_i_5_y_a" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input">Yes</label>

                            <input type="checkbox" class="form-check-input" value="No" name="e_s_i_5_y_a" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input2">No</label>

                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">wenn ja, wieviel Mal </label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="{{$in->how_many}}" name="how_many">
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">wie lange</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="how_long" value="{{$in->how_long}}">
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
                            <input type="checkbox" class="form-check-input" value="Yes" name="driver_under_26" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input">Yes</label>

                            <input type="checkbox" class="form-check-input" value="No" name="driver_under_26" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input2">No</label>

                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Leasing?</label>
                        </div>
                        <div class="col-6">
                            <input type="checkbox" class="form-check-input" value="Yes" name="leasing" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input">Yes</label>

                            <input type="checkbox" class="form-check-input" value="No" name="leasing" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input2">No</label>

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
                            <input type="text" class="form-control" value="{{$in->vehicle_brand}}" name="vehicle_brand">
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Modell</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="vehicle_model" value="{{$in->vehicle_model}}">
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Typenschein</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="{{$in->vehicle_certificate_type}}" name="vehicle_certificate_type">
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Stammnummer</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="{{$in->vehicle_master_number}}" name="vehicle_master_number">
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
                            <input type="text" class="form-control" name="vehicle_date_in_traffic" value="{{$in->vehicle_date_in_traffic}}">
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Katalogpreis</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="vehicle_catalog_price" value="{{$in->vehicle_catalog_price}}">
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Zubehör</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="vehicle_equipment_price" value="{{$in->vehicle_equipment_price}}">
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
                        <label class="col-form-label">vierteljährlich</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Ja" name="vierteljährlich">
                        <label class="form-check-label" for="form-check-input">Ja</label>
                        <input type="checkbox" class="form-check-input" value="Nein" name="vierteljährlich">
                        <label class="form-check-label" for="form-check-input2">Nein</label>
                    </div>
                </div>

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
                        <input type="text" class="form-control" name="Pannenhilfe" autocomplete="off"/>

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
                        <input type="checkbox" class="form-check-input" value="Yes" name="partially_comprehensive"  autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Yes</label>
                        <input type="checkbox" class="form-check-input" value="No" name="partially_comprehensive" id="form-check-input2" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">No</label>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <label class="col-form-label"> Selbstbehalt </label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Yes" name="partially_deductible"  autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Yes</label>
                        <input type="checkbox" class="form-check-input" value="No" name="partially_deductible" id="form-check-input2" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">No</label>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <label class="col-form-label"> Scheinwerfer </label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Yes" name="insurance_headlights"  autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Yes</label>
                        <input type="checkbox" class="form-check-input" value="No" name="insurance_headlights" id="form-check-input2" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">No</label>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <label class="col-form-label"> Bonusschutz </label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Yes" name="insurance_bonus_protection"  autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Yes</label>
                        <input type="checkbox" class="form-check-input" value="No" name="insurance_bonus_protection" id="form-check-input2" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">No</label>
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
                        <input type="checkbox" class="form-check-input" value="Yes" name="insurance_fully_compenensive" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Yes</label>
                        <input type="checkbox" class="form-check-input" value="No" name="insurance_fully_compenensive" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">No</label>
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
                        <input type="checkbox" class="form-check-input" value="Yes" name="insurance_parkschaden" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Yes</label>
                        <input type="checkbox" class="form-check-input" value="No" name="insurance_parkschaden" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">No</label>
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
                        <label class="form-check-label" for="form-check-input2">5000.-</label>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <label class="col-form-label">Mitgeführte Sachen</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Yes" name="insurance_item_carried" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Yes</label>
                        <input type="checkbox" class="form-check-input" value="No" name="insurance_item_carried" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">No</label>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                        <label class="col-form-label">Zeitwertzusatz / Neuwert</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Yes" name="insurance_current_value" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Yes</label>
                        <input type="checkbox" class="form-check-input" value="No" name="insurance_current_value" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">No</label>
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
            <textarea type="text" class="form-control" value="{{$in->insurance_comments}}" name="insurance_comments"></textarea>

        </div>
        </div>

        <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">speichern</button>

          </div>
        </div>

    </form>

@endforeach
@endsection

