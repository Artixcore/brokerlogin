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
                        <a href="{{route('broker.customer.edit', $cus->customer_number)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3"> <i class="far fa-edit"></i> </a>
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
                              <th scope="col">Geburtstag</th>
                              <td>: {{date('d.m.Y', strtotime($cus->customer_date_of_birth)) }}</td>
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
                              @php
                                  $user = App\User::where('id', $cus->user_id)->get();
                              @endphp
                              <td>:
                                  @foreach ($user as $item)
                                      {{ $item->name }}
                                  @endforeach
                              </td>
                            </tr>
                            <tr>
                              <th scope="col">Reg. Date </th>
                              <td>: {{ $cus->created_at->diffForHumans() }}</td>
                            </tr>
                                @php
                    $info = App\Application::where('customer_number', $cus->customer_number)->get();
                    $docs = App\AppDoc::where('customer_number', $cus->customer_number)->get();
                    $form = App\Fremdvertrag::where('customer_number', $cus->customer_number)->get();
                  @endphp
                          </thead>
                        </table>
                    </div>
                  </div>


                  <div class="card">
                    <div class="card-body">
                        <a data-bs-toggle="modal" data-bs-target="#Fremdvertrag" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" href="#"><i class="fas fa-plus"></i> Fremdvertrag</a>
                    </div>
                    </div>

                  @foreach ($form as $for)
                  <div class="card py-2">
                      <div class="card-body">
                          <table class="table">
                          @php
                          $company = App\InsuranceCompany::where('company_email',  $for->insurance_email)->get();
                          @endphp
                          <tbody>
                              <tr>
                              <th scope="col">Gesellschaft</th>
                              <td>
                                  @foreach($company as $com)
                                  {{ $com->company_name}}
                                  @endforeach
                              </td>
                             </tr>
                              <tr><th scope="col">Police-Nr.</th><td> {{ $for->policy_no }} </td></tr>
                              <tr><th scope="col">Start</th><td>{{ date('d.m.Y', strtotime($for->start)) }}</td></tr>
                              <tr><th scope="col">Ende</th><td>{{ date('d.m.Y', strtotime($for->end)) }}</td></tr>
                              <tr>
                                  <th scope="col">Art der Versicherung</th>
                                  <td>{{ $for->insurance_type }}</td>
                                </tr>
                              <tr><th scope="col"><a href="{{route('broker.fremdvertrag.edit', $for->con_number)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Öffnen </a></th><td>
                                  <form action="{{ route('broker.fremdvertrag.delete', $for->id)}}" method="post">
                                      @method('post')
                                      @csrf
                                      <button onclick="return myFunction();" type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                                  </form>
                              </td></tr>
                          </tbody>
                      </table>
                  </div>
              </div>
              @endforeach

                </div>

                @endforeach


                <div class="col-4">

                  <div class="card">
                  <div class="card-header">
                    <a data-bs-toggle="modal" data-bs-target="#application" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" href="{{route('broker.new')}}"><i class="fas fa-plus"></i> Neuer Vertrag </a>
                  </div>
                  </div>


                  @foreach ($info as $in)
                  <div class="card py-2">
                  <div class="card-body">

                    <table class="table">
                      <thead>

                        <tr>
                          <th scope="col">Gesellschaft</th>
                          @php
                          $company = App\InsuranceCompany::where('company_email',  $in->insurance_email)->get()
                          @endphp
                          <td>:
                            @foreach($company as $com)
                            {{ $com->company_name}}
                            @endforeach
                          </td>
                        </tr>
                        <tr>
                            <th scope="col">Police-Nr.</th>
                            <td>: {{ $in->policy_no }}</td>
                          </tr>
                        <tr>
                          <th scope="col">Art der Versicherung</th>
                          <td>: {{ $in->insurance_type }}</td>
                        </tr>
                        <tr>
                          <th scope="col">Termin</th>
                          <td>: {{ date('d.m.Y', strtotime($in->education)) }}</td>
                        </tr>
                        <tr>
                          <th scope="col">Start</th>
                          <td>: {{ date('d.m.Y', strtotime($in->start)) }}</td>
                        </tr>
                        <tr>
                          <th scope="col">Ende</th>
                          <td>: {{ date('d.m.Y', strtotime($in->end)) }}</td>
                        </tr>
                        <tr>
                        <tr>
                            <th scope="col">Kommentar</th>
                            <td>: <a data-bs-toggle="modal" data-bs-target="#note">
                                {{ $in->app_comment }}</a>
                            </td>
                        </tr>
                        <tr>
                        <th scope="col">Provision</th>
                            <td>: CHF {{ $in->commission/100*40 }}
                            </td>
                        </tr>
                       <tr>

                           <td>
                             <a href="{{ route('broker.contact.app', $in->application_number) }}" style="float: right;" class="btn btn-outline-success">Öffnen </a> 
                            <!-- <a href="{{route('broker.contact.view', $in->customer_number)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3"> Öffnen  </a> -->
                           </td>
                       </tr>
                        <tr>
                      </thead>
                    </table>

                    </div>



                  </div>
                     @endforeach


                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                        <a data-bs-toggle="modal" data-bs-target="#docs" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" style="float:right;" href="#"><i class="fas fa-plus"></i> Neues Dokument</a>
                        </div>
                        @foreach ($docs as $in)
                        @php
                        $status = App\AdMail::where('doc_number', $in->doc_number)->get();
                        @endphp
                        <div class="card-body">

                            <table class="table">
                                <tbody>
                                  <tr>
                                    @php
                                    $company = App\InsuranceCompany::where('company_email',  $in->insurance_email)->get();
                                    @endphp
                                    <td>
                                        @foreach($company as $com)
                                        {{ $com->company_name}}
                                        @endforeach
                                    </td>

                                    <td> {{ $in->doc_comment }} </td>
                                    <td>
                                        @foreach ($status as $sta)
                                        @if ($sta->status =='1')
                                        <button type="submit" class="btn btn-outline-success">Gesendet</button>
                                         @else
                                         <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Not Mailed</button>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="d-grid gap-2 btn btn-outline-success btn-block" href="{{ route('broker.contact.doc', $in->doc_number)}}">  Öffnen  </a>
                                    </td>

                                  </tr>
                                </tbody>
                            </table>

                        </div>
                        @endforeach
                    </div>
                </div>


              </div>
        </div>








        {{-- // Application --}}
<div class="modal fade" id="Fremdvertrag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Neuer Vertrag</h5>
          <button type="button" class="btn-close btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('application.fremdvertrag.post')}}" enctype="multipart/form-data" method="POST">
            @csrf
        <div class="modal-body">
            @foreach ($customer as $cus)
            <input type="hidden" name="customer_number" value="{{$cus->customer_number}}">
            <input type="hidden" name="customer_f_name" value="{{$cus->customer_f_name}}">
            <input type="hidden" name="customer_l_name" value="{{$cus->customer_l_name}}">
            <input type="hidden" name="customer_email"  value="{{$cus->customer_email}}">
            <input type="hidden" name="customer_phone"  value="{{$cus->customer_phone}}">
            <input type="hidden" name="customer_mobile" value="{{$cus->customer_mobile}}">
            <input type="hidden" name="customer_street" value="{{$cus->customer_street}}">
            <input type="hidden" name="customer_zip"    value="{{$cus->customer_zip}}">
            <input type="hidden" name="customer_place"  value="{{$cus->customer_place}}">
            <input type="hidden" name="user_id"  value="{{$cus->user_id}}">
            @endforeach
            <div class="container">
                <div class="row">
                 @foreach (App\Insurance_Type::all() as $icon)
                    <div class="col-2">
                        <div class="card">
                            <div class="card-body">
                                <h1>{!! $icon->icon !!} </h1>
                                <h4>{{ $icon->name }}</h4>
                                <input type="checkbox" name="insurance_type" value="{{$icon->name}}">
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                          <label class="form-label">Versicherungsgesellschaft</label>
                          <select name="insurance_email" class="form-control">
                            <option selected>Select One..</option>
                            @foreach (App\InsuranceCompany::all() as $company)
                            <option value="{{$company->company_email}}">{{$company->company_name}}</option>
                            @endforeach
                          </select>
                        </div>
                  </div>

                </div>
            </div>

            <div class="container">
                <div class="row">

                  <div class="col-6">
                    <div class="mb-3">
                      <label class="form-label">Start</label>
                      <input type="date" class="form-control" name="start">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Ende</label>
                      <input type="date" class="form-control" name="end">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="mb-3">
                      <label class="form-label">Police-Nr.</label>
                      <input type="text" class="form-control" name="policy_no">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Prämie</label>
                      <input type="text" class="form-control" name="premium">
                    </div>
                  </div>
                </div>
              </div>

              <div class="container">
                <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label">Dokument hochladen</label>
                        <input type="file" class="form-control" name="pdf">
                    </div>
                </div>

                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Speichern</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Modal -->
<div class="modal fade" id="docs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Neues Dokument</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('broker.docs')}}" method="post" enctype="multipart/form-data">
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
        @endforeach
    <div class="mb-3">
    <label class="form-label">Art des Dokuments</label>
    <select name="insurance_type" class="form-control">
      <option selected>Select One</option>
      <option value="Mandat">Mandat</option>
      <option value="Kündigung">Kündigung</option>
      <option value="Police">Police</option>
      <option value="Diverses">Diverses</option>
     </select>
  </div>

  <div class="mb-3">
    <label class="form-label">Gesellschaft</label>

    <select name="insurance_email" class="form-control">
        <option selected>Select One</option>
        @foreach (App\InsuranceCompany::all() as $company)
        <option value="{{$company->company_email}}">{{$company->company_name}}</option>
        @endforeach

       </select>
  </div>

  <div class="mb-3">
    <label class="form-label">Upload Dokument</label>
    <input name="insurance_doc" type="file" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Kommentar</label>
      <input type="text" name="doc_comment" class="form-control">
  </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Speichern</button>
      </div>
    </form>
    </div>
  </div>
</div>





{{-- // Application --}}
<div class="modal fade" id="application" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Neuer Vertrag </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('broker.post_application')}}" enctype="multipart/form-data" method="POST">
            @csrf
        <div class="modal-body">
            @foreach ($customer as $cus)
            <input type="hidden" name="customer_number" value="{{$cus->customer_number}}">
            <input type="hidden" name="customer_f_name" value="{{$cus->customer_f_name}}">
            <input type="hidden" name="customer_l_name" value="{{$cus->customer_l_name}}">
            <input type="hidden" name="customer_email"  value="{{$cus->customer_email}}">
            <input type="hidden" name="customer_phone"  value="{{$cus->customer_phone}}">
            <input type="hidden" name="customer_mobile" value="{{$cus->customer_mobile}}">
            <input type="hidden" name="customer_street" value="{{$cus->customer_street}}">
            <input type="hidden" name="customer_zip"    value="{{$cus->customer_zip}}">
            <input type="hidden" name="customer_place"  value="{{$cus->customer_place}}">
            @endforeach
            <div class="container">
                <div class="row">
                 @foreach (App\Insurance_Type::all() as $icon)
                    <div class="col-2">
                        <div class="card">
                            <div class="card-body">
                                <h1>{!! $icon->icon !!} </h1>
                                <p>{{ $icon->name }}</p>
                                <input type="checkbox" name="insurance_type" value="{{$icon->name}}">
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                          <label class="form-label">Gesellschaft</label>
                          <select name="insurance_email" class="form-control">
                            <option selected>Select One..</option>
                            @foreach (App\InsuranceCompany::all() as $company)
                            <option value="{{$company->company_email}}"> <img src="{{asset('company')}}/{{ $company->company_logo }}" alt=""> {{$company->company_name}}</option>
                            @endforeach
                          </select>
                        </div>
                  </div>
                  <div class="col-6">
                    <div class="mb-3">
                      <label class="form-label">Termin</label>
                      <input type="date" name="education" class="form-control">
                    </div>
              </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                  {{-- <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label">Beginning</label>
                        <input type="date" class="form-control" name="beginning">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Provisioniert</label>
                        <input type="text" class="form-control" disabled value="N/A">
                      </div>
                  </div> --}}

                  <div class="col-6">
                    <div class="mb-3">
                      <label class="form-label">Start</label>
                      <input type="date" class="form-control" name="start">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Ende</label>
                      <input type="date" class="form-control" name="end">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="mb-3">
                      <label class="form-label">Police-Nr</label>
                      <input type="text" class="form-control" name="policy_no">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Prämie</label>
                      <input type="text" class="form-control" name="premium">
                    </div>
                  </div>
                </div>
              </div>

              <div class="container">
                <div class="row">
                    <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Upload Dokument</label>
                        <input type="file" class="form-control" name="pdf">
                      </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Kommentar</label>
                            <select name="app_comment" class="form-control">
                                <option selected>Select One..</option>
                                <option value="Neuabschluss">Neuabschluss</option>
                                <option value="Änderung">Änderung</option>
                               
                            </select>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Speichern</button>
        </div>
        </form>
      </div>
    </div>
  </div>



@endsection
@section('footer_js')
<script>
    function myFunction() {
        if(!confirm("Bist Du sicher?"))
        event.preventDefault();
    }
</script>
@endsection
