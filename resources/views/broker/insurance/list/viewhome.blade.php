@extends('broker.insurance.form')
@section('insurance')
@foreach ($insurance as $in)

<form action="{{route('broker.view.insurance.home', $in->id)}}" method="POST">
    @csrf
    <div class="container">
        <div class="card">
            <div class="card-body">
        <div class="row">

            <div class="col-4">
                <label class="form-label">Gesellschaft wählen</label>
                <select name="insurance_email" class="form-control">
                    @foreach (App\InsuranceCompany::all() as $company)
                    <option value="{{ $company->company_email }}">{{ $company->company_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-4">
                <label class="form-label">Gesellschaft wählen</label>
                <select name="insurance_email_b" class="form-control">
                    @foreach (App\InsuranceCompany::all() as $company)
                    <option value="{{ $company->company_email }}">{{ $company->company_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-4">
                <label class="form-label">Gesellschaft wählen</label>
                <select name="insurance_email_c" class="form-control">
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
                        <input type="text" class="form-control" value="{{$in->f_name}}" name="f_name">
                    </div>
                </div>

                <div class="row py-2">
                    <div class="col-6">
                      <label class="col-form-label">Vorname</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" value="{{$in->l_name}}" name="l_name">
                    </div>
                </div>

                <div class="row py-2">
                    <div class="col-6">
                      <label class="col-form-label">Strasse / Nr.</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" value="{{$in->street}}" name="street">
                    </div>
                </div>

                <div class="row py-2">
                    <div class="col-6">
                      <label class="col-form-label">PLZ / Ort</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" value="{{$in->post_code}}" name="post_code">
                    </div>
                </div>

                <div class="row py-2">
                    <div class="col-6">
                      <label class="col-form-label">Nationalität</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" value="{{$in->nationality}}" name="nationality">
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-6">
                      <label class="col-form-label">Email</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" value="{{$in->email}}" name="email">
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
                      <label class="col-form-label">Surename</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" value="{{$in->surename}}" name="surename">
                    </div>
                </div>
                <input type="hidden" name="insurance_type" value="Home Insurance">

                <div class="row py-2">
                    <div class="col-6">
                      <label class="col-form-label">Aufenthaltsbew</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" value="{{$in->residence}}" name="residence">
                    </div>
                </div>

                <div class="row py-2">
                    <div class="col-6">
                      <label class="col-form-label">Geburtsdatum</label>
                    </div>
                    <div class="col-6">
                        <input type="date" class="form-control" value="{{ $in->date_of_birth }}" name="date_of_birth">
                    </div>
                </div>

                <div class="row py-2">
                    <div class="col-6">
                      <label class="col-form-label">Tel.</label>
                    </div>
                    <div class="col-6">
                        <input type="phone" class="form-control" value="{{$in->phone}}" name="phone">
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
                      <label class="col-form-label">Schadenfälle
                        In den letzten 5 Jahren? </label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Ja" name="c_i_p_5_y" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Ja</label>

                        <input type="checkbox" class="form-check-input" value="Nein" name="c_i_p_5_y" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">Nein</label>

                    </div>
                </div>

                <div class="row py-2">
                    <div class="col-6">
                      <label class="col-form-label">wenn ja, wieviele</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" value="{{$in->how_many}}" name="how_many">
                    </div>
                </div>

                <div class="row py-2">
                    <div class="col-6">
                      <label class="col-form-label">Betrag pro Schadenfall</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" value="{{$in->amount_per_clain}}" name="amount_per_clain">
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
                      <label class="col-form-label">Betreibungen </label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Ja" name="operations" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Ja</label>

                        <input type="checkbox" class="form-check-input" value="Nein" name="operations" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">Nein</label>

                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                      <label class="col-form-label">Gekündigt / Abgelehnt?</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Ja" name="terminated" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Ja</label>

                        <input type="checkbox" class="form-check-input" value="Nein" name="terminated" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">Nein</label>

                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                      <label class="col-form-label">Flachdach</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Ja" name="flat_roof" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Ja</label>

                        <input type="checkbox" class="form-check-input" value="Nein" name="flat_roof" autocomplete="off"/>
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
                      <label class="col-form-label">Gebäude</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Ja" name="building" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Ja</label>

                        <input type="checkbox" class="form-check-input" value="Nein" name="building" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">Nein</label>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                      <label class="col-form-label">Gebäudeart</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Einfamilienhaus" name="type_of_building" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Einfamilienhaus</label> <br/>
                        <input type="checkbox" class="form-check-input" value="Mehrfamilienhaus" name="type_of_building" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">Mehrfamilienhaus</label>
                        <br/>
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                      <label class="col-form-label">Verhältnis</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Mieter/in " name="type_of_building" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Mieter/in </label> <br/>
                        <input type="checkbox" class="form-check-input" value=" Eigentümer/in" name="type_of_building" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2"> Eigentümer/in</label>
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
                      <label class="col-form-label">Adresse von Objekt</label>
                    </div>
                    <div class="col-6">
                        <input type="text" value="{{$in->address_from_the_object}}" class="form-control" name="address_from_the_object">
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                      <label class="col-form-label">Personen</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" value="{{$in->persons}}" name="persons">
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                      <label class="col-form-label">Zimmer</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" value="{{$in->rooms}}" name="rooms">
                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                      <label class="col-form-label">Versicherungssumme</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" value="{{$in->sam_insured}}" name="sam_insured">
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
                      <label class="col-form-label">Gebäude Wasser</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Ja" name="building_water" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Ja</label>

                        <input type="checkbox" class="form-check-input" value="Nein" name="building_water" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">Nein</label>

                    </div>
                </div>

                <div class="row py-2">
                    <div class="col-6">
                      <label class="col-form-label">Gebäude Glas</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Ja" name="building_glass" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Ja</label>

                        <input type="checkbox" class="form-check-input" value="Nein" name="building_glass" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">Nein</label>

                    </div>
                </div>

                <div class="row py-2">
                    <div class="col-6">
                      <label class="col-form-label">Bodenheizung</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Ja" name="floor_heating" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Ja</label>

                        <input type="checkbox" class="form-check-input" value="Nein" name="floor_heating" autocomplete="off"/>
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
                      <label class="col-form-label">Hydrant</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Ja" name="hydrant" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Ja</label>

                        <input type="checkbox" class="form-check-input" value="Nein" name="hydrant" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">Nein</label>

                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                      <label class="col-form-label">Bauart</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" class="form-check-input" value="Ja" name="bauart" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input">Ja</label>

                        <input type="checkbox" class="form-check-input" value="Nein" name="bauart" autocomplete="off"/>
                        <label class="form-check-label" for="form-check-input2">Nein</label>

                    </div>
                </div>

                <div class="row p-2">
                    <div class="col-6">
                      <label class="col-form-label">Wertsachen</label>
                    </div>
                    <div class="col-6">

                        <input type="text" class="form-control" value="{{ $in->valuables }}" name="valuables">


                    </div>
                </div>
            </div>
            </div>
           </div>
        </div>
    </div>


    <div class="container py-2">
        <div class="row">
            <h4>Deckung</h4>
           <div class="col-6">
            <div class="card">
            <div class="card-body">
            <div class="row p-2">
                <div class="col-6">
                  <label class="col-form-label">Feuer/Elem</label>
                </div>
                <div class="col-6">
                    <input type="checkbox" class="form-check-input" value="Ja" name="f_o_e_d"  autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input">Ja</label>
                    <input type="checkbox" class="form-check-input" value="Nein" name="f_o_e_d" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input2">Nein</label>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-6">
                  <label class="col-form-label">SB</label>
                </div>
                <div class="col-6">
                    <input type="checkbox" class="form-check-input" value="0.-" name="f_o_e_d_deduetible"  autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input">0.-</label>
                    <input type="checkbox" class="form-check-input" value="1'000.-" name="f_o_e_d_deduetible" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input2">200.-</label>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-6">
                    <label class="col-form-label"> Diebstahl ausw </label>
                </div>
                <div class="col-6">
                    <input type="checkbox" class="form-check-input" value="Ja" name="theft_abroad" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input">Ja</label>
                    <input type="checkbox" class="form-check-input" value="Nein" name="theft_abroad" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input2">Nein</label>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-6">
                    <label class="col-form-label"> SB </label>
                </div>
                <div class="col-6">
                    <input type="checkbox" class="form-check-input" value="200.-" name="theft_deduetible" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input">200.-</label>
                    <input type="checkbox" class="form-check-input" value="500.-" name="theft_deduetible" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input2">500.-</label>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-6">
                    <label class="col-form-label"> Wasser </label>
                </div>
                <div class="col-6">
                    <input type="checkbox" class="form-check-input" value="0.-" name="water" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input">0.-</label>
                    <input type="checkbox" class="form-check-input" value="200.-" name="water" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input2">200.-</label>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-6">
                    <label class="col-form-label"> Gebäude </label>
                </div>
                <div class="col-6">
                    <input type="checkbox" class="form-check-input" value="Ja" name="buidliung" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input">Ja</label>
                    <input type="checkbox" class="form-check-input" value="Nein" name="buidliung" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input2">Nein</label>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-6">
                    <label class="col-form-label"> Reisegepäck </label>
                </div>
                <div class="col-6">
                    <input type="checkbox" class="form-check-input" value="Ja" name="luggage" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input">Ja</label>
                    <input type="checkbox" class="form-check-input" value="Nein" name="luggage" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input2">Nein</label>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-6">
                    <label class="col-form-label"> Summe </label>
                </div>
                <div class="col-6">
                    <input type="checkbox" class="form-check-input" value="2'000.-" name="luggage_total" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input">2'000.-</label>
                    <input type="checkbox" class="form-check-input" value="3'000.-" name="luggage_total" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input2">3'000.-</label>
                    <input type="checkbox" class="form-check-input" value="3'000.-" name="luggage_total" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input2">3'000.-</label>
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
                    <label class="col-form-label">Elektro-Kasko</label>
                </div>
                <div class="col-6">
                    <input type="checkbox" class="form-check-input" value="Ja" name="electro" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input">Ja</label>
                    <input type="checkbox" class="form-check-input" value="Nein" name="electro" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input2">Nein</label>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-6">
                    <label class="col-form-label">Summe</label>
                </div>
                <div class="col-6">
                    <input type="checkbox" class="form-check-input" value="2'000.-" name="electro_total" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input">2'000.-</label>
                    <input type="checkbox" class="form-check-input" value="3'000.-" name="electro_total" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input2">3'000.-</label>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-6">
                  <label class="col-form-label">SB</label>
                </div>
                <div class="col-6">
                    <input type="checkbox" class="form-check-input" value="0.-" name="electro_deduetible" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input">0.-</label>
                    <input type="checkbox" class="form-check-input" value="200.-" name="electro_deduetible" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input2">200.-</label>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-6">
                    <label class="col-form-label">Glas</label>
                </div>
                <div class="col-6">
                    <input type="checkbox" class="form-check-input" value="Ja" name="glass" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input">Ja</label>
                    <input type="checkbox" class="form-check-input" value="Nein" name="glass" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input2">Nein</label>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-6">
                  <label class="col-form-label">Cyber-Schutz</label>
                </div>
                <div class="col-6">
                    <input type="checkbox" class="form-check-input" value="Ja" name="cyber_schutz" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input">Ja</label>
                    <input type="checkbox" class="form-check-input" value="Nein" name="cyber_schutz" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input2">Nein</label>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-6">
                    <label class="col-form-label">Privathaftpflich</label>
                </div>
                <div class="col-6">
                    <input type="checkbox" class="form-check-input" value="Ja" name="personal_liability" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input">Ja</label>
                    <input type="checkbox" class="form-check-input" value="Nein" name="personal_liability" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input2">Nein</label>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-6">
                    <label class="col-form-label">Summe</label>
                </div>
                <div class="col-6">
                    <input type="checkbox" class="form-check-input" value="5Mio." name="personal_liability_total" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input">5Mio.</label>
                    <input type="checkbox" class="form-check-input" value="10Mio." name="personal_liability_total" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input2">10Mio.</label>
                </div>
            </div>

            <div class="row p-2">
                <div class="col-6">
                  <label class="col-form-label">SB</label>
                </div>
                <div class="col-6">
                    <input type="checkbox" class="form-check-input" value="0.-" name="personal_liability_deductible" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input">0.-</label>
                    <input type="checkbox" class="form-check-input" value="200.-" name="personal_liability_deductible" autocomplete="off"/>
                    <label class="form-check-label" for="form-check-input2">200.-</label>
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
        <div class="row">
            <div class="col-6">
              <label class="col-form-label">Weitere Versicherungen</label>
            </div>
            <div class="col-6">
            <input type="text" name="other_insurance" value="{{$in->other_insurance}}" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
              <label class="col-form-label">Bermerkungen</label>
            </div>
            <div class="col-6">
            <textarea type="text" name="comments" value="{{$in->comments}}" class="form-control"></textarea>
            </div>
        </div>

    </div>
    </div>

    <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">speichern</button>

      </div>
    </div>
</form>
@endforeach
@endsection
