@extends('admin.master')
@section('content')
<div class="container">
    <div class="row">
    @foreach ($agent as $user)
        {{-- Data --}}
    <div class="col-4">
    <div class="card">
        <div class="card-header">
            <a data-bs-toggle="modal" data-bs-target="#avatar" href=""><img src="{{asset('public/user')}}/{{$user->avatar}}" style="height: 100%; width:100%;" alt="{{$user->name}}"></a>
        </div>
    <div class="card-body">
        <form action="{{ route('admin.update_user', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
        <table class="table">
            <tbody>
            <tr>
                <th scope="row">Vorname</th><td scope="row">: <input type="text" value="{{$user->f_name}}" name="f_name"></td>
            </tr>
            <tr>
                <th scope="row">Nachname</th><td scope="row">: <input type="text" value="{{$user->l_name}}" name="l_name"></td>
            </tr>
            <tr>
                <th scope="row">Email</th><td scope="row">: <input type="text" value="{{$user->email}}" name="email"></td>
            </tr>
            <tr>
                <th scope="row">Tel</th><td scope="row">: <input type="text" value="{{$user->phone}}" name="phone"></td>
            </tr>
            <tr>
                <th scope="row">Geschlecht</th><td scope="row">: <input type="text" value="{{$user->gender}}" name="gender"></td>
            </tr>
            <tr>
                <th scope="row">Start</th><td scope="row">: <input type="date" value="{{$user->beginning}}" name="beginning"></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Speichern</button>
    </form>
    <a href="{{route('admin.agent')}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Zurück</a>
    </div>

    </div>
    </div>

    @php
    $docs = App\UserDoc::where('user_id', $user->id)->get();
    @endphp

    {{-- PDF --}}

    <div class="col-6">
        <div class="card-header"> <button class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" data-bs-toggle="modal" data-bs-target="#document" type="submit">Neues Dokument</button> </div>
        @foreach ($docs as $doc)
         <div class="card" style="height: 100%; width:100%;">
                 <a data-bs-toggle="modal" data-bs-target="#docx" href=""><iframe src="{{asset('public/pdfs/uploads')}}/{{$user->docs}}" style="height: 100%; width:100%;"></iframe></a>
         </div>
        @endforeach
    </div>

    </div>

    @endforeach
</div>




<!-- Modal -->
<div class="modal fade" id="docx" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Document</h5>
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
          <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Speichern</button>
        </div>
        </form>
      </div>
    </div>
  </div>




<!-- Avatar -->
<div class="modal fade" id="pdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Document</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        @foreach ($agent as $user)

        <form action="{{ route('admin.update_files', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">

            <div class="mb-3">
                <iframe src="{{asset('public/pdfs/uploads')}}/{{$user->docs}}" style="height: 100%; width:100%;"></iframe>
            </div>

            <div class="mb-3">
                <input type="file" name="docs" class="form-control-file">
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
       </form>

       @endforeach
      </div>
    </div>
  </div>


<!-- Avatar -->
<div class="modal fade" id="avatar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Foto aktualisieren</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        @foreach ($agent as $user)

        <form action="{{ route('admin.update_avatar', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">

            <div class="mb-3">
                <img src="{{asset('public/user')}}/{{$user->avatar}}" style="height: 150px; height:160px;" alt="">
            </div>

            <div class="mb-3">
                <input type="file" name="avatar" class="form-control-file">
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">aktualisieren</button>
        </div>
       </form>

       @endforeach
      </div>
    </div>
  </div>

@endsection
