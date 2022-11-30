<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BrokerLogin</title>


	<link href="{{ asset('frontend/css/app.css')}}" rel="stylesheet">
	<link href="{{ asset('frontend/css/bootstrap.css')}}" rel="stylesheet">
    @yield('style_css')
</head>
<body>

<div class="container py-4">
<div class="row py-4">

    @yield('content')

</div>
    </div>
<script src="{{ asset('frontend/js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('footer_js')
</body>

</html>
