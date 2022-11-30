@extends('admin.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')

            <h1 class="h3 mb-3"><strong>Task</strong></h1>

            <div class="row">
                <div class="col-12">
                            <div class="card">
                            <div class="card-header">
                            <button type="button" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" data-bs-toggle="modal" data-bs-target="#task">
                                New Task
                            </button>
                            </div>
                            <div class="card-body">
                            <table class="table table-hover my-0" id="table">
                                <thead>
                                    <tr>

                                        <th class="d-none d-xl-table-cell">Task Type</th>
                                        <th class="d-none d-xl-table-cell">Date</th>
                                        <th class="d-none d-xl-table-cell">Time</th>
                                        <th class="d-none d-xl-table-cell">Ort</th>
                                        <th class="d-none d-xl-table-cell">Note</th>
                                        <th class="d-none d-xl-table-cell">Berater</th>
                                        <th class="d-none d-xl-table-cell">Status</th>
                                        <th class="d-none d-xl-table-cell">Details</th>
                                        <th class="d-none d-xl-table-cell">Delete</th>
                                    </tr>
                                </thead>
                                @php
                                $task = App\Task::all();
                                @endphp
                                <tbody>
                                @foreach ($task as $item)

                                    <tr>
                                        <td>{{$item->type_of_task}}</td>
                                        <td>{{ date('d.m.Y', strtotime($item->task_date)) }}</td>
                                        <td>{{$item->task_hour}}</td>
                                        <td>{{$item->task_place}}</td>
                                        <td>{{$item->task_note}}</td>

                                        @php
                                        $agent = App\User::where('id', $item->user_id)->get();
                                        @endphp
                                        <td>
                                            @foreach ($agent as $it)
                                            {{$it->name}}
                                            @endforeach
                                        </td>

                                        <td class="d-none d-md-table-cell">
                                            @if ($item->task_status=="Completed")
                                            <button class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Completed</button>
                                            @else
                                            <button class="btn btn-outline-warning">Pending</button>
                                            @endif
                                            </td>
                                        <td class="d-none d-md-table-cell"><a href="{{route('admin.task.update_task', $item->task_number)}}" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Öffnen </a></td>
                                        <td class="d-none d-md-table-cell">
                                            <form action="{{ route('admin.delete_task', $item->id)}}" method="post">
                                                @method('post')
                                                @csrf
                                                <button onclick="return myFunction();" class="btn btn-outline-danger" type="submit"> <i class="fas fa-trash-alt"></i> </button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>




                  <!-- Modal -->
      <div class="modal fade" id="smallModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            @foreach ($task as $item)
            <form action="{{ route('admin.delete_task', $item->id)}}" method="post">
            @endforeach
                @method('post')
                @csrf
                <h5 class="text-center">Bist Du sicher?</h5>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
        </form>
          </div>
        </div>
      </div>
      </div>



<!-- Modal -->
<div class="modal fade" id="task" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.savetask')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
            @php
                 $agent = App\User::where('urole', 'author')->get();
            @endphp
            <select name="user_id" class="form-control">
                    <option selected>Select Agent</option>
              @foreach($agent as $val)
                    <option value="{{ $val->id }}">{{ $val->name }}</option>
              @endforeach
            </select>
            </div>

            <div class="mb-3">
            <select name="type_of_task" class="form-control">
                    <option selected>Type of Task</option>
                    <option value="Rückruf">Rückruf</option>
                    <option value="Offertenanfrage">Offertenanfrage</option>
                    <option value="Sonstiges">Sonstiges</option>
            </select>
            </div>

            <div class="mb-3">
            <input type="date" class="form-control" name="task_date">

            </div>

            <div class="mb-3">
            <input type="time" class="form-control" name="task_hour">
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="task_place" placeholder="Place">
            </div>

            <div class="mb-3">
            <textarea type="text" class="form-control" name="task_note" placeholder="Note"></textarea>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Speichern</button>
        </div>
       </form>
      </div>
    </div>
  </div>

@endsection
@section('footer_js')
<script>
    function myFunction() {
        if(!confirm("Are You Sure to delete this"))
        event.preventDefault();
    }
</script>

    <script>
        $(document).ready(function() {
    $('#table').DataTable();
} );
    </script>

<script>
    // display a modal (small modal)
    $(document).on('click', '#smallButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href
            , beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            }
            , complete: function() {
                $('#loader').hide();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            }
            , timeout: 8000
        })
    });

</script>
@endsection
