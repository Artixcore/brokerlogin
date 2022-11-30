@extends('admin.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<div class="container">
        <div class="row">
                <div class="col-4">
                    <div class="card">
                    @foreach ($nachweis as $custo)
                    <div class="card-header">
                    <h3>Customer Details</h3>
                    </div>
                    <div class="card-body">
                    @php
                        $customer= App\Customer::where('customer_number', $custo->customer_number)->get();
                    @endphp
                    @foreach ($customer as $cus)
                    <form action="{{route('mail.admin.nachweis')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">First Name</th>
                              <th><input type="text" value="{{ $cus->customer_f_name }}" name="customer_f_name" class="form-control"></th>
                            </tr>
                            <tr>
                              <th scope="col">Last Name</th>
                              <th><input type="text" value="{{ $cus->customer_l_name }}" name="customer_l_name" class="form-control"></th>
                            </tr>
                            <tr>
                              <th scope="col">Email</th>
                              <th><input type="email" value="{{ $cus->customer_email }}" class="form-control" name="customer_email"></th>
                            </tr>
                            <tr>
                              <th scope="col">Street</th>
                              <th><input type="text" value="{{ $cus->customer_street }}" name="customer_street" class="form-control"></th>
                            </tr>
                            <tr>
                              <th scope="col">Phone</th>
                              <th><input type="text" value="{{ $cus->customer_phone }}" name="customer_phone" class="form-control"></th>
                            </tr>
                            <tr>
                              <th scope="col">Mobile</th>
                              <th><input type="text" value="{{ $cus->customer_mobile }}" name="customer_mobile" class="form-control"></th>
                            </tr>
                            <tr>
                              <th scope="col">Zip</th>
                              <th><input type="text" value="{{ $cus->customer_zip }}" name="customer_zip" class="form-control"></th>
                            </tr>
                            <tr>
                              <th scope="col">Place</th>
                              <th><input type="text" value="{{ $cus->customer_place }}" name="customer_place" class="form-control"></th>
                            </tr>
                            <tr>
                              <th scope="col">Agent</th>
                              <th><input type="text" value="{{$cus->customer_agent}}" name="customer_agent" class="form-control"></th>
                            </tr>
                          </thead>
                        </table>

                    @endforeach
                    </div>
                  </div>
                </div>



                <div class="col-4">

                  <div class="card">
                    <div class="card-header">
                     <h3>Nachweis</h3>
                    </div>
                  <div class="card-body">

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Model</th>
                          <th><input type="text" value="{{ $custo->model }}" class="form-control" name="model"></th>
                        </tr>
                        <tr>
                          <th scope="col">Marke</th>
                          <th><input type="text" value="{{ $custo->marke }}" class="form-control" name="marke"></th>
                        </tr>
                        <tr>
                          <th scope="col">Typenschein</th>
                          <th><input type="text" value="{{ $custo->typenschein }}" name="typenschein" class="form-control"></th>
                        </tr>
                        <tr>
                          <th scope="col">1.Inv</th>
                          <th><input type="text" value="{{$custo->inv}}" name="inv" class="form-control"></th>
                        </tr>
                        <tr>
                          <th scope="col">Stammnummer</th>
                          <th><input type="text" name="Stammnummer" value="{{ $custo->Stammnummer }}" class="form-control"></th>
                        </tr>

                          <tr>
                          <th scope="col">Grund</th>
                          <th><input type="text" value="{{ $custo->grund }}" name="grund" class="form-control"></th>
                        </tr>
                        <tr>
                          <th scope="col">Kontrollschild</th>
                          <th><input type="text" name="kontrollschild" value="{{ $custo->kontrollschild }}" class="form-control"></th>
                        </tr>
                        <tr>
                            <th scope="col">Company</th>
                            <th>
                               <select name="email" class="form-control" required>

                                <option selected value="{{$com->company_email}}">{{$com->company_name}}</option>
                                  @foreach (App\InsuranceCompany::all() as $com)
                                  <option value="{{$com->company_email}}">{{$com->company_name}}</option>
                                  @endforeach
                               </select>
                            </th>
                          </tr>
                      </thead>
                    </table>

                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Send!</button>
                    </div>
                </form>
                     @endforeach
                </div>
                </div>
                </div>
                </div>

@endsection

