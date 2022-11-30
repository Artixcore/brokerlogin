@extends('admin.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
{{-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> --}}

@endsection
@section('content')

            <h1 class="h3 mb-3"><strong>Berater</strong></h1>



            <div class="row">
                <div class="col-12">
                            <div class="card">
                            <div class="card-header">
                            <button type="button" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" data-bs-toggle="modal" data-bs-target="#agent">
                                Neuer Berater
                            </button>

                            {{-- <button type="button" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" data-bs-toggle="modal" data-bs-target="#Oexpanse">
                                Other expanse
                            </button> --}}

                            <a href="{{ route('admin.taxes') }}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">
                                Sozialversicherungen
                            </a>

                            <button class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Annahme zu Provisioniert
                            </button>
                            </div>
                            <div class="card-body">
                            <table class="table table-hover my-0" id="table">
                                <thead>
                                    <tr>

                                        <th class="d-none d-xl-table-cell">Name</th>
                                        <th class="d-none d-xl-table-cell">Email</th>
                                        <th class="d-none d-xl-table-cell">Geschlecht</th>
                                        <th class="d-none d-xl-table-cell">Tel</th>
                                        <th class="d-none d-xl-table-cell">Status</th>
                                        <th class="d-none d-xl-table-cell">Aktiv</th>
                                        <th class="d-none d-xl-table-cell">Rolle</th>
                                        <th class="d-none d-xl-table-cell">Bearbeiten</th>
                                        <th class="d-none d-xl-table-cell">Öffnen</th>

                                    </tr>
                                </thead>
                                @php
                                    // $agent = App\User::all();
                                    $agent = App\User::where('urole', 'author')->get();
                                @endphp
                                <tbody>
                                @foreach ($agent as $item)

                                    <tr>


                                        <td>{{$item->name}}</td>

                                        <td>{{$item->email}}</td>
                                        <td>{{$item->gender}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>
                                            @if(Cache::has('is_online' . $item->id))
                                                <span class="text-success">Online</span>
                                            @else
                                                <span class="text-secondary">Offline</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->last_seen)->diffForHumans() }}</td>
                                        <td>
                                            @if($item->urole=='admin')
                                                Admin
                                            @else
                                               Broker
                                            @endif
                                        </td>
                                        <td class="d-none d-md-table-cell"><a href="{{route('admin.users.edit', $item->id)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3"><i class="fas fa-user-edit"></i></a></td>
                                        <td class="d-none d-md-table-cell"><a href="{{route('admin.name', $item->name)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Öffnen</a></td>

                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


<!-- Modal -->
<div class="modal fade" id="agent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">neuer Maklerr</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.post')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">

            <div class="mb-3">
                <input type="file" class="form-control" name="avatar" required>
                </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="name" placeholder="Userame" required>
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="f_name" placeholder="First Name" required>
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="l_name" placeholder="Last Name" required>
            </div>

            <div class="mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>

            <div class="mb-3">
                <input type="phone" class="form-control" name="phone" placeholder="Phone" required>
            </div>

            <div class="mb-3">
                <input type="date" class="form-control" name="age" placeholder="Age" required>
            </div>

            <div class="mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>

            <div class="mb-3">
                <select name="gender" class="form-control" required>
                    <option selected>neuer Makler.</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
                </div>

            <div class="mb-3">
            <select name="urole" class="form-control">
                <option selected value="author">Author</option>
            </select>
            </div>

            <div class="mb-3">
                <input type="date" class="form-control" name="beginning" required>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">speichern</button>
        </div>
       </form>
      </div>
    </div>
  </div>





  <!-- Modal -->
<div class="modal fade" id="Oexpanse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Other Expanse</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Expanse</th>
                                    <th scope="col">Amount (%)</th>
                                    <th scope="col">Ref.</th>
                                    <th scope="col">Delete</th>
                                  </tr>
                                </thead>
                                @php
                                    $Oepan = App\OExpanse::all();
                                @endphp
                                <tbody>
                                @foreach ($Oepan as $opn)
                                <tr>
                                    <th scope="row">{{ $opn->id }}</th>
                                    <td>{{ $opn->eo_name }}</td>
                                    <td>{{ $opn->eo_amount }}</td>
                                    <td>{{ $opn->eo_ref }}</td>
                                    <td>
                                        <form action="{{ route('admin.agent.del.oexpa', $opn->id)}}" method="post">
                                            @method('post')
                                            @csrf
                                            <button onclick="return myFunction();" type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            Add Expanse in %
                        </div>
                        <div class="card-body">
                        <form action="{{ route('admin.agent.oexpanse') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" placeholder="Expanse Name" name="eo_name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="text" placeholder="Amount" name="eo_amount" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="text" placeholder="Referance" name="eo_ref" class="form-control">
                            </div>
                            <div class="mb-3">
                                <textarea type="text" placeholder="Details" name="eo_details" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" style="float: right;" class="btn btn-outline-success">Save</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update All Anname</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @php
            $info = App\Application::where('status', 'Annahme')->get();
            @endphp
            @foreach ($info as $inn)
            <form method="post" action="{{route('admin.update', $inn->id)}}">

                {{-- @if ($item->status=='Annahme') --}}
                @csrf
                <div class="mb-3">
                    <input type="text" name="status" value="Provisioniert"> {{ $item->status }}
                </div>
                {{-- @endif --}}

                @endforeach
                <button class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" type="submit">Update</button>

            </form>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal -->
<div class="modal fade" id="docs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Applicaiton</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
<form action="" method="post" enctype="multipart/form-data">
@csrf
    <div class="modal-body">
        <div class="mb-3">
            <textarea name="" class="ckeditor form-control"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
      </div>
    </div>
  </div>
@endsection
@section('footer_js')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
    <script>
        $(document).ready(function() {
    $('#table').DataTable();
} );
    </script>

     <script>
         $(function(e){
              $("#checkAll").click(function(){
               $(".CheckBoxClass").prop('checked', $(this).prop('checked'));
              });
         });

        $('#updateAll').click(function(e){
               e.preventDefault();
               var allids = [];
            $("input:checkbox[name=ids]:checked").each(function(){
               allids.push($(this).val());
            });
        });

        $.ajex({
               url:"{{route('admin.updateJerk.apps')}}",
               type:'UPDATE',
               data:{
                   ids:allids,
                   _token:$("input[name=_token]").val()},
                   success:function(response){
                       $.each(allids, function(key,val){
                           $('#ids' +val).update();
                       });
                   }
               });
     </script>
@endsection
