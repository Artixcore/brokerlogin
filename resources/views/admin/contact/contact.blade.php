@extends('admin.master')
@section('style_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')

<div class="row">
{{-- <div class="col-12"> --}}
<div class="card">

    <div class="card-body">
        <input type="checkbox" name="id" id="checkAll">
        <input type="text" name="" id="">
        <button id="update" class="btn btn-outline-success" type="submit">Update</button>
        <table class="table" id="table">
            <thead>
            <tr>
                <th class="d-none d-xl-table-cell">

                </th>
                <th scope="col">ID</th>
                <th scope="col">Kunden</th>
                <th scope="col">Art der Versicherung</th>
                <th scope="col">Gesellschaft</th>
                {{-- <th scope="col">Start</th>
                <th scope="col">Ende</th> --}}
                <th scope="col">Police-Nr.</th>
                <th scope="col">Agent</th>
                {{-- <th scope="col">Kommentar</th> --}}
                <th scope="col">Status</th>
                <th scope="col">Provision</th>
                <th scope="col">Gesendet</th>
                <th scope="col">Action</th>
                <th scope="col">Del</th>
            </tr>
            </thead>
            @php
            $info = App\Application::orderBy('id', 'DESC')->get();
            @endphp
            <tbody>

@foreach ($info as $in)
@php
$status = App\AppMail::where('application_number', $in->application_number)->get();
@endphp
<tr>
    <td><input type="checkbox" value="{{$in->id}}" name="id" id="IDS" class="CheckBoxClass"></td>
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
                {{-- <td>{{date('d.m.Y', strtotime($in->start)) }}</td>
                <td>{{date('d.m.Y', strtotime($in->end))}}</td> --}}
                <td>{{$in->policy_no}}</td>

                <td>
                    @foreach ($agent as $item)
                    {{$item->name}}
                    @endforeach
                </td>
                {{-- <td>{{$in->app_comment}}</td> --}}
                <td>
                    <form method="post" action="{{route('admin.update', $in->id)}}">
                        @csrf

                        <div class="input-group mb-3">

                         <select class="form-select" name="status">
                             <option selected>

                               @if($in->status=='')
                               Select One
                               @else
                               {{ $in->status }}
                               @endif

                            </option>
                             <option value="Versendet">Versendet</option>
                             <option value="Provisioniert">Provisioniert</option>
                             <option value="Annahme">Annahme</option>
                             <option value="Storniert" style="color: red;">Storniert</option>
                             <option value="Abgelehnt">Abgelehnt</option>
                          </select>
                         <button class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" type="submit">Update</button>
                       </div>

                     </form>

                    {{-- @if($in->status=='Provisioniert')
                    <button class="btn btn-outline-success">
                        Provisioniert
                    </button>
                    @elseif($in->status=='Storniert')
                    <button class="btn btn-outline-success">
                        Storniert
                    </button>
                    @elseif($in->status=='Annahme')
                    <button class="btn btn-outline-success">
                        Annahme
                    </button>
                    @elseif($in->status=='Abgelehnt')
                    <button class="btn btn-outline-danger">
                        Abgelehnt
                    </button>
                    @else()
                    <button class="btn btn-outline-warning">
                        Versendet
                    </button>
                    @endif --}}
                    {{-- <form action="{{ route('admin.comission', $in->id) }}" method="POST">
                        @csrf

                            <div class="input-group mb-3">
                                <input type="text" name="commission" placeholder="Commission" value="{{ $in->commission }}" class="form-control">
                                <button class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" type="submit">Update</button>
                            </div>

                        </form> --}}
                </td>
                <td>
                    <form action="{{ route('admin.comission', $in->id) }}" method="POST">
                        @csrf

                            {{-- <td> --}}
                            {{-- <div class="input-group mb-3"> --}}
                                <input type="text" name="commission" placeholder="Commission" value="{{ $in->commission }}" class="form-control">
                                <button class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" type="submit">Update</button>
                            {{-- </div> --}}
                            {{-- </td> --}}
                        </form>
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
                    <a href="{{route('application.view', $in->application_number)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3"> Öffnen  </a>
                </td>
                <td>
                    <form action="{{ route('application.delete.app', $in->id) }}" method="post">
                        @method('post')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return myFunction();"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
@endforeach
            </tbody>
          </table>


    </div>

</div>
{{-- </div> --}}
</div>

@endsection
@section('footer_js')
    <script>
        $(document).ready(function() {
    $('#table').DataTable();
} );
    </script>
@endsection


