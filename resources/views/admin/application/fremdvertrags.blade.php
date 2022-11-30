@extends('admin.master')
@section('style_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')

<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
    {{-- <a href="{{ route('application.fremdvertrag.page', $cus->customer_number) }}" class="btn btn-outline-success">fremdvertrag</a> --}}
</div>
    <div class="card-body">

        <table class="table" id="table">
            <thead>
              <tr>

                <th scope="col">ID</th>
                <th scope="col">Kunden</th>
                <th scope="col">Art der Versicherung</th>
                <th scope="col">Gesellschaft</th>
                <th scope="col">Start</th>
                <th scope="col">Ende</th>
                <th scope="col">Police-Nr.</th>
                <th scope="col">Agent</th>

                <th scope="col">Action</th>
            </tr>
            </thead>
            @php
            $for = App\Fremdvertrag::orderBy('id', 'DESC')->get();
            @endphp
            <tbody>

@foreach ($for as $in)
<tr>

    <td>{{$in->id}}</td>
    <td>{{$in->customer_f_name}} {{$in->customer_l_name}}</td>
    <td>{{$in->insurance_type}}</td>
    <td>
        @php
            $comp = App\InsuranceCompany::where('company_email', $in->insurance_email)->get();
            $agent = App\User::where('id', $in->user_id)->get();
        @endphp
                    @foreach ($comp as $co)
                    {{  $co->company_name  }}
                    @endforeach

                </td>
                <td>{{date('d.m.Y', strtotime($in->start)) }}</td>
                <td>{{date('d.m.Y', strtotime($in->end))}}</td>
                <td>{{$in->policy_no}}</td>

                <td>
                    @foreach ($agent as $item)
                    {{$item->name}}
                    @endforeach
                </td>

                <td>
                    {{-- <a href="{{route('application.offer', $in->customer_number)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3"> Öffnen  </a> --}}
                    <a href="{{route('application.fremdvertrag.edit', $in->con_number)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Öffnen </a>
                </td>

                <td>
                    {{-- <form action="{{ route('application.delete.app', $in->id) }}" method="post">
                        @method('post')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return myFunction();"><i class="fa fa-trash"></i></button>
                    </form> --}}
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
@endsection
