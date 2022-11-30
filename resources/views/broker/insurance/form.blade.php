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

@include('broker.insurance.menu')

<div class="container">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-body">
            @yield('insurance')
            </div>
            </div>
        </div>
    </div>
</div>


<!-- offers -->
<div class="modal fade" id="offers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
              <div class="row">
                <div class="col-12">
                <a href="{{route('broker.form.home')}}">
                <div class="card ca"><div class="card-body" style="color:#ffffff;">
                    <i style="color:#ffffff;" class="fas fa-home"></i> KHH
                </div></div>
                </a>
                </div>

                <div class="col-12">
                    <a href="{{route('broker.form.car')}}">
                    <div class="card ca"><div class="card-body" style="color:#ffffff;">
                        <i style="color:#ffffff;" class="fas fa-car-crash"></i> MF
                    </div></div>
                    </a>
                </div>

                <div class="col-12">
                    <a href="{{route('broker.form.law')}}">
                    <div class="card ca"><div class="card-body" style="color:#ffffff;">
                        <i style="color:#ffffff;" class="fas fa-gavel"></i> RS
                    </div></div>
                    </a>
                </div>

                <div class="col-12">
                    <a href="{{route('broker.form.travel')}}">
                    <div class="card ca"><div class="card-body" style="color:#ffffff;">
                        <i style="color:#ffffff;" class="fas fa-route"></i> Reise
                    </div></div>
                    </a>
                </div>

              </div>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
