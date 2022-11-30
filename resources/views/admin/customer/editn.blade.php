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
                    <h3> {{ $cus->customer_f_name }}</h3>
                    </div>
                    <div class="card-body">

                        <table class="table">
                          <thead>

                            <tr>
                              <th scope="col">Customer ID</th>
                              <th>: {{ $cus->customer_number }}</th>
                            </tr>
                            <tr>
                              <th scope="col">First Name</th>
                              <th>: {{ $cus->customer_f_name }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Last Name</th>
                              <th>: {{ $cus->customer_l_name }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Email</th>
                              <th>: {{ $cus->customer_email }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Street</th>
                              <th>: {{ $cus->customer_street }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Phone</th>
                              <th>: {{ $cus->customer_phone }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Mobile</th>
                              <th>: {{ $cus->customer_mobile }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Zip</th>
                              <th>: {{ $cus->customer_zip }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Place</th>
                              <th>: {{ $cus->customer_place }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Agent</th>
                              <th>: {{ $cus->customer_agent }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Reg. Date </th>
                              <th>: {{ $cus->created_at->diffForHumans() }}</th>
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
                    <a data-bs-toggle="modal" data-bs-target="#Nachweis" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" href="#"><i class="fas fa-plus"></i> New Nachweis</a>
                  </div>
                  </div>


                  @foreach ($info as $in)
                  <div class="card py-2">
                  <div class="card-body">

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Model</th>
                          <th>: {{ $in->model }}</th>
                        </tr>
                        <tr>
                          <th scope="col">Marke</th>
                          <th>: {{ $in->marke }}</th>
                        </tr>
                        <tr>
                          <th scope="col">Typenschein</th>
                          <th>: {{ $in->typenschein }}</th>
                        </tr>
                        <tr>
                          <th scope="col">1.Inv</th>
                          <th>: {{$in->inv}}</th>
                        </tr>
                        <tr>
                          <th scope="col">Stammnummer</th>
                          <th>: {{ $in->Stammnummer }}</th>
                        </tr>

                      </thead>
                    </table>

                    </div>
                  </div>
                     @endforeach


                </div>

        </div>



  <!-- Modal -->
<div class="modal fade" id="Nachweis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Document</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('admin.post_nachweis')}}" method="post" enctype="multipart/form-data">
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
    <label class="form-label">Model</label>
    <input type="text" name="model" class="form-control">
    </div>

    <div class="mb-3">
    <label class="form-label">Marke</label>
    <input type="text" name="marke" class="form-control">
    </div>

    <div class="mb-3">
    <label class="form-label">Typenschein</label>
    <input name="typenschein" type="text" class="form-control">
    </div>

    <div class="mb-3">
    <label class="form-label">Inv</label>
    <input name="inv" type="text" class="form-control">
    </div>

    <div class="mb-3">
    <label class="form-label">Stammnummer</label>
    <input name="Stammnummer" type="text" class="form-control">
    </div>

    <div class="md-3">
        <label for="select" class="form-label">Company</label>
        <select name="company_email" class="form-control">
            <option selected>Select One</option>

            @foreach (App\InsuranceCompany::all() as $company)
            <option value="{{ $company->company_email }}">{{$company->company_name}}</option>
            @endforeach

        </select>
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

@endsection
