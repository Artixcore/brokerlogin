@extends('admin.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
<div class="container">

            <h1 class="h3 mb-3"><strong>Lead</strong><a href="{{route('admin.leadmail')}}" style="text-decoration: none;"> <small>New Leads
                 <span>(0)</span>
            </small> </a></h1>

            <div class="row">
                <div class="col-12">
                            <div class="card">
                            <div class="card-header">
                            <button type="button" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" data-bs-toggle="modal" data-bs-target="#lead">
                                New Lead
                            </button>

                            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#import">Import</button>
                            </div>
                            <div class="card-body">
                            <table class="table table-hover my-0" id="table">
                                <thead>
                                    <tr>
                                        <th class="d-none d-xl-table-cell">Vorname</th>
                                        <th class="d-none d-xl-table-cell">Nachname</th>
                                        <th class="d-none d-xl-table-cell">PLZ</th>
                                        <th class="d-none d-xl-table-cell">Ort</th>
                                        <th class="d-none d-xl-table-cell">Persons</th>
                                        <th class="d-none d-xl-table-cell">Aktuelle Versicherung</th>
                                        <th class="d-none d-xl-table-cell">Phone</th>
                                        <th class="d-none d-xl-table-cell">Berater</th>
                                        <th class="d-none d-xl-table-cell">Visit</th>

                                        <th class="d-none d-xl-table-cell">Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach (App\Lead::all() as $item)
                                    <tr>
                                        <td>{{$item->f_name}}</td>
                                        <td>{{$item->l_name}}</td>
                                        <td>{{$item->zip}}</td>
                                        <td>{{$item->place}}</td>
                                        <td>{{$item->number_of_person}}</td>
                                        <td>{{$item->current_insurance}}</td>
                                        <td>{{$item->phone}}</td>
                                        @php
                                        $agent = App\User::where('id', $item->user_id)->get();
                                        @endphp
                                        <td>
                                            @foreach ($agent as $it)

                                            {{$it->name}}
                                            @endforeach
                                        </td>
                                        <td class="d-none d-md-table-cell">
                                        @if($item->lead_number)
                                            <a href="{{route('admin.lead.view', $item->lead_number)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Öffnen </a>
                                        @else
                                        No Lead Number
                                        @endif
                                        </td>

                                        <td>
                                            <form action="{{ route('admin.delete.lead', $item->id)}}" method="post">
                                                @method('post')
                                                @csrf
                                                <h5 class="text-center">Bist Du sicher?</h5>
                                            <button type="submit" onclick="return myFunction();" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>






<!-- Import -->
<div class="modal fade" id="import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Lead</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.lead.import')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
        <input type="file" name="file" class="form-control-file">
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Upload</button>
        </div>
        </form>
      </div>
    </div>
  </div>



<!-- Modal -->
<div class="modal fade" id="lead" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Lead</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.savelead')}}" method="POST">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <select name="lead_status" class="form-control">
                    <option selected>Select Status</option>

                    <option value="New">New</option>

                </select>
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="f_name" placeholder="First Name" required>
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="l_name" placeholder="Last Name" required>
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="street" placeholder="Street" required>
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="zip" placeholder="ZIP" required>
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="place" placeholder="Place" required>
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="phone" placeholder="Phone" required>
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="email" placeholder="Email" required>
            </div>

            <div class="mb-3">
            <input type="date" class="form-control" name="date_of_birth" required>
            </div>
            @php
                $agents = App\User::where('urole', 'author')->get();
            @endphp
            <div class="mb-3">
            <select name="agent_name" class="form-control" required>
                <option selected>Select Agent</option>
                @foreach ($agents as $agent)
                <option value="{{$agent->name}}">{{$agent->name}}</option>
                @endforeach
            </select>
            </div>

            <div class="mb-3">
            <select name="current_insurance" class="form-control" required>
                <option selected>Select Current Insurance</option>
                @foreach (App\Insurance_Type::all() as $in)
                <option value="{{$in->name}}">{!! $in->icon !!} {{$in->name}}</option>
                @endforeach
            </select>
            </div>

            <div class="mb-3">
            <select name="number_of_person" class="form-control" required>
                <option selected>Select Number of person</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            </div>

            <div class="mb-3">
                <textarea name="lead_note" class="form-control" placeholder="Lead Note" required></textarea>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Speichern Lead</button>
        </div>
       </form>
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
