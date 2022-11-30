@extends('broker.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<div class="container">
        <div class="row">

                <div class="col-6">
                    <div class="card">
                    @foreach ($customer as $cus)
                    <form action="{{ route('broker.customer.edit', $cus->id) }}" method="post">
                        @csrf
                    <div class="card-header">
                    <h3> {{ $cus->customer_f_name }}</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                          <thead>
                            <tr>
                                <th>Anrede</th>
                                <td>
                                    <input type="checkbox" class="btn-check" value="Herr." name="customer_type" id="btn-check" autocomplete="off"/>
                                    <label class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" for="btn-check">Herr</label>

                                    <input type="checkbox" class="btn-check" value="Frau." name="customer_type" id="btn-check2" autocomplete="off"/>
                                    <label class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" for="btn-check2">Frau</label>
                                </td>
                              </tr>
                            <tr>
                              <th>Vorname</th>
                              <td><input type="text" name="customer_f_name" value="{{ $cus->customer_f_name }}" class="form-control"></td>
                            </tr>
                            <tr>
                              <th>Nachname</th>
                              <th>
                                <input type="text" name="customer_l_name" value="{{ $cus->customer_l_name }}" class="form-control">
                            </th>
                            </tr>
                            <tr>
                              <th >Email</th>
                              <th>
                                <input type="text" name="customer_email" value="{{ $cus->customer_email }}" class="form-control">
                            </th>
                            </tr>
                            <tr>
                              <th >Strasse</th>
                              <th>
                                <input type="text" name="customer_street" value="{{ $cus->customer_street }}" class="form-control">
                            </th>
                            </tr>
                            <tr>
                              <th>Tel</th>
                              <th> <input type="text" name="customer_phone" value="{{ $cus->customer_phone }}" class="form-control">
                                </th>
                            </tr>
                            <tr>
                              <th >Mobile</th>
                              <th><input type="text" name="customer_mobile" value="{{ $cus->customer_mobile }}" class="form-control">
                            </th>
                            </tr>
                            <tr>
                              <th >PLZ</th>
                              <th><input type="text" name="customer_zip" value="{{ $cus->customer_zip }}" class="form-control">
                                </th>
                            </tr>
                            <tr>
                              <th >Ort</th>
                              <th><input type="text" name="customer_place" value="{{ $cus->customer_place }}" class="form-control">
                                </th>
                            </tr>
                            <tr>
                              <th>Berater</th>
                              <th><input type="text" name="customer_agent" value="{{ $cus->customer_agent }}" class="form-control">
                                </th>
                            </tr>
                            <tr>
                            <th>Geburtstag</th>
                            <th><input type="date" name="customer_date_of_birth" value="{{ $cus->customer_date_of_birth }}" class="form-control">
                            </th>
                            </tr>
                          </thead>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Update</button>
                    </div>
                  </div>
                </div>
            </form>
                @endforeach
        </div>
@endsection

