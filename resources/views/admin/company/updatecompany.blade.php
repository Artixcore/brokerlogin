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
                    <form action="{{route('admin.update-insurance', $item->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body">
                        <table class="table table-hover my-0" id="table">
                                <tbody>
                                    <tr>
                                        <td> <input type="text" name="company_name" value="{{$item->company_name}}"> </td>
                                        <td> <input type="text" name="company_email" value="{{$item->company_email}}"> </td>
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


@endsection
