@extends('broker.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
ul#tabs {
  list-style-type: none;
  padding: 0;
  text-align: center;
}
ul#tabs li {
  display: inline-block;
  background-color: #252525;
  border-bottom: solid 2px grey;
  padding: 10px 20px;
  margin-bottom: 4px;
  color: #fff;
  cursor: pointer;
}
ul#tabs li:hover {
  background-color: grey;
}
ul#tabs li.active {
  background-color: #00aeef;
}
ul#tab {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
#content-tab div {
  display: none;
}
#content-tab div.active {
  display: block;
}

#content-tab>div{
  text-align:center;
  background-color:#00618c;
  width:450px;
  margin:0 auto;
  padding:15px 10px;
  color:#fff;
}
</style>
@endsection
@section('content')
<div class="container">
            <h1 class="h3 mb-3"><strong>Lead</strong></h1>
            <div class="row">
                <div class="col-4">
                    <div class="card">
                    <div class="card-body">

                        <table class="table">
                          <thead>
                            @foreach ($leads as $cus)
                            <tr>
                              <th scope="col">Vorname</th>
                              <th>: {{ $cus->f_name }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Nachname</th>
                              <th>: {{ $cus->l_name }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Email</th>
                              <th>: {{ $cus->email }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Strasse</th>
                              <th>: {{ $cus->street }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Tel</th>
                              <th>: {{ $cus->phone }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Email</th>
                              <th>: {{ $cus->email }}</th>
                            </tr>
                            <tr>
                              <th scope="col">PLZ</th>
                              <th>: {{ $cus->zip }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Ort</th>
                              <th>: {{ $cus->place }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Berater</th>
                              <th>: {{ $cus->agent_name }}</th>
                            </tr>
                            <tr>
                              <th scope="col">Reg. Date </th>
                              <th>: {{ $cus->created_at->diffForHumans() }}</th>
                            </tr>
                            @endforeach
                          </thead>
                        </table>
                    </div>
                  </div>
                </div>

                {{-- <div class="col-4">
                    <div class="card">
                        @foreach ($leads as $cus)
                        @php
                            $statuses = App\LeadStatus::where('lead_number', $cus->lead_number)->get();
                        @endphp
                        <div class="card-body">
                            @foreach ($statuses as $lil)
                        <form method="post" action="{{route('broker.lead.status', $lil->id)}}">
                            @endforeach
                            @csrf
                        <div class="input-group mb-3">
                            <input type="hidden" name="user_id" value="{{$cus->user_id}}">
                            <input type="hidden" name="lead_number" value="{{$cus->lead_number}}">
                        @endforeach
                                <select class="form-select" name="lead_status">
                                    <option selected value="New Lead">
                                        @foreach($statuses as $value)
                                        {{ $value->lead_status }}
                                        @endforeach
                                    </option>
                                     <option value="Not Reached">Not Reached</option>
                                     <option value="2 Not Reached">2 Not Reached</option>
                                     <option value="3 Not Reached">3 Not Reached</option>
                                     <option value="4 Not Reached">4 Not Reached</option>
                                     <option value="5 Not Reached">5 Not Reached</option>
                                     <option value="6 Not Reached">6 Not Reached</option>
                                     <option value="7 Not Reached">7 Not Reached</option>
                                     <option value="8 Not Reached">8 Not Reached</option>
                                     <option value="9 Not Reached">9 Not Reached</option>
                                     <option value="10 Not Reached">10 Not Reached</option>
                                     <option value="Rest">Rest</option>
                                     <option value="Not Interested">Not Interested</option>
                                     <option value="Pending">Pending</option>
                                     <option value="Scheduled">Scheduled</option>
                                     <option value="Terminiert (Call)">Terminiert (Call)</option>
                                     <option value="Offer Sent">Offer Sent</option>
                                     <option value="Invalied Number">Invalied Number</option>
                                     <option value="Invalied Age">Invalied Age</option>
                                     <option value="Sick">Sick</option>
                                     <option value="MJV">MJV</option>
                                </select>
                            <button class="btn btn-outline-danger" type="submit">Update</button>
                        </div>
                    </form>
                </div>
                </div>
            </div> --}}


            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <form action="{{route('broker.lead.update', $cus->id)}}" method="post">
                            @csrf
                        <div class="mb-3">
                            <input type="hidden" name="user_id" value="{{$cus->user_id}}">
                            <input type="hidden" name="lead_number" value="{{$cus->lead_number}}">
                            <input type="hidden" name="f_name" value="{{$cus->f_name}}">
                            <input type="hidden" name="l_name" value="{{$cus->l_name}}">
                            <input type="hidden" name="street" value="{{$cus->street}}">
                            <input type="hidden" name="zip" value="{{$cus->zip}}">
                            <input type="hidden" name="place" value="{{$cus->place}}">
                            <input type="hidden" name="phone" value="{{$cus->phone}}">
                            <input type="hidden" name="email" value="{{$cus->email}}">
                            <input type="hidden" name="date_of_birth" value="{{$cus->date_of_birth}}">
                            <input type="hidden" name="current_insurance" value="{{$cus->current_insurance}}">
                            <input type="hidden" name="number_of_person" value="{{$cus->number_of_person}}">
                            <input type="hidden" name="lead_status" value="{{$cus->lead_status}}">
                            <input type="hidden" name="lead_note" value="{{$cus->lead_note}}">
                            <input type="hidden" name="current_insurance" value="{{$cus->current_insurance}}">
                            <input type="hidden" name="current_insurance" value="{{$cus->current_insurance}}">

                            <div class="mb-3">
                                <label class="form-label">Lead Status</label>
                                <select class="form-select" name="lead_status">
                                    <option selected> Select One.. </option>
                                     <option value="Not Reached">Not Reached</option>
                                     <option value="2 Not Reached">2 Not Reached</option>
                                     <option value="3 Not Reached">3 Not Reached</option>
                                     <option value="4 Not Reached">4 Not Reached</option>
                                     <option value="5 Not Reached">5 Not Reached</option>
                                     <option value="6 Not Reached">6 Not Reached</option>
                                     <option value="7 Not Reached">7 Not Reached</option>
                                     <option value="8 Not Reached">8 Not Reached</option>
                                     <option value="9 Not Reached">9 Not Reached</option>
                                     <option value="10 Not Reached">10 Not Reached</option>
                                     <option value="Rest">Rest</option>
                                     <option value="Not Interested">Not Interested</option>
                                     <option value="Pending">Pending</option>
                                     <option value="Scheduled">Scheduled</option>
                                     <option value="Terminiert (Call)">Terminiert (Call)</option>
                                     <option value="Offer Sent">Offer Sent</option>
                                     <option value="Invalied Number">Invalied Number</option>
                                     <option value="Invalied Age">Invalied Age</option>
                                     <option value="Sick">Sick</option>
                                     <option value="MJV">MJV</option>
                                </select>
                            </div>
                            <button class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" type="submit">Sent!</button>
                        </form>
                    </div>



                    @php
                        $status = App\Lead::where('lead_number', $cus->lead_number)->get();
                    @endphp
                        <div class="card-body">
                            @foreach ($status as $item)
                            <div class="alert alert-success" role="alert">
                                {{ $item->lead_status }}
                            </div>
                            @endforeach
                        </div>

                </div>
                </div>
                </div>

            <div class="col-4">
                @foreach ($leads as $cus)
                @php
                    $note = App\LeadNote::where('lead_number', $cus->lead_number)->get();
                @endphp
                <div class="card">
                <div class="card-header">Notes</div>
                <div class="card-body">
                    <form action="{{route('broker.lead.note')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                    <input type="hidden" name="user_id" value="{{$cus->user_id}}">
                    <input type="hidden" name="lead_number" value="{{$cus->lead_number}}">
                    <input type="text" name="lead_note" class="form-control">
                    <button class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" type="submit">Sent!</button>
                    </form>
                </div>
                    @foreach ($note as $in)
                    <div class="alert alert-success" role="alert">
                       {{ $in->lead_note }}
                    </div>
                @endforeach
                </div>
            </div>
            @endforeach
    </div>
</div>

@endsection

