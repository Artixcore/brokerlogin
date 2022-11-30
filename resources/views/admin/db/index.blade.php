@extends('admin.master')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-4">
          <div class="card">
              <div class="card-body">
                <a class="btn btn-success btn-block" href="{{ route('file-export') }}"> Export Berater</a>
              </div>
          </div>

          <div class="card">
            <div class="card-body">
                <a class="btn btn-success btn-block" href="{{ route('app-export') }}">Export Verträge</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <a class="btn btn-success btn-block" href="{{ route('nachExport-export') }}">Export Nachweise</a>
            </div>
        </div>

      </div>

      <div class="col-md-4">


        <div class="card">
            <div class="card-body">
                <a class="btn btn-success btn-block" href="{{ route('customerExport-export') }}">Export Kunden</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <a class="btn btn-success btn-block" href="{{ route('FremdvertragExport-export') }}">Export Fremdverträge</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <a class="btn btn-success" href="{{ route('HomeExport-export') }}">Export Anfragen KHH</a>
            </div>
        </div>
    </div>

      <div class="col-md-4">

        <div class="card">
            <div class="card-body">
                <a class="btn btn-success btn-block" href="{{ route('CarInsuranceExport-export') }}">Export Anfragen Car</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <a class="btn btn-success btn-block" href="{{ route('LawExport-export') }}">Export Anfragen RS</a>
            </div>
        </div>


        <div class="card">
            <div class="card-body">


                <a class="btn btn-success btn-block" href="{{ route('TravelExport-export') }}">Export Anfragen Reise</a>
            </div>
        </div>

            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
