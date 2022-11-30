@extends('frontend.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<div class="container">

            <h1 class="h3 mb-3"><strong>Insurance List</strong></h1>

            <div class="row">
                
                <div class="col-6">
                    
                        <div class="card">
                        <div class="card-body">
                        <div class="mb-3">
                            <input type="checkbox" class="form-check-input">
                            <label class="form-check-label">Car Insurance</label>

                            <input type="checkbox" class="form-check-input">
                            <label class="form-check-label">Home Insurance</label>

                            <input type="checkbox" class="form-check-input">
                            <label class="form-check-label">Business Insurance</label>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" class="form-check-input">
                            <label class="form-check-label">Mr</label>

                            <input type="checkbox" class="form-check-input">
                            <label class="form-check-label">Ms</label>

                            <input type="checkbox" class="form-check-input">
                            <label class="form-check-label">Comapny</label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Surname</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Street</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Zip</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nationality</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Resident Permit</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Marital Status</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        </div>                                                   
                        </div>                                                   
                      
                </div>

                <div class="col-6">
                  
                        <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label">Nationality</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label">Resident Permit</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label">Marital Status</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>  
                        </div> 
                        <div class="card-footer">
                            <button type="submit" style="float: right;" class="btn btn-outline-primary">Submit</button>    
                        </div>                                                  
                        </div>                                                   
                    
                    </div>
                </div>
            
            </div>

  
</div>
@endsection
@section('footer_js')
    
@endsection