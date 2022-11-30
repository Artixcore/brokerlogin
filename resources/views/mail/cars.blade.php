@extends('layouts.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show alert-block">
<strong>{{ $message }}</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@foreach($car as $ho)
<div class="card">
<div class="card-header"><h3> <b> {{ $ho->insurance_type }} </b> </h3></div>
<div class="card-body">
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-6">
        <table class="table">
            <tbody>
              <tr><th scope="row"><b>Salutation</b></th><td>{{$ho->salutation}}</td></tr>
              <tr><th scope="row"><b>First Name</b></th><td>{{$ho->f_name}}</td></tr>
              <tr><th scope="row"><b>Last Name</b></th><td>{{$ho->l_name}}</td></tr>
              <tr><th scope="row"><b>Street / Nr.</b></th><td>{{$ho->street}}</td></tr>
              <tr><th scope="row"><b>Date Of Birth</b></th><td>{{$ho->date_of_birth}}</td></tr>

              <tr><th></th><td></td></tr>
              <tr><th scope="row"><b>Examination submitted in<br/> the last five years? </b></th><td>{{$ho->e_s_i_5_y_a}}</td></tr>
              <tr><th scope="row"><b>if yes, how many</b></th><td>{{$ho->how_many}}</td></tr>
              <tr><th scope="row"><b>How Long</b></th><td>{{$ho->how_long}}</td></tr>
              <tr><th></th><td></td></tr>
              <tr><th scope="row"><b>Brand</b></th><td>{{$ho->vehicle_brand}}</td></tr>
              <tr><th scope="row"><b>Model / Rejected</b></th><td>{{$ho->vehicle_model}}</td></tr>
              <tr><th scope="row"><b>Vehicle Certificate Type</b></th><td>{{$ho->vehicle_certificate_type}}</td></tr>
              <tr><th scope="row"><b>Master number</b></th><td>{{$ho->vehicle_master_number}}</td></tr>
              <tr><th scope="row"><b>Type of building</b></th><td>{{$ho->type_of_building}}</td></tr>

              <tr><th scope="row"><b>1. date In traffic</b></th><td>{{$ho->vehicle_date_in_traffic}}</td></tr>
              <tr><th scope="row"><b>Catalog price</b></th><td>{{$ho->vehicle_catalog_price}}</td></tr>
              <tr><th scope="row"><b>Price Equipment</b></th><td>{{$ho->vehicle_equipment_price}}</td></tr>
              <tr><th scope="row"><b>Deductible</b></th><td>{{$ho->theft_deduetible}}</td></tr>

            </tbody>
        </table>

    </div>

    <div class="col-6">

        <table class="table">
            <tbody>
            <tr><th scope="row"><b>Surename</b></th><td>{{$ho->surename}}</td></tr>

            <tr><th scope="row"><b>Post Code</b></th><td>{{$ho->post_code}}</td></tr>

            <tr><th scope="row"><b>Residence</b></th><td>{{$ho->residence}}</td></tr>

            <tr><th scope="row"><b>Phone Number</b></th><td>{{$ho->phone}}</td></tr>

            <tr><th scope="row"><b>First Name</b></th><td>{{$ho->f_name}}</td></tr>
            <tr><th></th><td></td></tr>
            <tr><th scope="row"><b>Driver under 26 years</b></th><td>{{$ho->driver_under_26}}</td></tr>
            <tr><th scope="row"><b>Leasing</b></th><td>{{$ho->leasing}}</td></tr>
            <tr><th>Cover</th></tr>
            <tr><th scope="row"><b>Liability</b></th><td>{{$ho->insurance_liability}}</td></tr>
            <tr><th scope="row"><b>Partially Comprehensive</b></th><td>{{$ho->partially_comprehensive}}</td></tr>

            </tbody>
          </table>

        </div>




    </div>
</div>
<div class="card-footer">






    <form action="{{route('mail.cars')}}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="salutation" value="{{$ho->salutation}}">
        <input type="hidden" name="insurance_type" value="{{$ho->insurance_type}}">
        <input type="hidden" name="f_name" value="{{$ho->f_name}}">
        <input type="hidden" name="l_name" value="{{$ho->l_name}}">
        <input type="hidden" name="surename" value="{{$ho->surename}}">
        <input type="hidden" name="street" value="{{$ho->street}}">
        <input type="hidden" name="post_code" value="{{$ho->post_code}}">
        <input type="hidden" name="nationality" value="{{$ho->nationality}}">
        <input type="hidden" name="date_of_birth" value="{{$ho->date_of_birth}}">
        <input type="hidden" name="examination_since" value="{{$ho->examination_since}}">
        <input type="hidden" name="phone_number" value="{{$ho->phone_number}}">
        <input type="hidden" name="e_s_i_5_y_a" value="{{$ho->e_s_i_5_y_a}}">
        <input type="hidden" name="how_many" value="{{$ho->how_many}}">
        <input type="hidden" name="how_long" value="{{$ho->how_long}}">
        <input type="hidden" name="driver_under_26" value="{{$ho->driver_under_26}}">
        <input type="hidden" name="leasing" value="{{$ho->leasing}}">
        <input type="hidden" name="residence" value="{{$ho->residence}}">

        <input type="hidden" name="vehicle_brand" value="{{$ho->vehicle_brand}}">
        <input type="hidden" name="vehicle_model" value="{{$ho->vehicle_model}}">
        <input type="hidden" name="vehicle_certificate_type" value="{{$ho->vehicle_certificate_type}}">
        <input type="hidden" name="vehicle_master_number" value="{{$ho->vehicle_master_number}}">
        <input type="hidden" name="vehicle_date_in_traffic" value="{{$ho->vehicle_date_in_traffic}}">
        <input type="hidden" name="vehicle_catalog_price" value="{{$ho->vehicle_catalog_price}}">
        <input type="hidden" name="vehicle_equipment_price" value="{{$ho->vehicle_equipment_price}}">

        <input type="hidden" name="insurance_liability" value="{{$ho->insurance_liability}}">
        <input type="hidden" name="insurance_fully_compenensive" value="{{$ho->insurance_fully_compenensive}}">
        <input type="hidden" name="insurance_deductible" value="{{$ho->insurance_deductible}}">
        <input type="hidden" name="partially_comprehensive" value="{{$ho->partially_comprehensive}}">
        <input type="hidden" name="partially_deductible" value="{{$ho->partially_deductible}}">

        <input type="hidden" name="insurance_parkschaden" value="{{$ho->insurance_parkschaden}}">
        <input type="hidden" name="parkschaden_deductible" value="{{$ho->parkschaden_deductible}}">
        <input type="hidden" name="insurance_item_carried" value="{{$ho->insurance_item_carried}}">
        <input type="hidden" name="insurance_current_value" value="{{$ho->insurance_current_value}}">
        <input type="hidden" name="insurance_headlights" value="{{$ho->insurance_headlights}}">
        <input type="hidden" name="insurance_bonus_protection" value="{{$ho->insurance_bonus_protection}}">
        <input type="hidden" name="insurance_email" value="{{$ho->insurance_email}}">
        <input type="hidden" name="insurance_email_b" value="{{$ho->insurance_email_b}}">
        <input type="hidden" name="insurance_email_c" value="{{$ho->insurance_email_c}}">
        <input type="hidden" name="insurance_comments" value="{{$ho->insurance_comments}}">


    <button type="submit" class="btn btn-outline-success">Send Mail</button>
</div>
</form>
@endforeach
</div>
<!-- </div> -->
@endsection
