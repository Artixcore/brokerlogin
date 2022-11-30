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
@foreach($home as $ho)
<div class="card">
<div class="card-header"><h3> <b> {{ $ho->insurance_type }} </b> </h3></div>
<div class="card-body">
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-4">
        <table class="table">
            <tbody>
              <tr><th scope="row"><b>Salutation</b></th><td>{{$ho->salutation}}</td></tr>
              <tr><th scope="row"><b>First Name</b></th><td>{{$ho->f_name}}</td></tr>
              <tr><th scope="row"><b>Last Name</b></th><td>{{$ho->l_name}}</td></tr>
              <tr><th scope="row"><b>Street / Nr.</b></th><td>{{$ho->street}}</td></tr>
              <tr><th scope="row"><b>Date Of Birth</b></th><td>{{$ho->date_of_birth}}</td></tr>

              <tr><th></th><td></td></tr>
              <tr><th scope="row"><b>Claims in the past 5 years</b></th><td>{{$ho->c_i_p_5_y}}</td></tr>
              <tr><th scope="row"><b>if yes, how many</b></th><td>{{$ho->how_many}}</td></tr>
              <tr><th scope="row"><b>amount_per_clain</b></th><td>{{$ho->amount_per_clain}}</td></tr>
              <tr><th scope="row"><b>Operations</b></th><td>{{$ho->operations}}</td></tr>
              <tr><th scope="row"><b>Terminated / Rejected</b></th><td>{{$ho->terminated}}</td></tr>
              <tr><th scope="row"><b>flat roof</b></th><td>{{$ho->flat_roof}}</td></tr>
              <tr><th scope="row"><b>Building</b></th><td>{{$ho->building}}</td></tr>
              <tr><th scope="row"><b>Type of building</b></th><td>{{$ho->type_of_building}}</td></tr>
              <tr><th>Cover</th></tr>
              <tr><th scope="row"><b>Fire / elementary damage</b></th><td>{{$ho->f_o_e_d}}</td></tr>
              <tr><th scope="row"><b>Deductible</b></th><td>{{$ho->f_o_e_d_deduetible}}</td></tr>
              <tr><th scope="row"><b>Theft abroad</b></th><td>{{$ho->theft_abroad}}</td></tr>
              <tr><th scope="row"><b>Deductible</b></th><td>{{$ho->theft_deduetible}}</td></tr>
              <tr><th></th><td></td></tr>
              <tr><th scope="row"><b>Water</b></th><td>{{$ho->water}}</td></tr>
              <tr><th scope="row"><b>Buidliung</b></th><td>{{$ho->buidliung}}</td></tr>
              <tr><th></th><td></td></tr>
              <tr><th scope="row"><b>Luggage</b></th><td>{{$ho->luggage}}</td></tr>
              <tr><th scope="row"><b>Luggage Total</b></th><td>{{$ho->luggage_total}}</td></tr>
            </tbody>
        </table>

    </div>

    <div class="col-4">

        <table class="table">
            <tbody>
                <tr><th scope="row"><b>Surename</b></th><td>{{$ho->surename}}</td></tr>
                <tr><th scope="row"><b>Post Code</b></th><td>{{$ho->post_code}}</td></tr>
                <tr><th scope="row"><b>Residence</b></th><td>{{$ho->residence}}</td></tr>
                <tr><th scope="row"><b>Phone Number</b></th><td>{{$ho->phone}}</td></tr>
                <tr><th scope="row"><b>First Name</b></th><td>{{$ho->f_name}}</td></tr>
                <tr><th></th><td></td></tr>
        </tbody>
          </table>

        </div>



    <div class="col-4">
    <div class="card" style="height:100%;">
       <iframe src="{{asset('public/pdfs/uploads')}}/{{$ho->home_file}}"  style="height:100%;" frameborder="0"></iframe>
    </div>
    </div>
    </div>
</div>
<div class="card-footer">





    <form action="{{route('mail.home')}}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="cyber_schutz" value="{{$ho->cyber_schutz}}">
        <input type="hidden" name="salutation" value="{{$ho->salutation}}">
        <input type="hidden" name="f_name" value="{{$ho->f_name}}">
        <input type="hidden" name="l_name" value="{{$ho->l_name}}">
        <input type="hidden" name="surename" value="{{$ho->surename}}">
        <input type="hidden" name="street" value="{{$ho->street}}">
        <input type="hidden" name="post_code" value="{{$ho->post_code}}">
        <input type="hidden" name="nationality" value="{{$ho->nationality}}">
        <input type="hidden" name="date_of_birth" value="{{$ho->date_of_birth}}">
        <input type="hidden" name="residence" value="{{$ho->residence}}">
        <input type="hidden" name="phone" value="{{$ho->phone}}">

        <input type="hidden" name="c_i_p_5_y" value="{{$ho->c_i_p_5_y}}">
        <input type="hidden" name="how_many" value="{{$ho->how_many}}">
        <input type="hidden" name="amount_per_clain" value="{{$ho->amount_per_clain}}">
        <input type="hidden" name="operations" value="{{$ho->operations}}">
        <input type="hidden" name="terminated" value="{{$ho->terminated}}">
        <input type="hidden" name="flat_roof" value="{{$ho->flat_roof}}">
        <input type="hidden" name="building" value="{{$ho->building}}">
        <input type="hidden" name="type_of_building" value="{{$ho->type_of_building}}">
        <input type="hidden" name="address_from_the_object" value="{{$ho->address_from_the_object}}">
        <input type="hidden" name="rooms" value="{{$ho->rooms}}">
        <input type="hidden" name="persons" value="{{$ho->persons}}">
        <input type="hidden" name="sam_insured" value="{{$ho->sam_insured}}">
        <input type="hidden" name="f_o_e_d" value="{{$ho->f_o_e_d}}">
        <input type="hidden" name="f_o_e_d_deduetible" value="{{$ho->f_o_e_d_deduetible}}">
        <input type="hidden" name="theft_abroad" value="{{$ho->theft_abroad}}">
        <input type="hidden" name="theft_deduetible" value="{{$ho->theft_deduetible}}">
        <input type="hidden" name="electro" value="{{$ho->electro}}">
        <input type="hidden" name="electro_total" value="{{$ho->electro_total}}">
        <input type="hidden" name="electro_deduetible" value="{{$ho->electro_deduetible}}">
        <input type="hidden" name="water" value="{{$ho->water}}">
        <input type="hidden" name="buidliung" value="{{$ho->buidliung}}">
        <input type="hidden" name="luggage" value="{{$ho->luggage}}">
        <input type="hidden" name="luggage_total" value="{{$ho->luggage_total}}">
        <input type="hidden" name="glass" value="{{$ho->glass}}">
        <input type="hidden" name="cyber_schutz" value="{{$ho->cyber_schutz}}">
        <input type="hidden" name="personal_liability" value="{{$ho->personal_liability}}">
        <input type="hidden" name="personal_liability_total" value="{{$ho->personal_liability_total}}">
        <input type="hidden" name="personal_liability_deductible" value="{{$ho->personal_liability_deductible}}">
        <input type="hidden" name="other_insurance" value="{{$ho->other_insurance}}">
        <input type="hidden" name="comments" value="{{$ho->comments}}">

        <input type="hidden" name="insurance_email" value="{{$ho->insurance_email}}">
        <input type="hidden" name="insurance_email_b" value="{{$ho->insurance_email_b}}">
        <input type="hidden" name="insurance_email_c" value="{{$ho->insurance_email_c}}">

        @endforeach
        <button type="submit" class="btn btn-outline-success">Send Mail</button>
</div>
</form>
</div>
<!-- </div> -->
@endsection
