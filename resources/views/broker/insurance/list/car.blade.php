@extends('broker.insurance.form')
@section('insurance')


    <table class="table" id="table">
        <thead>
          <tr>
            <th scope="col">SL</th>
            <th scope="col">Vorname</th>
            <th scope="col">Nachname</th>
            <th scope="col">Geburtstag</th>
            <th scope="col">Marke</th>
            <th scope="col">Model</th>
            <th scope="col">Status</th>
            <th scope="col">Senden</th>

          </tr>
        </thead>
        @php
            $car = App\CarInsurance::where('user_id', auth()->id())->orderBy('id', 'DESC')->get();
        @endphp
        <tbody>
        @foreach($car as $value)
        @php
        $status = App\InMail::where('insurance_number', $value->insurance_number)->get();
        @endphp
          <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->f_name}}</td>
            <td>{{$value->l_name}}</td>

            <td>{{ date('d.m.Y', strtotime($value->date_of_birth))}}</td>
            <td>{{$value->vehicle_brand}}</td>
            <td>{{$value->vehicle_model}}</td>
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
                {{-- <a href="{{route('mail.car', $value->insurance_number)}}"  class="btn btn-outline-danger"> Send </a> --}}
                <form action="{{route('mail.cars')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="insurance_number" value="{{$value->insurance_number}}">
                    <input type="hidden" name="salutation" value="{{$value->salutation}}">
                    <input type="hidden" name="insurance_type" value="{{$value->insurance_type}}">
                    <input type="hidden" name="f_name" value="{{$value->f_name}}">
                    <input type="hidden" name="l_name" value="{{$value->l_name}}">
                    <input type="hidden" name="surename" value="{{$value->surename}}">
                    <input type="hidden" name="street" value="{{$value->street}}">
                    <input type="hidden" name="post_code" value="{{$value->post_code}}">
                    <input type="hidden" name="nationality" value="{{$value->nationality}}">
                    <input type="hidden" name="date_of_birth" value="{{$value->date_of_birth}}">
                    <input type="hidden" name="examination_since" value="{{$value->examination_since}}">
                    <input type="hidden" name="phone_number" value="{{$value->phone_number}}">
                    <input type="hidden" name="e_s_i_5_y_a" value="{{$value->e_s_i_5_y_a}}">
                    <input type="hidden" name="how_many" value="{{$value->how_many}}">
                    <input type="hidden" name="how_long" value="{{$value->how_long}}">
                    <input type="hidden" name="driver_under_26" value="{{$value->driver_under_26}}">
                    <input type="hidden" name="leasing" value="{{$value->leasing}}">
                    <input type="hidden" name="residence" value="{{$value->residence}}">

                    <input type="hidden" name="vehicle_brand" value="{{$value->vehicle_brand}}">
                    <input type="hidden" name="vehicle_model" value="{{$value->vehicle_model}}">
                    <input type="hidden" name="vehicle_certificate_type" value="{{$value->vehicle_certificate_type}}">
                    <input type="hidden" name="vehicle_master_number" value="{{$value->vehicle_master_number}}">
                    <input type="hidden" name="vehicle_date_in_traffic" value="{{$value->vehicle_date_in_traffic}}">
                    <input type="hidden" name="vehicle_catalog_price" value="{{$value->vehicle_catalog_price}}">
                    <input type="hidden" name="vehicle_equipment_price" value="{{$value->vehicle_equipment_price}}">
     
                    <input type="hidden" name="how_many_damages_1" value="{{$value->how_many_damages_1}}">
                    <input type="hidden" name="how_many_damages_2" value="{{$value->how_many_damages_2}}">
                    <input type="hidden" name="how_many_damages_3" value="{{$value->how_many_damages_3}}">
                    <input type="hidden" name="date" value="{{$value->date}}">
                    <input type="hidden" name="Zahlweise" value="{{$value->Zahlweise}}">
                    <input type="hidden" name="Kontrollschild" value="{{$value->Kontrollschild}}">
                    <input type="hidden" name="Km_Jahr" value="{{$value->Km_Jahr}}">
                    <input type="hidden" name="Pannenhilfe" value="{{$value->Zahlweise}}">
                    
                    <input type="hidden" name="insurance_liability" value="{{$value->insurance_liability}}">
                    <input type="hidden" name="insurance_fully_compenensive" value="{{$value->insurance_fully_compenensive}}">
                    <input type="hidden" name="insurance_deductible" value="{{$value->insurance_deductible}}">
                    <input type="hidden" name="partially_comprehensive" value="{{$value->partially_comprehensive}}">
                    <input type="hidden" name="partially_deductible" value="{{$value->partially_deductible}}">

                    <input type="hidden" name="insurance_parkschaden" value="{{$value->insurance_parkschaden}}">
                    <input type="hidden" name="parkschaden_deductible" value="{{$value->parkschaden_deductible}}">
                    <input type="hidden" name="insurance_item_carried" value="{{$value->insurance_item_carried}}">
                    <input type="hidden" name="insurance_current_value" value="{{$value->insurance_current_value}}">
                    <input type="hidden" name="insurance_headlights" value="{{$value->insurance_headlights}}">
                    <input type="hidden" name="insurance_bonus_protection" value="{{$value->insurance_bonus_protection}}">
                    <input type="hidden" name="insurance_email" value="{{$value->insurance_email}}">
                    <input type="hidden" name="insurance_email_b" value="{{$value->insurance_email_b}}">
                    <input type="hidden" name="insurance_email_c" value="{{$value->insurance_email_c}}">
                    <input type="hidden" name="insurance_comments" value="{{$value->insurance_comments}}">


                <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Senden</button>

            </form>
            </td>
          </tr>
        @endforeach

        </tbody>
      </table>

@endsection
@section('footer_js')
    <script>
        $(document).ready(function() {
    $('#table').DataTable();
} );
    </script>
@endsection
