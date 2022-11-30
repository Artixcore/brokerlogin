@extends('admin.master')
@section('content')
<div class="container">
    <div class="row">

<div class="col-8">
        <div class="card">
            <div class="card-body">
                @foreach ($exper as $ex)
                <form method="post" action="{{ route('admin.expanse_update', $ex->id) }}">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" name="e_name" class="form-control" value="{{ $ex->e_name }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="text" name="e_amount" class="form-control" value="{{ $ex->e_amount }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Referance</label>
                        <input type="text" name="e_ref" class="form-control" value="{{ $ex->e_ref }}">
                        <input type="hidden" name="user_id" class="form-control" value="{{ $ex->user_id }}">
                        <input type="hidden" name="e_number" class="form-control" value="{{ $ex->e_number }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Referance</label>
                        <textarea type="text" name="e_details" class="form-control">{{ $ex->e_details }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>
                @endforeach
        </div>
     </div>
    </div>

</div>

</div>

@endsection
