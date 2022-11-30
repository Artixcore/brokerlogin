@extends('admin.insurance.form')
@section('insurance')

<table class="table" id="table">
    <thead>
      <tr>
        <th scope="col">SL</th>
        <th scope="col">Vorname</th>
        <th scope="col">Nachname</th>
        <th scope="col">Geburtstag</th>
        <th scope="col">Nationalität</th>
        <th scope="col">Öffnen</th>
        <th scope="col">Status</th>
        <th scope="col">Senden</th>
      </tr>
    </thead>
    @php
        $car = App\HomeInsurance::where('user_id', auth()->id())->get();
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
        <td>{{date('d.m.Y', strtotime($value->date_of_birth))}}</td>
        <td>{{$value->nationality}}</td>
        <td><a href="{{route('admin.view.insurance.home', $value->insurance_number)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3"> Öffnen  </a></td>
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
            {{-- <a href="{{route('mail.homes',$value->insurance_number)}}" class="btn btn-outline-danger" type="submit">Send</a> --}}
            <form action="{{route('mail.home')}}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="insurance_number" value="{{$value->insurance_number}}">
                <input type="hidden" name="cyber_schutz" value="{{$value->cyber_schutz}}">
                <input type="hidden" name="salutation" value="{{$value->salutation}}">
                <input type="hidden" name="f_name" value="{{$value->f_name}}">
                <input type="hidden" name="l_name" value="{{$value->l_name}}">
                <input type="hidden" name="surename" value="{{$value->surename}}">
                <input type="hidden" name="street" value="{{$value->street}}">
                <input type="hidden" name="post_code" value="{{$value->post_code}}">
                <input type="hidden" name="nationality" value="{{$value->nationality}}">
                <input type="hidden" name="date_of_birth" value="{{$value->date_of_birth}}">
                <input type="hidden" name="residence" value="{{$value->residence}}">
                <input type="hidden" name="phone" value="{{$value->phone}}">

                <input type="hidden" name="c_i_p_5_y" value="{{$value->c_i_p_5_y}}">
                <input type="hidden" name="how_many" value="{{$value->how_many}}">
                <input type="hidden" name="amount_per_clain" value="{{$value->amount_per_clain}}">
                <input type="hidden" name="operations" value="{{$value->operations}}">
                <input type="hidden" name="terminated" value="{{$value->terminated}}">
                <input type="hidden" name="flat_roof" value="{{$value->flat_roof}}">
                <input type="hidden" name="building" value="{{$value->building}}">
                <input type="hidden" name="type_of_building" value="{{$value->type_of_building}}">
                <input type="hidden" name="address_from_the_object" value="{{$value->address_from_the_object}}">
                <input type="hidden" name="rooms" value="{{$value->rooms}}">
                <input type="hidden" name="persons" value="{{$value->persons}}">
                <input type="hidden" name="sam_insured" value="{{$value->sam_insured}}">
                <input type="hidden" name="f_o_e_d" value="{{$value->f_o_e_d}}">
                <input type="hidden" name="f_o_e_d_deduetible" value="{{$value->f_o_e_d_deduetible}}">
                <input type="hidden" name="theft_abroad" value="{{$value->theft_abroad}}">
                <input type="hidden" name="theft_deduetible" value="{{$value->theft_deduetible}}">
                <input type="hidden" name="electro" value="{{$value->electro}}">
                <input type="hidden" name="electro_total" value="{{$value->electro_total}}">
                <input type="hidden" name="electro_deduetible" value="{{$value->electro_deduetible}}">
                <input type="hidden" name="water" value="{{$value->water}}">
                <input type="hidden" name="buidliung" value="{{$value->buidliung}}">
                <input type="hidden" name="luggage" value="{{$value->luggage}}">
                <input type="hidden" name="luggage_total" value="{{$value->luggage_total}}">
                <input type="hidden" name="glass" value="{{$value->glass}}">
                <input type="hidden" name="cyber_schutz" value="{{$value->cyber_schutz}}">
                <input type="hidden" name="personal_liability" value="{{$value->personal_liability}}">
                <input type="hidden" name="personal_liability_total" value="{{$value->personal_liability_total}}">
                <input type="hidden" name="personal_liability_deductible" value="{{$value->personal_liability_deductible}}">
                <input type="hidden" name="other_insurance" value="{{$value->other_insurance}}">
                <input type="hidden" name="comments" value="{{$value->comments}}">


                <input type="hidden" name="building_water" value="{{$value->building_water}}">
                <input type="hidden" name="building_glass" value="{{$value->building_glass}}">
                <input type="hidden" name="floor_heating" value="{{$value->floor_heating}}">
                <input type="hidden" name="hydrant" value="{{$value->hydrant}}">
                <input type="hidden" name="bauart" value="{{$value->bauart}}">
                <input type="hidden" name="valuables" value="{{$value->valuables}}">

                <input type="hidden" name="insurance_email" value="{{$value->insurance_email}}">
                <input type="hidden" name="insurance_email_b" value="{{$value->insurance_email_b}}">
                <input type="hidden" name="insurance_email_c" value="{{$value->insurance_email_c}}">


                <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Senden</button>

        </form>
        </td>
        <td>
            <form action="{{ route('admin.insurance.home.delete', $value->id) }}" method="post">
                @method('post')
                @csrf
                <button onclick="return myFunction();" class="btn btn-outline-danger"  type="submit"> <i class="fas fa-trash-alt"></i> </button>
            </form>
        </td>
      </tr>
    @endforeach

    </tbody>
  </table>


  <div class="modal fade" id="smallModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @foreach($car as $value)
            <form action="{{ route('admin.insurance.home.delete', $value->id) }}" method="post">
                @endforeach
                @method('post')
                @csrf
                <h5 class="text-center">Are you sure you want to delete?</h5>

            </div>
            <div class="modal-footer">
                <input class="btn btn-outline-danger" type="submit" value="Delete"/>
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
    $('#table').DataTable();
} );
    </script>


<script>
    // display a modal (small modal)
    $(document).on('click', '#smallButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href
            , beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            }
            , complete: function() {
                $('#loader').hide();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            }
            , timeout: 8000
        })
    });

</script>
@endsection

