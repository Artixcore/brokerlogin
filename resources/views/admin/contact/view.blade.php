@extends('admin.master')
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
                       <h4>Kunden</h4>
                      </div>
                    <div class="card-body">

                        <table class="table">
                          <thead>

                            <tr>
                              <th scope="col">Kundennummer</th>
                              <th> {{ $cus->customer_number }}</th>
                            </tr>
                            <tr>
                              <th scope="col">First Name</th>
                              <th> {{ $cus->customer_f_name }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Last Name</th>
                              <th> {{ $cus->customer_l_name }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Email</th>
                              <th> {{ $cus->customer_email }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Street</th>
                              <th> {{ $cus->customer_street }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Phone</th>
                              <th> {{ $cus->customer_phone }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Mobile</th>
                              <th> {{ $cus->customer_mobile }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Zip</th>
                              <th> {{ $cus->customer_zip }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Place</th>
                              <th> {{ $cus->customer_place }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Agent</th>
                              <th> {{ $cus->customer_agent }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Reg. Date </th>
                              <th> {{ $cus->created_at->diffForHumans() }}</th>
                            </tr>
                                @php
                    $info = App\Application::where('customer_number', $cus->customer_number)->get();
                    $docs = App\AppDoc::where('customer_number', $cus->customer_number)->get();
                  @endphp
                          </thead>
                        </table>
                    </div>
                  </div>
                </div>

                @endforeach


                <div class="col-8">

                  <div class="card">
                  <div class="card-header">
                    <a data-bs-toggle="modal" data-bs-target="#application" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" href="{{route('application.new')}}"><i class="fas fa-plus"></i> New Application</a>
                  </div>
                  </div>


                  <div class="card">
                      <div class="card-body">
                        <table class="table table-hover" id="table1">
                            <thead>
                              <tr>
                                <th scope="col">Company</th>
                                <th scope="col">Category</th>
                                <th scope="col">Education</th>
                                <th scope="col">Start</th>
                                <th scope="col">End</th>
                                <th scope="col">Öffnen </th>
                                <th scope="col">Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($info as $in)
                                @php
                                $company = App\InsuranceCompany::where('company_email',  $in->insurance_email)->get();
                                @endphp
                              <tr>
                                <td>
                                    @foreach($company as $com)
                                    {{ $com->company_name}}
                                    @endforeach
                                </td>
                                <td> {{ $in->insurance_type }} </td>
                                <td> {{ date('d.m.Y', strtotime($in->education)) }} </td>
                                <td> {{ date('d.m.Y', strtotime($in->start)) }} </td>
                                <td> {{ date('d.m.Y', strtotime($in->end)) }} </td>
                                {{-- <td><a href="" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">View</a></td> --}}
                                <td>
                                    <a class="btn btn-danger" onclick="return myFunction();" href="{{route('city-delete', $result->my_id)}}"><i class="fa fa-trash"></i></a>


                                    {{-- <a href="{{route('application.delete', $in->application_number)}}" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a> --}}
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                      </div>


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
      <form action="{{route('admin.docs')}}" method="post" enctype="multipart/form-data">
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
    <label class="form-label">Document type</label>
    <select name="insurance_type" class="form-control">
      <option selected>Select One</option>
      <option value="Mandat">Mandat</option>
      <option value="Kündigung">Kündigung</option>
      <option value="Police">Police</option>
      <option value="Diverses">Diverses</option>
     </select>
  </div>

  <div class="mb-3">
    <label class="form-label">Insurance Comapny</label>

    <select name="insurance_email" class="form-control">
        <option selected>Select One</option>
        @foreach (App\InsuranceCompany::all() as $company)
        <option value="{{$company->company_email}}">{{$company->company_name}}</option>
        @endforeach

       </select>
  </div>

  <div class="mb-3">
    <label class="form-label">File</label>
    <input name="insurance_doc" type="file" class="form-control">
  </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Speichern</button>
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
        <form action="{{route('application.post_application')}}" enctype="multipart/form-data" method="POST">
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
                          <label class="form-label">Insurance Company</label>
                          <select name="insurance_email" class="form-control">
                            <option selected>Select One..</option>
                            @foreach (App\InsuranceCompany::all() as $company)
                            <option value="{{$company->company_email}}"> {{$company->company_name}}</option>
                            @endforeach
                          </select>
                        </div>
                  </div>
                  <div class="col-6">
                    <div class="mb-3">
                      <label class="form-label">Education</label>
                      <input type="date" name="education" class="form-control">
                    </div>
              </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                  <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label">Beginning</label>
                        <input type="date" class="form-control" name="beginning">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Commissioned</label>
                        <input type="text" class="form-control" disabled value="N/A">
                      </div>
                  </div>

                  <div class="col-4">
                    <div class="mb-3">
                      <label class="form-label">Start</label>
                      <input type="date" class="form-control" name="start">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">End</label>
                      <input type="date" class="form-control" name="end">
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="mb-3">
                      <label class="form-label">Policy No</label>
                      <input type="text" class="form-control" name="policy_no">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Premium</label>
                      <input type="text" class="form-control" name="premium">
                    </div>
                  </div>
                </div>
              </div>

              <div class="container">
                <div class="row">
                    <div class="mb-3">
                        <label class="form-label">Attach Document</label>
                        <input type="file" class="form-control" name="pdf">
                      </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Speichern</button>
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
<script>
$(document).ready(function() {
$('#table1').DataTable();
} );
</script>
@endsection
