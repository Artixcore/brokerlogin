@extends('layouts.master')

@section('content')
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-50">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h4 class="h2"><img src="{{asset('public/logo.png')}}"></h4>

                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">


     <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">

                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Deine Email.." autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

        </div>

        <div class="md-3">

                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Dein Passwort.." required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

        </div>

        {{-- <div class="md-3 py-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Passwort merken
                    </label>
                </div>
        </div> --}}

        <div class="md-3">
                <button type="submit" style="float:right; color: #000000; background-color:#D3D3D3;" class="btn btn-outline-default mt-2">
                    {{ __('Login') }}
                </button>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" style="color: #000000;" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>

    </form>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</main>
@endsection
