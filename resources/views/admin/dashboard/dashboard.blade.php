@extends('admin.master')
@section('style_css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection
@section('content')
@php
    use App\User;
    use App\Customer;
    use App\AppDoc;
    use Carbon\Carbon;;
    use App\Application;
@endphp
            <h1 class="h3 mb-3 text-center"><b>Willkommen  &nbsp;{{Auth::user()->name}}</b></h1>
            <br/>
            <div class="row">
                <div class="col-xl-6 col-xxl-5 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card ca">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                 <h5 class="card-title" style="color:#ffffff;"> Fremdvertrag </h5>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3" style="color:#ffffff;">{{ App\Fremdvertrag::all()->count() }}</h1>
                                    </div>
                                </div>
                                <div class="card ca">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title" style="color:#ffffff;">Ausstehende Aufgabe</h5>
                                            </div>
                                        </div>
                                        @php
                                            $task = App\Task::where('task_status', 'Pending')->get();
                                        @endphp
                                        <h1 class="mt-1 mb-3" style="color:#ffffff;">{{ $task->count() }}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card ca">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title" style="color:#ffffff;">Alle Verträge</h5>
                                            </div>
                                        </div>
                                        @php
                                        $lead = App\Application::all();
                                        @endphp
                                    <h1 class="mt-1 mb-3" style="color:#ffffff;">
                                        {{ $lead->count() }}

                                    </h1>

                                    </div>
                                </div>
                                <div class="card ca">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title" style="color:#ffffff;">Gesamtkunden</h5>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3" style="color:#ffffff;">{{ App\Customer::all()->count() }}</h1>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-xxl-7">
                    <div class="card flex-fill w-100">

                        <div class="chart chart-sm">
                            <table class="table">
                                <tbody>
                                  <tr>
                                    <td>
                                    <h5 class="city text-uppercase mt-2"></h5>
                                    <p class="date mt-2 font-italic"></p>
                                    <div class="icon"></div>
                                    </td>
                                    <td>
                                        <p class="temperature font-weight-bold"></p>
                                        <p class="description font-weight-bold text-uppercase"></p>
                                        <p class="humidity mt-3"></p>
                                        <p class="wind"></p>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
                    <div class="card flex-fill w-100">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Daten</h5>
                        </div>
                        <div class="card-body">
                            <div class="align-self-center w-100">
                                @php
                                $agent = App\User::where('urole', 'author')->get();
                                @endphp
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td>Agents</td>

                                            <td class="text-end">
                                              {{ $agent->count() }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kunde</td>
                                            @php
                                            $agent = App\Customer::all();
                                            @endphp
                                            <td class="text-end">
                                              {{ $agent->count() }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-6 col-xxl-9 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Aufgabenliste <a href="{{route('admin.task')}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Öffnen</a></h5>
                        </div>
                        <div class="card-body">
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>

                                    <th class="d-none d-xl-table-cell">Aufgabentyp</th>
                                    <th class="d-none d-xl-table-cell">Datum</th>
                                    <th class="d-none d-xl-table-cell">Zeit</th>
                                    <th class="d-none d-xl-table-cell">Ort</th>
                                    <th class="d-none d-xl-table-cell">Notiz</th>
                                    <th class="d-none d-xl-table-cell">Agent</th>
                                </tr>
                            </thead>
                            @php
                            $task = App\Task::where('task_status', 'Pending')->get();
                            @endphp
                            <tbody>
                            @foreach ($task as $item)
                                <tr>
                                    <td>{{$item->type_of_task}}</td>
                                    <td>{{ date('d.m.Y', strtotime($item->task_date))}}</td>
                                    <td>{{$item->task_hour}}</td>
                                    <td>{{$item->task_place}}</td>
                                    <td>{{$item->task_note}}</td>
                                    <td>{{$item->task_note}}</td>
                                    @php
                                    $user = App\User::where('id', $item->user_id)->get();
                                    @endphp
                                    @foreach ($user as $u)
                                    {{ $u->name }}
                                    @endforeach
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>


                <div class="col-6 col-lg-6 col-xxl-9 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                        @php
                            $report = App\Fremdvertrag::where('end','<',Carbon::now()->addDays(280))->get();
                        @endphp
                            <h5 class="card-title mb-0">Ablaufende Fremdverträge</h5>
                        </div>
                        <div class="card-body">
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                     <th class="d-none d-xl-table-cell">Vorname</th>
                                    <th class="d-none d-xl-table-cell">Nachname</th>
                                    <th class="d-none d-xl-table-cell">Police-Nr</th>
                                    <th class="d-none d-xl-table-cell">Ablauf</th>
                                    <th class="d-none d-xl-table-cell">Öffnen </th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach ($report as $item)
                                <tr>
                                    <td>{{$item->customer_f_name}}</td>
                                    <td>{{$item->customer_l_name}}</td>
                                    <td>{{ $item->policy_no}}</td>
                                    <td>{{ date('d.m.Y', strtotime($item->end))}}</td>
                                    <td><a href="{{route('application.offer', $item->customer_number)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3"> Öffnen  </a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-12 col-lg-12 col-xxl-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">

                        <h5 class="card-title mb-0">Heute Geburtstagsliste</h5>
                        </div>
                        <div class="card-body">
                        <table class="table table-hover my-0">

                            <thead>
                                <tr>
                                    <th class="d-none d-xl-table-cell">Vorname</th>
                                    <th class="d-none d-xl-table-cell">Nachname</th>
                                    <th class="d-none d-xl-table-cell">Geburtsdatum</th>
                                    <th class="d-none d-xl-table-cell">Ort</th>
                                    <th class="d-none d-xl-table-cell">Telefon</th>
                                    <th class="d-none d-xl-table-cell">Email</th>
                                </tr>
                            </thead>
                            @php

                            $birthday = Customer::all();
                            @endphp
                            <tbody>

                            @foreach ($birthday as $item)

                            @if ($item->customer_date_of_birth == date('Y-m-d'))
                            <tr>
                                <td>{{$item->customer_f_name}}</td>
                                <td>{{$item->customer_l_name}}</td>
                                <td>{{ date('Y.m.d', strtotime($item->customer_date_of_birth))}}</td>
                                <td>{{$item->customer_place}}</td>
                                <td>{{$item->customer_phone}}</td>
                                <td>{{$item->customer_email}}</td>
                            </tr>



                            @endif
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>

                <div class="col-12 col-lg-12 col-xxl-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                        @php
                           $report = Application::where('end','<',Carbon::now()->addDays(280))->get();
                        @endphp
                            <h5 class="card-title mb-0">Ablaufende Verträge</h5>
                        </div>
                        <div class="card-body">
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th class="d-none d-xl-table-cell">Vorname</th>
                                    <th class="d-none d-xl-table-cell">Nachname</th>
                                    <th class="d-none d-xl-table-cell">Police-Nr</th>
                                    <th class="d-none d-xl-table-cell">Ablauf</th>
                                    <th class="d-none d-xl-table-cell">Öffnen </th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach ($report as $item)
                                <tr>
                                    <td>{{$item->customer_f_name}}</td>
                                    <td>{{$item->customer_l_name}}</td>
                                    <td>{{ $item->policy_no}}</td>
                                    <td>{{ date('d.m.Y', strtotime($item->end))}}</td>
                                    <td><a href="{{route('application.offer', $item->customer_number)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3"> Öffnen  </a></td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script>
    "use strict";

const getCity = document.querySelector('.city'),
      getDate = document.querySelector('.date'),
      getIcon = document.querySelector('.icon'),
      getTemperature = document.querySelector('.temperature'),
      getDescription = document.querySelector('.description'),
      getHumidity = document.querySelector('.humidity'),
      getWind = document.querySelector('.wind')

let   myDate = moment().format("MMMM D, YYYY hh:mm A"),
      lat,
      long

if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(position =>{
        lat = position.coords.latitude
        long = position.coords.longitude

        fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${long}&appid=1716b6af74413659aba4a82cfc1c92a4`)
        .then(response => {
            return response.json()
        })
        .then(data => {
            getCity.textContent = `${data.name}`
            getDate.textContent = `${myDate}`
            getIcon.innerHTML = `<img src="https://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png"/>`
            getTemperature.innerHTML = `${Math.floor(data.main.temp - 273.15)}&deg`
            getDescription.textContent = `${data.weather[0].main}`
            getHumidity.innerHTML = `Humidity: ${data.main.humidity}%`
            getWind.textContent = `Wind:${Math.floor(data.wind.speed * 3.6)}km/h`
        })
    })
}


</script>
@endsection
