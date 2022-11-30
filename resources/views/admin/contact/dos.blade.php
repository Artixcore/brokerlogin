@extends('admin.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<div class="container">
        <div class="row">

                <div class="col-4">
                    <div class="card">
                        @foreach ($customer as $cus)
                      <div class="card-header">
                       <h4>Customer</h4>
                      </div>
                    <div class="card-body">

                        <table class="table">
                          <thead>

                            <tr>
                              <th scope="col">Kundennummer</th>
                              <th>: {{ $cus->customer_number }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Vorname</th>
                              <th>: {{ $cus->customer_f_name }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Nachname</th>
                              <th>: {{ $cus->customer_l_name }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Email</th>
                              <th>: {{ $cus->customer_email }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Strasse</th>
                              <th>: {{ $cus->customer_street }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Tel</th>
                              <th>: {{ $cus->customer_phone }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Mobile</th>
                              <th>: {{ $cus->customer_mobile }}</th>
                            </tr>
                            <tr>
                              <th scope="col">PLZ</th>
                              <th>: {{ $cus->customer_zip }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Place</th>
                              <th>: {{ $cus->customer_place }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Berater</th>
                              <th>: {{ $cus->customer_agent }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Reg. Date </th>
                              <th>: {{ $cus->created_at->diffForHumans() }}</th>
                            </tr>
                                @php

                    $docs = App\AppDoc::where('customer_number', $cus->customer_number)->get();
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

                @endforeach


        <div class="col-8">

        <div class="card" style="height:100%;">
        <iframe src="{{ asset('public/pdfs/uploads') }}/{{ $cus->insurance_doc }}" style="height:100%;" frameborder="0"></iframe>
        </div>

        </div>

       </div>
@endsection
@section('footer_js')
<script>
$(document).ready(function() {
$('#table1').DataTable();
} );
</script>
@endsection
