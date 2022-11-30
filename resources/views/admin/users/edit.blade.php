@extends('admin.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">Anpassen</div>
<div class="card-body">

<form action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data" method="POST">

    <div class="mb-3">
        <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="name" class="col-md-2 col-form-label text-md-right">First Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control @error('f_name') is-invalid @enderror" name="f_name" value="{{ $user->f_name }}">
            @error('f_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="name" class="col-md-2 col-form-label text-md-right">Last Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control @error('l_name') is-invalid @enderror" name="l_name" value="{{ $user->l_name }}">
            @error('l_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="email" class="col-md-2 col-form-label text-md-right">E-Mail</label>
        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="name" class="col-md-2 col-form-label text-md-right">Date of Birth</label>
        <div class="col-md-6">
            <input type="date" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ $user->age }}">
            @error('age')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="name" class="col-md-2 col-form-label text-md-right">Comission</label>
        <div class="col-md-6">
            <input type="text" class="form-control @error('com') is-invalid @enderror" name="com" value="{{ $user->com }}">
            @error('com')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    @csrf
    {{ method_field('PUT') }}

    <div class="mb-3">
        <label for="roles" class="col-md-2 col-form-label text-md-right">Roles</label>
        <div class="col-md-6">
        @foreach ($roles as $role)
        <div class="form-check">
            <input type="checkbox" name="roles[]" value="{{$role->id}}" @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
            <label>
            @if ($role->urole=='superadmin')
                Superadmin
            @elseif ($role->urole=='admin')
                Admin
            @elseif ($role->urole=='author')
                Broker
            @elseif ($role->urole=='user')
              User
            @endif

            </label>
            </div><br/>
        @endforeach
    </div>
    </div>
        <button class="btn btn-outline-success" type="submit">Update</button>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection
