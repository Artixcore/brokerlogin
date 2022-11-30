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
        $spasen = App\Spesen::where('user_id', $user->id)->get();
    @endphp


<div class="col-8">
        @include('admin.agent.menup')

        <div class="card">
            <div class="card-header">
                <button class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" data-bs-toggle="modal" data-bs-target="#expance" type="submit">Add Fix Pay</button>
                @foreach ( $spasen as $item)
                <a class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Spesen : {{$item->amount}} </a>
                <form action="{{ route('admin.e_page.delete', $item->id)}}" method="post">
                    {{-- @endforeach --}}
                        @method('post')
                        @csrf
                        <button onclick="return myFunction();" type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                    </form>
                @endforeach

            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Ref</th>
                            <th scope="col">Action</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                @foreach ($exp as $ex)
                  <tr>
                    <td>{{ $ex->id }}</td>
                    <td>{{ $ex->e_name }}</td>
                    <td>{{ $ex->e_amount }}</td>
                    <td>{{ $ex->e_ref }}</td>
                    <td>
                        <a class="btn btn-outline-success" href="{{ route('admin.e_page_edit', $ex->user_id) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.delete_expanse', $ex->id)}}" method="post">
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

    </div>
    @endforeach
</div>




<!-- Modal -->
<div class="modal fade" id="expance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Fix Pay</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.expanse')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
        <div class="mb-3">
           <input type="text" name="e_name" placeholder="Expance Name" class="form-control" required>
        </div>
        <div class="mb-3">
            <input type="number" name="e_amount" placeholder="Expance Amount" class="form-control" required>
        </div>
        <div class="mb-3">
            <input type="text" name="e_ref" value="0" placeholder="Reference Number" class="form-control" required>
        </div>
        <div class="mb-3">
            <textarea type="text" name="e_details" placeholder="Details" class="form-control"></textarea>
        </div>
          @foreach ($agent as $user)
          <input type="hidden" name="user_id" value="{{$user->id}}">
          @endforeach
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">speichern</button>
        </div>
        </form>
        <p><br/></p>
        <p> Add Spasen </p>
        <form action="{{route('admin.spasen')}}" method="post" enctype="multipart/form-data">
            @csrf
            @foreach ($agent as $user)
            <div class="modal-body">
            <div class="mb-3">
               <input type="text" name="name" placeholder="Expance Name" class="form-control" value="Spasen" required>
            </div>
            <div class="mb-3">
                <input type="number" name="amount" placeholder="Expance Amount" class="form-control" value="0" required>
            </div>

              <input type="hidden" name="user_id" value="{{$user->id}}">
              @endforeach
            <div class="modal-footer">
              <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">speichern</button>
            </div>
            </form>
      </div>
    </div>
  </div>


@endsection
