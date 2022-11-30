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
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#lead">
                                New Lead
                            </button> 
                            </div>
                            <div class="card-body">
                            <table class="table table-hover my-0" id="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="d-none d-xl-table-cell">First Name</th>
                                        <th class="d-none d-xl-table-cell">Last Name</th>
                                        <th class="d-none d-xl-table-cell">Investment Advice</th>
                                        <th class="d-none d-xl-table-cell">price</th>
                                       
                                        <th class="d-none d-xl-table-cell">Details</th>
                                    </tr>
                                </thead>
                                @php
                                    $lead = App\Lead::where('user_id', auth()->id())->orderBy('id', 'DESC')->get();
                                @endphp
                                <tbody>
                                @foreach ($lead as $item)
                                    
                                    <tr>
                                        <td>{{$item->lead_number}}</td>
                                        <td>{{$item->f_name}}</td>
                                        <td>{{$item->l_name}}</td>
                                        <td>{{$item->investment_advice}}</td>
                                        <td>{{$item->price}}</td>
                                        <td class="d-none d-md-table-cell"><button class="btn btn-outline-success">Active</button></td>
                                    </tr>
                                    
                                @endforeach
                                </tbody>
                            </table>                                            
                        </div>
                    </div>
                </div>
            </div>

    
<!-- Modal -->
<div class="modal fade" id="lead" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Customer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.savelead')}}" method="POST">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
            <input type="text" class="form-control" name="f_name" placeholder="First Name">
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="l_name" placeholder="Last Name">
            </div>

            <div class="mb-3">
            <select name="investment_advice" class="form-control" id="">
                <option selected>Select One</option>
                <option value="Investment Advice">Investment Advice</option>
            </select>
            </div>

            <div class="mb-3">
           
            <input type="text" class="form-control" name="geburtsdatum" placeholder="Geburtsdatum">
            </div>

            <div class="mb-3">
                <select name="franchise" class="form-control" id="">
                    <option selected>Select One</option>
                    <option value="Franchise">Franchise</option>
                </select>
                </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="kvg" placeholder="KVG">
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="vvg" placeholder="VVG">
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="price" placeholder="VVG">
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