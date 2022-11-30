@extends('broker.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')

            <h1 class="h3 mb-3"><strong>Kunden</strong></h1>

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show alert-block">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="row">
                <div class="col-12">
                            <div class="card">
                            <div class="card-header">
                            <button type="button" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" data-bs-toggle="modal" data-bs-target="#customer">
                                Neuer Kunde
                            </button>

                            </div>
                            <div class="card-body">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                    <th class="d-none d-xl-table-cell">ID</th>
                                    <th class="d-none d-xl-table-cell">Vorname</th>
                                    <th class="d-none d-xl-table-cell">Nachname</th>
                           
                                    <th class="d-none d-xl-table-cell">PLZ</th>
                                    <th class="d-none d-xl-table-cell">Ort</th>
                                    <th class="d-none d-xl-table-cell">Geburtstag</th>
                                    <th class="d-none d-xl-table-cell">Berater</th>
                                    <th class="d-none d-xl-table-cell">Nachweis</th>
                                    <th class="d-none d-xl-table-cell">Öffnen</th>
                                    </tr>
                                </thead>
                                @php
                                    $customer = App\Customer::where('user_id', auth()->id())->orderBy('id', 'desc')->get();

                                @endphp
                                <tbody>
                                @foreach ($customer as $item)
                                @php
                                $php = App\User::where('id', $item->user_id)->get();
                                @endphp
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->customer_f_name}}</td>
                                        <td>{{$item->customer_l_name}}</td>
                                  
                                        <td>{{$item->customer_zip}}</td>
                                        <td>{{$item->customer_place}}</td>
                                        <td>{{ date('d.m.Y', strtotime($item->customer_date_of_birth))}}</td>
                                        <td>
                                            @foreach ($php as $it)
                                                {{ $it->name }}
                                            @endforeach
                                        </td>
                                        <td class="d-none d-md-table-cell"><a href="{{route('broker.nachweis', $item->customer_number)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Nachweis</a></td>
                                        <td class="d-none d-md-table-cell"><a href="{{route('broker.contact.view', $item->customer_number)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3"> Öffnen  </a></td>

                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


<!-- Modal -->
<div class="modal fade" id="customer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Neuer Kunde</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('broker.save')}}" method="POST">
            @csrf
        <div class="modal-body">
            <div class="mb-3">

            <input type="checkbox" class="btn-check" value="Herr." name="customer_type" id="btn-check" autocomplete="off"/>
            <label class="btn btn-outline-success" for="btn-check">Herr</label>

            <input type="checkbox" class="btn-check" value="Frau." name="customer_type" id="btn-check2" autocomplete="off"/>
            <label class="btn btn-outline-success" for="btn-check2">Frau</label>

            <input type="checkbox" class="btn-check" value="Firma" name="customer_type" id="btn-check3" autocomplete="off"/>
            <label class="btn btn-outline-success" for="btn-check3">Firma</label>

            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="customer_f_name" placeholder="Vorname" required>
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="customer_l_name" placeholder="Nachname" required>
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="customer_street" placeholder="Strasse" required>
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="customer_zip" placeholder="PLZ" required>
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="customer_place" placeholder="Ort" required>
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="customer_phone" placeholder="Tel" required>
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="customer_mobile" placeholder="Mobile" required>
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="customer_email" placeholder="Email" required>
            </div>

            <div class="mb-3">
            <input type="date" class="form-control" name="customer_date_of_birth" required>
            <input type="hidden" class="form-control" name="customer_agent" value="{{Auth::user()->name}}">
            </div>


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Speichern</button>
        </div>
       </form>
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
