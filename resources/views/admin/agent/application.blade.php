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
    <div class="col-8">
    @include('admin.agent.menup')
    <div class="card">
        <div class="card-body">
            <table class="table" id="table">
                <thead>
                  <tr>

    <form action="{{ route('admin.select') }}" method="POST">
    @csrf
        <th scope="col">ID <button type="submit">S</button></th>
        <th scope="col">Kunden</th>
        <th scope="col">Art der Versicherung</th>
        <th scope="col">Gesellschaft</th>
        {{-- <th scope="col">Start</th>
        <th scope="col">Ende</th> --}}
        <th scope="col">Comission</th>
        <th scope="col">Status</th>
        {{-- <th scope="col">Action</th> --}}
    </tr>
    </thead>

                <tbody>

                    @foreach ($apps as $in)
                    @if ($in->status=='Annahme')

    <tr>


        <td>
            <input type="checkbox" name="app_id" value="{{$in->id}}"> {{$in->id}}
        </td>
    </form>

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
                    <td>{{$in->commission}}</td>
                    <td>
                        <form method="post" action="{{route('admin.update', $in->id)}}">
                            @csrf

                            <div class="input-group">
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
                                 <option value="Storniert">Storniert</option>
                                 <option value="Abgelehnt">Abgelehnt</option>
                              </select>
                             <button class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" type="submit">Update</button>
                           </div>
                         </form>
                    </td>

                    {{-- <td>
                        <form action="{{ route('application.delete.app', $in->id) }}" method="post">
                            @method('post')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return myFunction();"><i class="fa fa-trash"></i></button>
                        </form>
                    </td> --}}
                </tr>

                @endif
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
