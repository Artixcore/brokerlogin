@extends('broker.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<div class="container">
        <div class="row">
                <div class="col-4">
                    <div class="card">
                      <div class="card-header">
                       <h3>Update</h3>
                      </div>
                    @foreach ($customer as $cus)
                    <form method="post" action="{{route('broker.customer.edit', $cus->id)}}">
                        @csrf
                    <div class="card-body">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Vorname</th>
                              <th>: <input type="text" name="customer_f_name" value="{{ $cus->customer_f_name }}">
                                <input type="hidden" name="user_id" value="{{ $cus->user_id }}">
                            </th>
                            </tr>
                            <tr>
                              <th scope="col">Nachname</th>
                              <th>: <input type="text" name="customer_l_name" value="{{ $cus->customer_l_name }}"></th>
                            </tr>
                            <tr>
                              <th scope="col">Email</th>
                              <th>: <input type="text" name="customer_email" value="{{ $cus->customer_email }}"></th>
                            </tr>
                            <tr>
                              <th scope="col">Strasse</th>
                              <th>: <input type="text" name="customer_street" value="{{ $cus->customer_street }}"></th>
                            </tr>
                            <tr>
                              <th scope="col">Tel</th>
                              <th>: <input type="text" name="customer_phone" value="{{ $cus->customer_phone }}"></th>
                            </tr>
                            <tr>
                              <th scope="col">Mobile</th>
                              <th>: <input type="text" name="customer_mobile" value="{{ $cus->customer_mobile }}"></th>
                            </tr>
                            <tr>
                              <th scope="col">Zip</th>
                              <th>: <input type="text" name="customer_zip" value="{{ $cus->customer_zip }}"></th>
                            </tr>
                            <tr>
                              <th scope="col">Geburtstag</th>
                              <th>: <input type="text" name="customer_place" value="{{ $cus->customer_place }}"></th>
                            </tr>
                            <tr>
                            <th scope="col">Date of Birth</th>
                                <th>: <input type="date" name="customer_date_of_birth" value="{{ $cus->customer_date_of_birth }}"></th>
                              </tr>
                          </thead>
                        </table>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="Update" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">
                    </form>
                    <a href="{{route('broker.application.offer', $cus->customer_number)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Back</a>
                    </div>

                  </div>
                </div>

                @endforeach

        </div>




@endsection
@section('footer_js')

@endsection
