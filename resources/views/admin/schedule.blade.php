@extends('layouts.master')


@section('title')
Conference Schedule
@endsection


@section('content')


<div class="modal fade" id="addschedulemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Schedule Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action='/schedule' method="POST" enctype="multipart/form-data">

                @csrf

                <div class=" modal-body">

                    <div class="form-group">
                        <label for="title" class="col-form-label">Title:</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>

                    <div class="form-group">
                        <label for="subtitle" class="col-form-label">Sub-title:</label>
                        <input type="text" name="subtitle" class="form-control" id="subtitle">
                    </div>

                    <div class="form-group">
                        <label for="start_time" class="col-form-label">Start Time</label>
                        <div>
                            <input class="form-control" name="start_time" type="time" id="start_time">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="speaker_id">Speaker:</label>
                        <select class="form-control" id="speaker_id" name=speaker_id>
                            <option value=""></option>
                            @foreach($speakers as $speaker)
                            <option value="{{ $speaker->id }}">{{ $speaker->speaker_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="track_id">Track:</label>
                        <select class="form-control" id="track_id" name=track_id>
                            @foreach($tracks as $track)
                            <option value="{{ $track->id }}">{{ $track->track_name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Schedule Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="delete_modal_form" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <input type="hidden" id="delete_speaker_id">
                    <h5>Are you sure you want to delete this data?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes. Delete it.</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Modal --}}


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Schedule</h4>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                    data-target="#addschedulemodal">ADD</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="datatable">
                        <thead class=" text-primary">
                            <th>ID</th>
                            <th>Time</th>
                            <th>Title</th>
                            <th>Sub-title</th>
                            <th>Track</th>
                            <th>Speaker</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->start_time }}</td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->subtitle }}</td>
                                <td>{{ $row->track->track_name }}</td>
                                <td>{{ isset($row->speaker->speaker_name) ? $row->speaker->speaker_name : '' }}</td>
                                <td>
                                    <a href="/schedule/{{$row->id}}/edit" class="btn btn-success">EDIT</a>
                                    {{-- <a href="/user-edit/{{$row->id}}" class="btn btn-success">EDIT</a> --}}
                                </td>
                                <td>
                                    {{-- <form action="{{ url('user/'.$row->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form> --}}

                                    <a href="javascript:void(0)" class="btn btn-danger deletebtn">DELETE</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // $('#datatable').DataTable();

        $('#datatable').DataTable({
            "order": [[ 4, "asc" ], [ 1, "asc" ]] // Order on init. # is the column, starting at 0
        });

        $('#datatable').on('click', '.deletebtn', function(){
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            $('#delete_speaker_id').val(data[0]);

            $('#delete_modal_form').attr('action', '/schedule/'+data[0]);

            $('#deletemodalpop').modal('show');
        });
} );
</script>
@endsection