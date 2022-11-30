@extends('frontend.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
<div class="container">
    <h1 class="h3 mb-3"><strong>Lead</strong></h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"> 
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#company">
                            New Company
                        </button> 
                    </div>
                    <div class="card-body">
                        <table class="table table-hover my-0" id="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="d-none d-xl-table-cell">Logo</th>
                                        <th class="d-none d-xl-table-cell">Name</th>
                                        <th class="d-none d-xl-table-cell">Register Number</th>
                                        <th class="d-none d-xl-table-cell">Details</th>
                                        <th class="d-none d-xl-table-cell">Status</th>
                                    </tr>
                                </thead>
                                @php
                                    $company = App\InsuranceCompany::orderBy('id', 'DESC')->get();
                                @endphp
                                <tbody>
                                @foreach ($company as $item)
                                    
                                    <tr>
                                        <td>{{$item->company_number}}</td>
                                        <td><img src="{{asset('company')}}/{{$item->company_logo}}" height="80px; width:80px;"></td>
                                        <td>{{$item->company_name}}</td>
                                        <td>{{$item->company_register_number}}</td>
                                        <td class="d-none d-md-table-cell"><a href="#" class="btn btn-outline-success"><i class="fas fa-link"></i></a></td>
                                        <td class="d-none d-md-table-cell"><button class="btn btn-outline-success">Active</button></td>
                                    </tr>
                                    
                                @endforeach
                                </tbody>
                            </table> 
                                                                 
                        </div>                                                   
                      
                    </div>
                </div>
            </div>

        </div>

<!-- Modal -->
<div class="modal fade" id="company" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Customer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.savecompany')}}" method="POST">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
            <input type="file" class="form-control-file" name="company_logo">
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="company_name" placeholder="Company Name">
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="company_register_number" placeholder="Company Email">
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