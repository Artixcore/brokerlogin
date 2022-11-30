@extends('frontend.master')
@section('style_css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
<div class="container">

    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Customer</strong></h1>

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
	        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
            </div>
            @endif 

            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="card">
                            <div class="card-header"> 
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#customer">
                                Add New Customer
                            </button> 
                            </div>
                            <div class="card-body">
                            <table class="table table-hover my-0" id="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="d-none d-xl-table-cell">First Name</th>
                                        <th class="d-none d-xl-table-cell">Last Name</th>
                                        <th class="d-none d-xl-table-cell">Date of Birth</th>
                                        <th class="d-none d-xl-table-cell">Zip</th>
                                        <th class="d-none d-xl-table-cell">Place</th>
                                        <th class="d-none d-xl-table-cell">Company</th>
                                        <th class="d-none d-xl-table-cell">Agent</th>
                                        <th class="d-none d-xl-table-cell">Details</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                @php
                                    $customer = App\Customer::where('user_id', auth()->id())->orderBy('id', 'DESC')->get();
                                @endphp
                                <tbody>
                                @foreach ($customer as $item)
                               
                                    <tr>
                                        <td>{{$item->customer_number}}</td>
                                        <td>{{$item->customer_f_name}}</td>
                                        <td>{{$item->customer_l_name}}</td>
                                        <td>{{$item->customer_date_of_birth}}</td>
                                        <td>{{$item->customer_zip}}</td>
                                        <td>{{$item->customer_place}}</td>
                                        <td>{{$item->customer_company}}</td>
                                        <td>{{$item->customer_agent}}</td>
                                        {{-- <td>{{$item->customer_agent}}</td> --}}
                                        <td class="d-none d-md-table-cell"><a href="{{route('application.pdf', $item->customer_number)}}" class="btn btn-outline-success"><i class="fas fa-link"></i></a></td>
                                        <td class="d-none d-md-table-cell"><a href="{{route('application.offer', $item->customer_number)}}" class="btn btn-outline-success">View</a></td>
                                    </tr>
                               
                                @endforeach
                                </tbody>
                            </table> 
                        </div>                                                   
                        </div>                                                   
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

<!-- Modal -->
<div class="modal fade" id="customer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Customer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.save')}}" method="POST">
            @csrf
        <div class="modal-body">
            <div class="mb-3">

                <input type="checkbox" value="Mr." name="customer_type" class="form-check-input">
                <label class="form-check-label">Mr.</label>

                <input type="checkbox" value="Ms." name="customer_type" class="form-check-input">
                <label class="form-check-label">Ms</label>
                
                <input type="checkbox" value="Company" name="customer_type" class="form-check-input">
                <label class="form-check-label">Company</label>
                
              </div>

            <div class="mb-3">
           
            <input type="text" class="form-control" name="customer_f_name" placeholder="First Name">
            </div>

            <div class="mb-3">
            
            <input type="text" class="form-control" name="customer_l_name" placeholder="Last Name">
            </div>

            <div class="mb-3">
           
            <input type="text" class="form-control" name="customer_street" placeholder="Street">
            </div>

            <div class="mb-3">
           
            <input type="text" class="form-control" name="customer_zip" placeholder="ZIP">
            </div>

            <div class="mb-3">
           
            <input type="text" class="form-control" name="customer_place" placeholder="Place">
            </div>

            <div class="mb-3">
          
            <input type="text" class="form-control" name="customer_phone" placeholder="Phone">
            </div>

            <div class="mb-3">
          
            <input type="text" class="form-control" name="customer_mobile" placeholder="Mobile">
            </div>

            <div class="mb-3">
    
            <input type="text" class="form-control" name="customer_email" placeholder="Email">
            </div>

            <div class="mb-3">
            
            <input type="date" class="form-control" name="customer_date_of_birth">
            </div>

            <div class="mb-3">
            <select name="customer_agent" class="form-control" id="">
                <option selected>Select Agent</option>
                <option value="Mike">Mike</option>
                <option value="Tyon">Tyson</option>
                <option value="LUL">LUL</option>
                <option value="Mon">Mon</option>
            </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
       </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer_js')
    <script>
        $(document).ready(function() {
    $('#table').DataTable();
} );
    </script>
@endsection