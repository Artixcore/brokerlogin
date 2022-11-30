@extends('broker.master')
@section('content')

<div class="container">
    @php

        $users = App\User::where('id', auth()->id())->get();

    @endphp
@foreach ($users as $user)

    <div class="row">
      <div class="col-3">
          <div class="card sha">
            <a href="#" data-bs-toggle="modal" data-bs-target="#avatar"><img src="{{asset('public/user')}}/{{$user->avatar}}" class="card-img-top" alt="{{ $user->name }}"></a>

                <ul class="list-group">
                    <li class="list-group-item">{{ $user->name }}</li>
                    <li class="list-group-item">{{ $user->f_name }}</li>
                    <li class="list-group-item">{{ $user->l_name }}</li>
                    <li class="list-group-item">{{ $user->email }}</li>
                    <li class="list-group-item">{{ $user->phone }}</li>
                    <li class="list-group-item">{{ $user->gender }}</li>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#password"><li class="list-group-item">Update Password</li></a>
                  </ul>

          </div>
      </div>


      <div class="col-9">
        <div class="card sha">

        <div class="card-body">

        </div>
        </div>

        <div class="card sha py-3">
            @php
                $docs = App\UserDoc::where('user_id', auth()->id())->get();
            @endphp
            @foreach ($docs as $doc)
            <div class="card-body">
                <iframe src="{{asset('public/pdfs/uploads')}}/{{$doc->document}}" frameborder="0"></iframe>
            </div>
            @endforeach

        </div>
      </div>
    </div>

    @endforeach
  </div>

  <!-- Modal -->
<div class="modal fade" id="avatar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Profile Picture</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('avatar-update') }}" enctype="multipart/form-data" method="POST">
        @csrf
            <div class="modal-body">
            <div class="mb-3">
            <input type="file" name="avatar" class="form-control-file">
            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>

      </div>
    </div>
  </div>



    <!-- Modal -->
<div class="modal fade" id="password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Profilbild aktualisieren</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('password-update') }}" enctype="multipart/form-data" method="POST">
        @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="staticEmail" class="form-label">Altes Passwort</label>
                    <div class="col-sm-10">
                      <input id="oldpassword" type="password" class="form-control{{ $errors->has('oldpassword') ? ' is-invalid' : '' }}" placeholder="Old Password" name="oldpassword" required autofocus>

                      @if ($errors->has('oldpassword'))
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('oldpassword') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="inputPassword" class="form-label">Neues Passwort</label>
                    <div class="col-sm-10">
                      <input id="password" placeholder="New Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                      @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="mb-3">
                      <label for="inputPassword" class="form-label">Neues Passwort erneut eingeben</label>
                      <div class="col-sm-10">
                          <input id="password-confirm" placeholder="Retype Password" type="password" class="form-control" name="password_confirmation" required>
                      </div>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Speichern</button>
            </div>
        </form>

      </div>
    </div>
  </div>
@endsection
