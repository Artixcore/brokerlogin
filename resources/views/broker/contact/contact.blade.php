@extends('broker.master')
@section('style_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')

<div class="row">
<div class="col-12">
<div class="card">

    <div class="card-body">
        <table class="table" id="table">
            <thead>
              <tr>

                <th scope="col"></th>
                <th scope="col">Kunden</th>
                <th scope="col">Art der Versicherung</th>
                <th scope="col">Gesellschaft</th>

                <th scope="col">Start</th>
                <th scope="col">Ende</th>
                <th scope="col">Police-Nr.</th>
                <th scope="col">Kommentar</th>
                <th scope="col">Status</th>
                <th scope="col">Gesendet</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            @php
            // $info = App\Application::where('user_id', auth()->id())->orderby('created_at', 'desc')->get();
            $info = App\Application::where('user_id', auth()->id())->orderby('id', 'desc')->get();
            @endphp
            <tbody>
            @foreach ($info as $in)
            @php
            $status = App\AppMail::where('application_number', $in->application_number)->get();
            @endphp
            <tr>

                <td>{{$in->id}}</td>
                <td>{{$in->customer_f_name}} {{$in->customer_l_name}}</td>
                <td>
                    {{$in->insurance_type}}
                </td>
                <td>
                    @php
                    $comp = App\InsuranceCompany::where('company_email', $in->insurance_email)->get();
                    @endphp
                @foreach ($comp as $co)
                    {{  $co->company_name  }}
                @endforeach
                </td>

                <td>{{ date('d.m.Y', strtotime($in->start))}}</td>
                <td>{{ date('d.m.Y', strtotime($in->end))}}</td>
                <td>{{$in->policy_no}}</td>

                <td>{{$in->app_comment}}</td>

                <td>
                    @if($in->status=='Provisioniert')
                    <a href="#" class="btn btn-outline-success">
                      Provisioniert
                    </a>
                    @elseif($in->status=='Storniert')
                   <a href="#" class="btn btn-outline-danger">
                    Storniert
                   </a>
                   @elseif($in->status=='Annahme')
                   <a href="#" class="btn btn-outline-success">
                    Annahme
                   </a>
                   @elseif($in->status=='Abgelehnt')
                   <a href="#" class="btn btn-outline-danger">
                    Abgelehnt
                   </a>
                    @else()
                    <a href="#" class="btn btn-outline-warning">
                      Versendet
                    </a>
                    @endif
                </td>
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

                    <a href="{{route('broker.contact.app', $in->application_number)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3"> Öffnen  </a>
                </td>
            </tr>
            @endforeach
            </tbody>
          </table>
    </div>

</div>
</div>
</div>

@endsection
@section('footer_js')
    <script>
        $(document).ready(function() {
    $('#table').DataTable();
} );
    </script>
@endsection
