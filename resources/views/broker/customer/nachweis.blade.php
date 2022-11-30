@extends('broker.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<div class="container">
        <div class="row">

                <div class="col-4">
                    <div class="card">
                    @foreach ($customer as $cus)
                    <div class="card-header">
                    <h3> {{ $cus->customer_f_name }}</h3>
                    </div>
                    <div class="card-body">

                        <table class="table">
                          <thead>

                            <tr>
                              <th scope="col">Kundennummer</th>
                              <td>: {{ $cus->customer_number }}</td>
                            </tr>
                            <tr>
                              <th scope="col">Vorname</th>
                              <td>: {{ $cus->customer_f_name }}</td>
                            </tr>
                            <tr>
                              <th scope="col">Nachname</th>
                              <td>: {{ $cus->customer_l_name }}</td>
                            </tr>
                            <tr>
                              <th scope="col">Email</th>
                              <td>: {{ $cus->customer_email }}</td>
                            </tr>
                            <tr>
                              <th scope="col">Strasse</th>
                              <td>: {{ $cus->customer_street }}</td>
                            </tr>
                            <tr>
                              <th scope="col">Tel</th>
                              <td>: {{ $cus->customer_phone }}</td>
                            </tr>
                            <tr>
                              <th scope="col">Mobile</th>
                              <td>: {{ $cus->customer_mobile }}</td>
                            </tr>
                            <tr>
                              <th scope="col">PLZ</th>
                              <td>: {{ $cus->customer_zip }}</td>
                            </tr>
                            <tr>
                              <th scope="col">Ort</th>
                              <td>: {{ $cus->customer_place }}</td>
                            </tr>
                            <tr>
                              <th scope="col">Berater</th>
                              <td>: {{ $cus->customer_agent }}</td>
                            </tr>
                            <tr>
                              <th scope="col">Reg. Date </th>
                              <td>: {{ $cus->created_at->diffForHumans() }}</td>
                            </tr>
                                @php
                    $info = App\Nachweis::where('customer_number', $cus->customer_number)->get();

                  @endphp
                          </thead>
                        </table>
                    </div>
                  </div>
                </div>

                @endforeach


                <div class="col-4">

                  <div class="card">
                  <div class="card-header">
                    <a data-bs-toggle="modal" data-bs-target="#Nachweis" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" href="#"><i class="fas fa-plus"></i> Neuer Nachweis</a>
                  </div>
                  </div>


                  @foreach ($info as $in)
                  @php
                  $status = App\NaMail::where('nachweis_number', $in->nachweis_number)->get();
                  @endphp
                  <div class="card">
                  <div class="card-body">

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Model</th>
                          <td>: {{ $in->model }}</td>
                        </tr>
                        <tr>
                          <th scope="col">Marke</th>
                          <td>: {{ $in->marke }}</td>
                        </tr>
                        <tr>
                          <th scope="col">Typenschein</th>
                          <td>: {{ $in->typenschein }}</td>
                        </tr>
                        <tr>
                          <th scope="col">1.Inv</th>
                          <td>: {{ date('d.m.Y', strtotime($in->inv))}}</td>
                        </tr>
                        <tr>
                          <th scope="col">Stammnummer</th>
                          <td>: {{ $in->Stammnummer }}</td>
                        </tr>
                        <tr>
                          <th scope="col">Grund</th>
                          <td>: {{ $in->grund }}</td>
                        </tr>
                        <tr>
                          <th scope="col">Kontrollschild</th>
                          <td>: {{ $in->kontrollschild }}</td>
                        </tr>

                        <tr>
                            <th scope="col">Gesellschaft</th>
                           @php
                               $company=App\InsuranceCompany::where('company_email', $in->company_email)->get();
                           @endphp
                             <form action="{{route('mail.nachweis')}}" method="post">
                                @csrf
                            <td>
                            @foreach ($company as $item)
                            {{ $item->company_name }}
                            @endforeach
                            <input type="hidden" name="company_email" value="{{ $in->company_email }}">

                            </td>
                          </tr>

                          <tr>
                            <th scope="col">Status</th>
                            <td>
                                @foreach ($status as $sta)
                                @if ($sta->status =='1')
                                <button type="submit" class="btn btn-outline-success">Gesendet</button>
                                 @else
                                 <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Not Mailed</button>
                                @endif
                                @endforeach
                            </td>
                          </tr>
                      </thead>
                    </table>

                    </div>


            <div class="card-footer">

            @foreach ($customer as $cus)
            <input type="hidden" name="customer_number" value="{{$cus->customer_number}}">
            <input type="hidden" name="customer_f_name" value="{{$cus->customer_f_name}}">
            <input type="hidden" name="customer_l_name" value="{{$cus->customer_l_name}}">
            <input type="hidden" name="customer_email" value="{{$cus->customer_email}}">
            <input type="hidden" name="customer_phone" value="{{$cus->customer_phone}}">
            <input type="hidden" name="customer_mobile" value="{{$cus->customer_mobile}}">
            <input type="hidden" name="customer_street" value="{{$cus->customer_street}}">
            <input type="hidden" name="customer_zip" value="{{$cus->customer_zip}}">
            <input type="hidden" name="customer_place" value="{{$cus->customer_place}}">
            <input type="hidden" name="customer_type" value="{{$cus->customer_type}}">
            <input type="hidden" name="customer_date_of_birth" value="{{$cus->customer_date_of_birth}}">
            @endforeach
            @foreach ($info as $in)
            <input type="hidden" name="model" value="{{$in->model}}">
            <input type="hidden" name="marke" value="{{$in->marke}}">
            <input type="hidden" name="typenschein" value="{{$in->typenschein}}">
            <input type="hidden" name="inv" value="{{$in->inv}}">
            <input type="hidden" name="Stammnummer" value="{{$in->Stammnummer}}">
            <input type="hidden" name="kontrollschild" value="{{$in->kontrollschild}}">
            <input type="hidden" name="grund" value="{{$in->grund}}">
            <input type="hidden" name="nachweis_number" value="{{ $in->nachweis_number }}">
            @endforeach
            <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Send</button>
            </form>

        </div>
      </div>


      @endforeach
                </div>
        </div>
        </div>



  <!-- Modal -->
<div class="modal fade" id="Nachweis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Neues Dokument</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('broker.post_nachweis')}}" method="post" enctype="multipart/form-data">
          @csrf
      <div class="modal-body">
        @foreach ($customer as $cus)
           <input type="hidden" name="customer_number" value="{{$cus->customer_number}}">
           <input type="hidden" name="customer_f_name" value="{{$cus->customer_f_name}}">
           <input type="hidden" name="customer_l_name" value="{{$cus->customer_l_name}}">
           <input type="hidden" name="customer_email" value="{{$cus->customer_email}}">
           <input type="hidden" name="customer_phone" value="{{$cus->customer_phone}}">
           <input type="hidden" name="customer_mobile" value="{{$cus->customer_mobile}}">
           <input type="hidden" name="customer_street" value="{{$cus->customer_street}}">
           <input type="hidden" name="customer_zip" value="{{$cus->customer_zip}}">
           <input type="hidden" name="customer_place" value="{{$cus->customer_place}}">
           <input type="hidden" name="customer_type" value="{{$cus->customer_type}}">
           <input type="hidden" name="customer_date_of_birth" value="{{$cus->customer_date_of_birth}}">
        @endforeach

  <div class="mb-3">
    <label class="form-label">Marke</label>
    <input type="text" name="marke" class="form-control" required>
    </div>

    <div class="mb-3">
    <label class="form-label">Model</label>
    <input type="text" name="model" class="form-control" required>
    </div>


    <div class="mb-3">
    <label class="form-label">Typenschein</label>
    <input name="typenschein" type="text" class="form-control" required>
    </div>

    <div class="mb-3">
    <label class="form-label">Inv</label>
    <input name="inv" type="date" class="form-control" required>
    </div>

    <div class="mb-3">
    <label class="form-label">Kontrollschild</label>
    <input name="kontrollschild" type="text" class="form-control" required>
    </div>

    <div class="mb-3">
    <label class="form-label">Stammnummer</label>
    <input name="Stammnummer" type="text" class="form-control" required>
    </div>

    <div class="md-3">
        <label for="select" class="form-label">Grund</label>
        <select name="grund" class="form-control" required>
            <option selected>Select One</option>

           <option value="Neueinlösung">Neueinlösung</option>
              <option value="Fahrzeugwechsel">Fahrzeugwechsel</option>
              <option value="WIK A">WIK A</option>
              <option value="WIK B">WIK B</option>
              <option value="Halterwechsel">Halterwechsel</option>
          <option value="Übrige Fälle">Übrige Fälle</option>
          <option value="WS-Eröffnung">WS-Eröffnung</option>
        </select>
    </div>

    <div class="md-3">
        <label for="select" class="form-label">Company</label>
        <select name="company_email" class="form-control" required>
            <option selected>Select One</option>

            @foreach (App\InsuranceCompany::all() as $company)
            <option value="{{ $company->company_email }}">{{$company->company_name}}</option>
            @endforeach

        </select>
    </div>

    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-default" style="color:black; background-color:rgb(182, 182, 182);">Speichern</button>
    </div>
    </form>
    </div>
  </div>
</div>
@endsection
@section('footer_js')

@endsection
