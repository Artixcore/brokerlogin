@extends('broker.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    a{
        text-decoration: none;
        color: #000000;
    }
    a:hover{
        color: #31bfe2;
        text-decoration: none;
    }
    </style>
@endsection
@section('content')


<div class="container">

    <div class="row">
    @foreach (App\HealthInsuranceCompany::all() as $item)

    <div class="col-3">
        <a href="{{$item->link}}" target="_blank">
            <div class="card">
                <img src="{{asset('public/company')}}/{{$item->logo}}" style="width: 100%; height:100%;" alt="">
            </div>
        </a>
    </div>

    @endforeach
   </div>
</div>
@endsection
