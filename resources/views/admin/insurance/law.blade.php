@extends('admin.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="aNeinnymous" referrerpolicy="Nein-referrer" />

@endsection
@section('content')

<form action="{{route('admin.form.law')}}" method="post" enctype="multipart/form-data">
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
                    {{-- <h4>Fahrzeughalter</h4> --}}
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
                          <label class="col-form-label">Nachname</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="l_name" required>
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
                            <input type="date" class="form-control" name="birthday" required>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">Arbeitsverhältnis</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="employment_relation" required>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">Aktueller Beruf</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="current_job" required>
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


                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">Tel</label>
                        </div>
                        <div class="col-6">
                            <input type="phone" class="form-control" name="phone" required>
                        </div>
                    </div>


                    <input type="hidden" name="insurance_type" value="Law Insurance">

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
                            <input type="text" class="form-control" name="zip">
                        </div>
                    </div>


                    <div class="row py-2">
                        <div class="col-6">
                          <label class="col-form-label">Aufenthaltsbew</label>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="place" required>
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
                          <label class="col-form-label">Privatrechtschutz </label>
                        </div>
                        <div class="col-6">
                            <input type="checkbox" class="form-check-input" value="Ja" name="private" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input">Ja</label>

                            <input type="checkbox" class="form-check-input" value="Nein" name="private" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input2">Nein</label>
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Verkehrsrechtschutz </label>
                        </div>
                        <div class="col-6">
                            <input type="checkbox" class="form-check-input" value="Ja" name="traffic" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input">Ja</label>

                            <input type="checkbox" class="form-check-input" value="Nein" name="traffic" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input2">Nein</label>
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Zusatz Selbständigkeit </label>
                        </div>
                        <div class="col-6">
                            <input type="checkbox" class="form-check-input" value="Ja" name="self_employ" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input">Ja</label>

                            <input type="checkbox" class="form-check-input" value="Nein" name="self_employ" autocomplete="off"/>
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
                          <label class="col-form-label">Firmenrechtschutz</label>
                        </div>
                        <div class="col-6">
                            <input type="checkbox" class="form-check-input" value="Ja" name="company" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input">Ja</label>

                            <input type="checkbox" class="form-check-input" value="Nein" name="company" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input2">Nein</label>

                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Geltungsbereich</label>
                        </div>
                        <div class="col-6">
                            <input type="checkbox" class="form-check-input" value="Europa" name="scope" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input">Europa</label>

                            <input type="checkbox" class="form-check-input" value="Welt" name="scope" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input2">Welt</label>

                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-6">
                          <label class="col-form-label">Personen</label>
                        </div>
                        <div class="col-6">
                            <input type="checkbox" class="form-check-input" value="One" name="person" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input">1 Person</label>

                            <input type="checkbox" class="form-check-input" value="Mehrpersonen" name="person" autocomplete="off"/>
                            <label class="form-check-label" for="form-check-input2">Mehrpersonen</label>

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
            <textarea type="text" class="form-control" name="comments"></textarea>
        </div>
        </div>

        <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">speichern</button>

          </div>
        </div>


    </form>
@endsection
@section('footer_js')

@endsection
