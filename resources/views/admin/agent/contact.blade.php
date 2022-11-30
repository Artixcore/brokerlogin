@extends('admin.master')
@section('content')
<div class="container">
    <div class="row">
    @foreach ($agent as $user)
        {{-- Data --}}
    <div class="col-4">
    <div class="card">
        <div class="card-header">
            <img src="{{asset('public/user')}}/{{$user->avatar}}" style="height: 100%; width:100%;" alt="">
        </div>
    <div class="card-body">
        <table class="table">
            <tbody>
            <tr>
                <th scope="row">Nutzername</th><td scope="row">: {{$user->name}}</td>
            </tr>
            <tr>
                <th scope="row">Vorname</th><td scope="row">: {{$user->f_name}}</td>
            </tr>
            <tr>
                <th scope="row">Nachname</th><td scope="row">: {{$user->l_name}}</td>
            </tr>
            <tr>
                <th scope="row">Email</th><td scope="row">: {{$user->email}}</td>
            </tr>
            <tr>
                <th scope="row">Telefon</th><td scope="row">: {{$user->phone}}</td>
            </tr>
            <tr>
                <th scope="row">Geschlecht</th><td scope="row">: {{$user->gender}}</td>
            </tr>
            <tr>
                <th scope="row">Start</th><td scope="row">: {{$user->beginning}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <a href="{{route('admin.update', $user->name)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" href="#"><i class="fas fa-edit"></i></a>
    </div>
    </div>
    </div>

    @php
        $docs = App\UserDoc::where('user_id', $user->id)->get();
    @endphp


<div class="col-8">
        @include('admin.agent.menup')

        <div class="card">

            <div class="card-body">
                <table class="table" id="table">
                    <thead>
                        <tr>
                        <th class="d-none d-xl-table-cell"><form action=""><input type="checkbox" name="" id="checkAll"> <button type="submit">S</button></form></th>
                        <th class="d-none d-xl-table-cell">ID</th>
                        <th class="d-none d-xl-table-cell">Vorname</th>
                        <th class="d-none d-xl-table-cell">Nachname</th>
                        <th class="d-none d-xl-table-cell">PLZ</th>
                        <th class="d-none d-xl-table-cell">Ort</th>
                        <th class="d-none d-xl-table-cell">Geburtstag</th>
                        {{-- <th class="d-none d-xl-table-cell">Berater</th> --}}
                        <th class="d-none d-xl-table-cell">Status</th>
                        <th class="d-none d-xl-table-cell">Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($customer as $item)
                    <td><input type="checkbox" name="" class="CheckBoxClass"></td>
                        <tr><a href="{{route('application.offer', $item->customer_number)}}" style="cursor: pointer;">
                            <td>{{$item->id}}</td>
                            <td>{{$item->customer_f_name}}</td>
                            <td>{{$item->customer_l_name}}</td>
                            <td>{{$item->customer_zip}}</td>
                            <td>{{$item->customer_place}}</td>
                            <td>{{date('d.m.Y', strtotime($item->customer_date_of_birth)) }}</td>
                                            <td>
                                <form method="post" action="{{route('admin.update', $item->id)}}">
                                    @csrf

                                    <div class="input-group">
                                     <select class="form-select" name="status">
                                         <option selected>
                                           @if($item->status=='')
                                           Select One
                                           @else
                                           {{ $item->status }}
                                           @endif
                                        </option>
                                         <option value="Versendet">Versendet</option>
                                         <option value="Provisioniert">Provisioniert</option>
                                         <option value="Annahme">Annahme</option>
                                         <option value="Storniert">Storniert</option>
                                         <option value="Abgelehnt">Abgelehnt</option>
                                      </select>
                                     <button class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" type="submit">Update</button>
                                   </div>
                                 </form>
                            </td>

                            <td class="d-none d-md-table-cell">
                                <form action="{{ route('admin.delete.customer', $item->id)}}" method="post">
                                    {{-- @endforeach --}}
                                        @method('post')
                                        @csrf
                                        <button onclick="return myFunction();" type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                            </td>
                        </a>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
     </div>
    </div>

    </div>
    @endforeach
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
