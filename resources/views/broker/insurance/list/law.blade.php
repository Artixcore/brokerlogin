@extends('broker.insurance.form')
@section('insurance')


    <table class="table" id="table">
        <thead>
          <tr>
            <th scope="col">SL</th>
            <th scope="col">Vorname</th>
            <th scope="col">Nachname</th>
            <th scope="col">Geburtstag</th>
            <th scope="col">Nationalität</th>
            <!-- <th scope="col">Öffnen</th> -->
            <th scope="col">Status</th>
            <th scope="col">Senden </th>
          </tr>
        </thead>
        @php
            $law = App\Law::where('user_id', auth()->id())->get();
        @endphp
        <tbody>
        @foreach($law as $value)
        @php
        $status = App\LawMail::where('law_number', $value->law_number)->get();
        @endphp
          <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->f_name}}</td>
            <td>{{$value->l_name}}</td>

            <td>{{date('d.m.Y', strtotime($value->birthday))}}</td>
            <td>{{$value->nationality}}</td>
            <!-- <td><a href="{{route('broker.form.law.edit', $value->law_number)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3"> Öffnen </a></td> -->
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
              
                <form action="{{route('mail.laws')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="law_number" value="{{$value->law_number}}">
                    <input type="hidden" name="salutation" value="{{$value->salutation}}">
                    <input type="hidden" name="insurance_type" value="{{$value->insurance_type}}">
                    <input type="hidden" name="f_name" value="{{$value->f_name}}">
                    <input type="hidden" name="l_name" value="{{$value->l_name}}">
                    <input type="hidden" name="street" value="{{$value->street}}">
                    <input type="hidden" name="zip" value="{{$value->zip}}">
                    <input type="hidden" name="nationality" value="{{$value->nationality}}">
                    <input type="hidden" name="birthday" value="{{$value->birthday}}">
                    <input type="hidden" name="phone" value="{{$value->phone}}">

                    <input type="hidden" name="place" value="{{$value->place}}">
                    <input type="hidden" name="employment_relation" value="{{$value->employment_relation}}">
                    <input type="hidden" name="current_job" value="{{$value->current_job}}">
                    <input type="hidden" name="private" value="{{$value->private}}">
                    <input type="hidden" name="traffic" value="{{$value->traffic}}">
                    <input type="hidden" name="self_employ" value="{{$value->self_employ}}">
                    <input type="hidden" name="company" value="{{$value->company}}">
                    <input type="hidden" name="scope" value="{{$value->scope}}">
                    <input type="hidden" name="person" value="{{$value->person}}">

                    <input type="hidden" name="insurance_email" value="{{$value->insurance_email}}">
                    <input type="hidden" name="insurance_email_b" value="{{$value->insurance_email_b}}">
                    <input type="hidden" name="insurance_email_c" value="{{$value->insurance_email_c}}">
                    <input type="hidden" name="comments" value="{{$value->comments}}">


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
