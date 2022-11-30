@extends('admin.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
<div class="container">

        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">
                            Update Company
                        </button>

                    </div>
                    @foreach ($company as $item)
                    <form action="{{route('admin.update-insurance.health', $item->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body">
                        <table class="table table-hover my-0" id="table">
                                <tbody>
                                    <tr>
                                       <a href="#" data-bs-toggle="modal" data-bs-target="#logo"> <img src="{{asset('public/company')}}/{{$item->logo}}" style="width: 100%; height:100%;"> </a>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" name="name" class="form-control" value="{{$item->name}}"> </td>
                                    </tr>
                                    <tr>
                                        <td> <input type="text" name="link" class="form-control" value="{{$item->link}}"> </td>
                                    </tr>
                                    <tr>
                                        <td class="d-none d-md-table-cell"><button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3"> Update </button></td>
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
<div class="modal fade" id="logo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Logo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        @foreach ($company as $item)
        <form action="{{route('admin.update-insurance.health.logo', $item->id)}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
         <input type="file" class="form-control-file" name="logo">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Speichern</button>
        </div>
        </form>
        @endforeach
      </div>
    </div>
  </div>
@endsection
