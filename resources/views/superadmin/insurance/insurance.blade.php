@extends('frontend.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
<div class="container">

    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Insurance List</strong></h1>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="card">
                            <div class="card-header"> 
                            <a href="{{route('admin.insurance.form')}}" class="btn btn-outline-primary">
                                New Insurance
                            </a> 
                            </div>
                            <div class="card-body">
                            <table class="table table-hover my-0" id="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="d-none d-xl-table-cell">Task Type</th>
                                        <th class="d-none d-xl-table-cell">Date</th>
                                        <th class="d-none d-xl-table-cell">Time</th>
                                        <th class="d-none d-xl-table-cell">Place</th>
                                        <th class="d-none d-xl-table-cell">Note</th>
                                        <th class="d-none d-xl-table-cell">File</th>
                                        <th class="d-none d-xl-table-cell">Details</th>
                                    
                                    </tr>
                                </thead>
                                {{-- @php
                                    $lead = App\Lead::where('user_id', auth()->id())->orderBy('id', 'DESC')->get();
                                @endphp --}}
                                <tbody>
                                {{-- @foreach ($task as $item)
                                    
                                    <tr>
                                        <td>{{$item->task_number}}</td>
                                        <td>{{$item->type_of_task}}</td>
                                        <td>{{$item->task_date}}</td>
                                        <td>{{$item->task_hour}}</td>
                                        <td>{{$item->task_place}}</td>
                                        <td>{{$item->task_note}}</td>
                                        <td class="d-none d-md-table-cell"><button class="btn btn-outline-success"><i class="fas fa-link"></i></button></td>
                                        <td class="d-none d-md-table-cell"><button class="btn btn-outline-success">Active</button></td>
                                    </tr>
                                    
                                @endforeach --}}
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
<div class="modal fade" id="insurance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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