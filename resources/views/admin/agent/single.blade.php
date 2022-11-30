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

    @foreach ($docs as $doc)
     <div class="card" style="height: 100%; width:100%;">
             <iframe src="{{asset('public/pdfs/uploads')}}/{{$user->docs}}" style="height: 100%; width:100%;"></iframe>
     </div>
    @endforeach
    </div>

    </div>
    @endforeach
</div>




<!-- Modal -->
<div class="modal fade" id="document" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dokument hochladen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.userdoc')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="mb-3"><input type="file" name="document" class="form-control-file"></div>
          @foreach ($agent as $user)
          <input type="hidden" name="user_id" value="{{$user->id}}">
          <input type="hidden" name="name" value="{{$user->name}}">
          @endforeach
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">speichern</button>
        </div>
        </form>
      </div>
    </div>
  </div>




<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Neuer Broker</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        @foreach ($agent as $user)

        <form action="{{ route('admin.update_user', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">

            <div class="mb-3">
                <img src="{{asset('public/user')}}/{{$user->avatar}}" style="height: 150px; height:160px;" alt="">
            </div>

            <div class="mb-3">
            <input type="file" class="form-control" name="avatar">
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Nutzername">
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="f_name" value="{{$user->f_name}}" placeholder="Vorname">
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="l_name" value="{{$user->l_name}}" placeholder="Nachname">
            </div>

            <div class="mb-3">
            <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Email">
            </div>

            <div class="mb-3">
                <input type="phone" class="form-control" name="phone" value="{{$user->phone}}" placeholder="Telefon">
            </div>

            <div class="mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <div class="mb-3">
                <select name="gender" class="form-control">
                    <option selected>andere.</option>
                    <option value="Male">männlich</option>
                    <option value="Female">weiblich</option>
                    <option value="Other">andere</option>
                </select>
            </div>

            <div class="mb-3">
            <select name="urole" class="form-control">
                <option selected value="author">Author</option>
            </select>
            </div>

            <div class="mb-3">
                <input type="date" class="form-control" value="{{$user->beginning}}" name="beginning">
            </div>

            <div class="mb-3">
                <iframe src="{{asset('public/pdfs/uploads')}}/{{$user->docs}}" frameborder="0"></iframe>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Aktualisieren</button>
        </div>
       </form>

       @endforeach
      </div>
    </div>
  </div>

@endsection
