@extends('frontend.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<div class="container">
            <h1 class="h3 mb-3"><strong>New Offer</strong></h1>

            <div class="row">
                <div class="col-9">
                    
                        
                        <div class="card">
                            <div class="card-body">
                          @foreach ($customer as $cus)
                              {{ $cus->customer_number }}
                        @endforeach
                    </div>                                                   
                    </div>
                </div>

                <div class="col-3">
                    <div class="card">
                    
                    <a class="btn btn-outline-success btn-block" href="{{route('application.new')}}"><i class="fas fa-plus"></i> New Application</a>
                    
                    </div> 
                </div>

            </div>
</div>
@endsection
@section('footer_js')
    
@endsection