@extends('admin.master')
@section('content')

@php

@endphp

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">X</button>
    <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row">

        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.taxes.risiko') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="BVG-Risiko">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">%</label>
                            <input type="text" class="form-control" name="amount" placeholder="Place tax %">
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </form>
                </div>
                <br/>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Update</th>
                          </tr>
                        </thead>
                        <tbody>


                        @foreach ($risiko as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->amount }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Risiko">
                                    Update
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>

        </div>


                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.taxes.ahv') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="AHV-Beitrag">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">%</label>
                                    <input type="text" class="form-control" name="amount" placeholder="Place tax %">
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                            </form>
                        </div>
                        <br/>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Update</th>
                                  </tr>
                                </thead>
                                <tbody>


                                @foreach ($ahv as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AHV">
                                            Update
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>

                </div>



                <div class="col-3">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('admin.taxes.alv') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="ALV-Beitrag">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">%</label>
                                    <input type="text" class="form-control" name="amount" placeholder="Place tax %">
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                            </form>
                        </div>
                        <br/>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Update</th>
                                  </tr>
                                </thead>
                                <tbody>

                                @foreach ($alv as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ALV">
                                            Update
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>

                </div>



                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.taxes.nbus') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="NBU-Beitrag">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">%</label>
                                    <input type="text" class="form-control" name="amount" placeholder="Place tax %">
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                            </form>
                        </div>
                        <br/>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Update</th>
                                  </tr>
                                </thead>
                                <tbody>


                                @foreach ($nbu as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#NBUS">
                                        Update
                                    </button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>

                </div>



                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.taxes.ktgs') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="KTG-Beitrag">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">%</label>
                                    <input type="text" class="form-control" name="amount" placeholder="Place tax %">
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                            </form>
                        </div>
                        <br/>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Update</th>
                                  </tr>
                                </thead>
                                <tbody>


                                @foreach ($ktg as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#KTGS">
                                            Update
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>

                </div>
    </div>



{{-- Modals --}}

<!-- Risiko -->
<div class="modal fade" id="Risiko" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">NBU</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              @foreach ($nbu as $item)
              <form action="{{ route('admin.taxes.risiko.update', $item->id) }}" method="POST">
                  @csrf
                  <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                  </div>
                  <div class="mb-3">
                      <label class="form-label">%</label>
                      <input type="text" class="form-control" name="amount" value="{{ $item->amount }}" placeholder="Place tax %">
                  </div>
                  <button type="submit" class="btn btn-outline-primary">Submit</button>
              </form>
              @endforeach
          </div>

        </div>
      </div>
  </div>


<div class="modal fade" id="NBUS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">NBU</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @foreach ($nbu as $item)
            <form action="{{ route('admin.taxes.nbus.update', $item->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">%</label>
                    <input type="text" class="form-control" name="amount" value="{{ $item->amount }}" placeholder="Place tax %">
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
            @endforeach
        </div>

      </div>
    </div>
</div>


<!-- KTG -->
<div class="modal fade" id="KTGS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">KTG</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @foreach ($ktg as $item)
            <form action="{{ route('admin.taxes.ktgs.update', $item->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">%</label>
                    <input type="text" class="form-control" name="amount" value="{{ $item->amount }}" placeholder="Place tax %">
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
            @endforeach
        </div>

      </div>
    </div>
</div>


<!-- ALV -->
<div class="modal fade" id="ALV" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ALV</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @foreach ($alv as $item)
            <form action="{{ route('admin.taxes.alv.update', $item->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">%</label>
                    <input type="text" class="form-control" name="amount" value="{{ $item->amount }}" placeholder="Place tax %">
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
            @endforeach
        </div>

      </div>
    </div>
</div>

<!-- ALV -->
<div class="modal fade" id="AHV" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">AHV</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @foreach ($ahv as $item)
            <form action="{{ route('admin.taxes.ahv.update', $item->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">%</label>
                    <input type="text" class="form-control" name="amount" value="{{ $item->amount }}" placeholder="Place tax %">
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
            @endforeach
        </div>

      </div>
    </div>
</div>
@endsection
