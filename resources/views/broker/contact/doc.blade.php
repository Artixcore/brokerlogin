@extends('broker.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<div class="container">
        <div class="row">

            <div class="col-4">
                    <div class="card">
                @foreach ($customer as $cus)

                    <div class="card-body">

                        <table class="table">
                          <thead>

                            <tr>
                              <th scope="col">Kundennummer</th>
                              <td>: {{ $cus->customer_number }}</td>
                            </tr>
                            <tr>
                              <th scope="col">Vorname</th>
                              <td>: {{ $cus->customer_f_name }}</td>
                            </tr>
                            <tr>
                              <th scope="col">Nachname</th>
                              <td>: {{ $cus->customer_l_name }}</td>
                            </tr>
                            <tr>
                              <th scope="col">Email</th>
                              <td>: {{ $cus->customer_email }}</td>
                            </tr>
                            <tr>
                              <th scope="col">Strasse</th>
                              <td>: {{ $cus->customer_street }}</td>
                            </tr>
                            <tr>
                              <th scope="col">Tel</th>
                              <td>: {{ $cus->customer_phone }}</td>
                            </tr>
                            <tr>
                              <th scope="col">Mobile</th>
                              <td>: {{ $cus->customer_mobile }}</td>
                            </tr>
                            <tr>
                              <th scope="col">Zip</th>
                              <td>: {{ $cus->customer_zip }}</td>
                            </tr>
                            <tr>
                              <th scope="col">PLZ</th>
                              <td>: {{ $cus->customer_place }}</td>
                            </tr>
                            <tr>
                              <th scope="col">Berater</th>
                              <td>: {{ $cus->customer_agent }}</td>
                            </tr>
                            <tr>
                              <th scope="col">Reg. Date </th>
                              <td>: {{ $cus->created_at->diffForHumans() }}</td>
                            </tr>
                                @php

                  @endphp
                          </thead>
                        </table>
                    </div>
                    <div class="card-footer">
                        <form action="{{route('mail.doc')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="doc_number" value="{{ $cus->doc_number }}">
                            <input type="hidden" name="insurance_type" value="{{ $cus->insurance_type }}">
                            <input type="hidden" name="insurance_email" value="{{ $cus->insurance_email }}">
                            <input type="hidden" name="customer_f_name" value="{{ $cus->customer_f_name }}">
                            <input type="hidden" name="customer_l_name" value="{{ $cus->customer_l_name }}">
                            <input type="hidden" name="customer_email" value="{{ $cus->customer_email }}">
                            <input type="hidden" name="customer_phone" value="{{ $cus->customer_phone }}">
                            <input type="hidden" name="customer_mobile" value="{{ $cus->customer_mobile }}">
                            <input type="hidden" name="customer_street" value="{{ $cus->customer_street }}">
                            <input type="hidden" name="customer_zip" value="{{ $cus->customer_zip }}">
                            <input type="hidden" name="customer_place" value="{{ $cus->customer_place }}">
                            <input type="hidden" name="insurance_doc" value="{{ $cus->insurance_doc }}">
                            <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Send</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-8">

                @foreach ($customer as $doc)
                <div class="card" style="height:100%;">
                        <iframe src="{{asset('public/pdfs/uploads')}}/{{ $doc->insurance_doc }}" style="height:100%;" title="PDF"></iframe>
                </div>
                @endforeach
            </div>
            </div>
        </div>
        @endforeach
@endsection
