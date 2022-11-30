@extends('broker.master')
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


                                <tbody>
                                @foreach ($task as $item)

                                    <tr>
                                        <th class="d-none d-xl-table-cell">Task Type</th>
                                        <td>{{$item->type_of_task}}</td>
                                  </tr>
                                  <tr>
                                   <th class="d-none d-xl-table-cell">Date</th>
                                   <td>{{ date('d.m.Y', strtotime($item->task_date)) }}</td>
                                 </tr>
                                  <tr>
                                   <th class="d-none d-xl-table-cell">Time</th>
                                   <td>{{$item->task_hour}}</td>
                                  </tr>
                                  <tr>
                                   <th class="d-none d-xl-table-cell">Place</th>
                                   <td>{{$item->task_place}}</td>
                                   </tr>
                                  <tr>
                                    <th class="d-none d-xl-table-cell">Note</th>
                                    <td>{{$item->task_note}}</td>
                                    </tr>
                                  <tr>
                                    <tr>
                                    <th class="d-none d-xl-table-cell">Status</th>
                                    <td>{{$item->task_status}}</td>
                                    </tr>

                                   <tr>

                                        <td class="d-none d-md-table-cell"><button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3">Edit</button></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
 @endforeach
                    </div>
                </div>
            </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Task</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        @foreach($task as $item)
        <form action="{{route('broker.task.update_form_task', $item->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
            <select name="task_status" class="form-control">
                    <option selected>{{$item->task_status}}</option>
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
            </select>
            </div>
        <input type="hidden" name="type_of_task" value="{{$item->type_of_task}}">
        <input type="hidden" name="task_date" value="{{$item->task_date}}">
        <input type="hidden" name="task_hour" value="{{$item->task_hour}}">
        <input type="hidden" name="task_place" value="{{$item->task_place}}">
        <input type="hidden" name="task_note" value="{{$item->task_note}}">
        <input type="hidden" name="agent_name" value="{{$item->agent_name}}">
        <input type="hidden" name="user_id" value="{{$item->user_id}}">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update task</button>
        </div>
       </form>
        @endforeach
      </div>
    </div>
  </div>

@endsection
