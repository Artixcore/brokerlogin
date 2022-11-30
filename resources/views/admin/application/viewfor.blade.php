@extends('admin.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<div class="container">
        <div class="row">
                <div class="col-4">
                    <div class="card">
                    @foreach ($apps as $custo)
                    <div class="card-header">
                    <h3>Kundendetails</h3>
                    </div>
                    <div class="card-body">
                    @php
                        $customer= App\Customer::where('customer_number', $custo->customer_number)->get();
                    @endphp
                    @foreach ($customer as $cus)
                    <form action="{{route('mail.application')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Vorname</th>
                              <th><input type="text" value="{{ $cus->customer_f_name }}" name="customer_f_name" class="form-control"></th>
                            </tr>
                            <tr>
                              <th scope="col">Nachname</th>
                              <th><input type="text" value="{{ $cus->customer_l_name }}" name="customer_l_name" class="form-control"></th>
                            </tr>
                            <tr>
                              <th scope="col">Email</th>
                              <th><input type="email" value="{{ $cus->customer_email }}" class="form-control" name="customer_email"></th>
                            </tr>
                            <tr>
                              <th scope="col">Strasse</th>
                              <th><input type="text" value="{{ $cus->customer_street }}" name="customer_street" class="form-control"></th>
                            </tr>
                            <tr>
                                <th scope="col">PLZ</th>
                                <th><input type="text" value="{{ $cus->customer_zip }}" name="customer_zip" class="form-control"></th>
                              </tr>
                              <tr>
                                <th scope="col">Ort</th>
                                <th><input type="text" value="{{ $cus->customer_place }}" name="customer_place" class="form-control"></th>
                              </tr>
                            <tr>
                              <th scope="col">Tel</th>
                              <th><input type="text" value="{{ $cus->customer_phone }}" name="customer_phone" class="form-control"></th>
                            </tr>
                            <tr>
                              <th scope="col">Mobile</th>
                              <th><input type="text" value="{{ $cus->customer_mobile }}" name="customer_mobile" class="form-control"></th>
                            </tr>

                            <tr>
                              <th scope="col">Berater</th>
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
                     <h3>Fremdvertrag</h3>
                    </div>
                    @php
                    $company = App\InsuranceCompany::where('company_email',  $custo->insurance_email)->get();
                    @endphp

                  <div class="card-body">
                    <table class="table">
                      <thead>

                            <tr>
                            <th scope="col">Gesellschaft</th>
                            <td>
                                @foreach($company as $com)
                                {{ $com->company_name}}
                                @endforeach
                            </td>
                            </tr>
                        <tr>
                            <th scope="col">Start</th>
                            <th><input type="text" name="end" value="{{ date('d.m.Y', strtotime($custo->start)) }}" class="form-control"></th>
                        </tr>
                        <tr>
                          <th scope="col">Ende</th>
                          <th><input type="text" name="end" value="{{ date('d.m.Y', strtotime($custo->end)) }}" class="form-control"></th>
                        </tr>
                        <tr>
                            <th scope="col">Police-Nr</th>
                            <th><input type="text" name="end" value="{{ $custo->policy_no }}" class="form-control"></th>
                        </tr>
                        <tr>
                            <th scope="col">Art der Versicherung</th>
                            <td>{{ $custo->insurance_type }}</td>
                          </tr>

                        <input type="hidden" name="insurance_doc"  value="{{$cus->pdf}}">

                      </thead>
                    </table>

                    </div>
                    @endforeach
                </div>

                <input type="hidden" name="pdf"  value="{{$custo->pdf}}">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update">
                    Update
                </button>
            </div>

            <div class="col-4">
                    <div class="card" style="height:100%;">
                        <iframe src="{{asset('public/pdfs/uploads')}}/{{ $custo->pdf }}" style="height:100%;" title="PDF"></iframe>
                    </div>
            </div>
        </form>

                </div>
                </div>




<!-- Modal -->
<div class="modal fade" id="update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Update Application</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @foreach ($apps as $custo)
            <form action="{{route('application.upgrade', $custo->id)}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="container">
                <div class="row">
                        <div class="col-6">
                            <div class="card">
                            <div class="card-header">
                            <h3>Kundendetails</h3>
                            </div>
                            <div class="card-body">
                            @php
                                $customer= App\Customer::where('customer_number', $custo->customer_number)->get();
                            @endphp
                            @foreach ($customer as $cus)
                            <form action="{{route('mail.application')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">Vorname</th>
                                      <th><input type="text" value="{{ $cus->customer_f_name }}" name="customer_f_name" class="form-control"></th>
                                    </tr>
                                    <tr>
                                      <th scope="col">Nachname</th>
                                      <th><input type="text" value="{{ $cus->customer_l_name }}" name="customer_l_name" class="form-control"></th>
                                    </tr>
                                    <tr>
                                      <th scope="col">Email</th>
                                      <th><input type="email" value="{{ $cus->customer_email }}" class="form-control" name="customer_email"></th>
                                    </tr>
                                    <tr>
                                      <th scope="col">Strasse</th>
                                      <th><input type="text" value="{{ $cus->customer_street }}" name="customer_street" class="form-control"></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">PLZ</th>
                                        <th><input type="text" value="{{ $cus->customer_zip }}" name="customer_zip" class="form-control"></th>
                                      </tr>
                                      <tr>
                                        <th scope="col">Ort</th>
                                        <th><input type="text" value="{{ $cus->customer_place }}" name="customer_place" class="form-control"></th>
                                      </tr>
                                    <tr>
                                      <th scope="col">Tel</th>
                                      <th><input type="text" value="{{ $cus->customer_phone }}" name="customer_phone" class="form-control"></th>
                                    </tr>
                                    <tr>
                                      <th scope="col">Mobile</th>
                                      <th><input type="text" value="{{ $cus->customer_mobile }}" name="customer_mobile" class="form-control"></th>
                                    </tr>

                                    <tr>
                                      <th scope="col">Berater</th>
                                      <th><input type="text" value="{{$cus->customer_agent}}" name="customer_agent" class="form-control"></th>
                                    </tr>
                                  </thead>
                                </table>

                            @endforeach
                            </div>
                          </div>
                        </div>



                        <div class="col-6">

                          <div class="card">
                            <div class="card-header">
                             <h3>Application</h3>
                            </div>
                          <div class="card-body">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">Art der Versicherung</th>
                                  <th><input type="text" value="{{ $custo->insurance_type }}" class="form-control" name="insurance_type"></th>
                                </tr>
                                <tr>
                                  <th scope="col">Termin</th>
                                  <th><input type="date" value="{{ date('d.m.Y', strtotime($custo->education)) }}" class="form-control" name="education"></th>
                                </tr>
                                <tr>
                                  <th scope="col">Beginn</th>
                                  <th><input type="date" value="{{ date('d.m.Y', strtotime($custo->beginning)) }}" name="beginning" class="form-control"></th>
                                </tr>
                                <tr>
                                  <th scope="col">Ende</th>
                                  <th><input type="text" name="end" value="{{ date('d.m.Y', strtotime($custo->end)) }}" class="form-control"></th>
                                </tr>
                                <tr>
                                    <th scope="col">Mail von Gesellschaft</th>
                                    <th><input type="text" name="insurance_email" value="{{ $custo->insurance_email }}" class="form-control"></th>
                                </tr>
                                {{-- <input type="hidden" name="insurance_doc"  value="{{$cus->insurance_doc}}"> --}}
                                <tr>
                                    <th scope="col">Status</th>
                                    <th>

                                        <select class="form-select" name="status">
                                            <option selected>

                                              @if($cus->status=='')
                                              Auswählen
                                              @else
                                              {{ $cus->status }}
                                              @endif

                                           </option>
                                            <option value="Versendet">Versendet</option>
                                            <option value="Provisioniert">Provisioniert</option>
                                            <option value="Annahme">Annahme</option>
                                            <option value="Storniert">Storniert</option>
                                            <option value="Abgelehnt">Abgelehnt</option>
                                         </select>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Insurance File</th>
                                    <th><input type="file" name="pdf" class="form-control"></th>
                                </tr>
                              </thead>
                            </table>

                            </div>
                            @endforeach
                        </div>



                    </div>


                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">save</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection

