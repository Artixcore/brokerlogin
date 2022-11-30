@extends('admin.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" data-bs-toggle="modal" data-bs-target="#company">
                            Neue Gesellschaft
                        </button>

                    </div>
                    <div class="card-body">
                        <table class="table table-hover my-0">
                                <thead>
                                    <tr>

                                        <th class="d-none d-xl-table-cell">Logo</th>
                                        <th class="d-none d-xl-table-cell">Name</th>
                                        <th class="d-none d-xl-table-cell">Edit</th>
                                        <th class="d-none d-xl-table-cell">Delete</th>
                                    </tr>
                                </thead>
                                @php
                                    $company = App\InsuranceCompany::orderBy('id', 'DESC')->get();
                                @endphp
                                <tbody>
                                @foreach ($company as $item)

                                    <tr>
                                        <td><img src="{{asset('public/company')}}/{{$item->company_logo}}" height="30px; width:30px;"></td>
                                        <td>{{$item->company_name}}</td>
                                        <td class="d-none d-md-table-cell"><a href="{{route('admin.update-insurance', $item->company_name)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Edit</a></td>
                                        <td class="d-none d-md-table-cell">
                                            <form action="{{ route('admin.delete.insurance', $item->id)}}" method="post">
                                                @method('post')
                                                @csrf
                                                <button onclick="return myFunction();" type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                    </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="card-header">

                            <button type="button" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3; float: right;" data-bs-toggle="modal" data-bs-target="#insurance_type">
                                Art der Versicherung
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover my-0">
                                    <thead>
                                        <tr>
                                            <th class="d-none d-xl-table-cell">Icon</th>
                                            <th class="d-none d-xl-table-cell">Name</th>
                                            <th class="d-none d-xl-table-cell">Status</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $icon = App\Insurance_Type::orderBy('id', 'DESC')->get();
                                    @endphp
                                    <tbody>
                                    @foreach ($icon as $item)

                                        <tr>
                                            <td>{!! $item->icon !!}</td>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                <form action="{{ route('admin.delete.icon', $item->id)}}" method="post">
                                                    @method('post')
                                                    @csrf
                                                    <button onclick="return myFunction();" type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">

                                <button type="button" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3; float: right;" data-bs-toggle="modal" data-bs-target="#insurance_health">
                                    Krankenkassen
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover my-0">
                                        <thead>
                                            <tr>
                                                <th class="d-none d-xl-table-cell">Logo</th>
                                                <th class="d-none d-xl-table-cell">Name</th>
                                                <th class="d-none d-xl-table-cell">Edit</th>
                                                <th class="d-none d-xl-table-cell">Delete</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $link = App\HealthInsuranceCompany::orderBy('id', 'DESC')->get();
                                        @endphp
                                        <tbody>
                                        @foreach ($link as $item)

                                            <tr>
                                                <td><img src="{{asset('public/company')}}/{{$item->logo}}" height="30px; width:30px;"></td>

                                                <td> <a href="{{$item->link}}"> {{$item->name}} </a></td>
                                                <td class="d-none d-md-table-cell"><a href="{{route('admin.update.health', $item->name)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Edit</a></td>
                                                <td class="d-none d-md-table-cell">
                                                    <form action="{{ route('admin.delete.health.logo', $item->id)}}" method="post">
                                                        @method('post')
                                                        @csrf
                                                        <button onclick="return myFunction();" type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </td>

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



        {{-- Delete --}}


<!-- Health Insurance -->
<div class="modal fade" id="insurance_health" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" enctype="multipart/form-data" action="{{route('admin.company.health')}}">
            @csrf
        <div class="modal-body">
        <div class="mb-3">
            <input type="file" name="logo" class="form-control-file">
        </div>
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Company Name">
        </div>
        <div class="mb-3">
            <input type="text" name="link" class="form-control" placeholder="Company Website Login page Link">
        </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3; float: right;">Speichern</button>
        </div>
        </form>
      </div>
    </div>
  </div>


<!-- New Comapny -->
<div class="modal fade" id="company" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Neue Gesellschaft</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.savecompany')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
            <input type="file" class="form-control-file" name="company_logo">
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="company_name" placeholder="Company Name">
            </div>

            <div class="mb-3">
            <input type="email" class="form-control" name="company_email" placeholder="Company Email">
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3; float: right;" >Speichern</button>
        </div>
       </form>
      </div>
    </div>
  </div>


  <!-- Update Company -->
<div class="modal fade" id="companyupdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Comapny</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        @foreach ($company as $item)
        <form action="{{route('admin.update-insurance', $item->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
            <input type="file" class="form-control-file" name="company_logo">
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" value="{{$item->company_name}}" name="company_name" placeholder="Company Name">
            </div>

            <div class="mb-3">
            <input type="email" class="form-control" name="company_email" value="{{$item->company_email}}" placeholder="Company Email">
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3; float: right;" >Update</button>
        </div>
       </form>
       @endforeach
      </div>
    </div>
  </div>





  <!-- Modal -->
<div class="modal fade" id="insurance_type" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Icon</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.insurance_type')}}" method="POST">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
            <input type="text" class="form-control" placeholder="Copy and Paste Icon from Font Awesome" name="icon">
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="name" placeholder="Insurance Name">
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3; float: right;" >Speichern</button>
        </div>
       </form>
      </div>
    </div>
  </div>
</div>

@endsection
@section('footer_js')
<script>
    function myFunction() {
        if(!confirm("Bist Du sicher?"))
        event.preventDefault();
    }
</script>
@endsection
