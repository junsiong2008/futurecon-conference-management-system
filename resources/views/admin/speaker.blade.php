@extends('layouts.master')


@section('title')
Speakers
@endsection


@section('content')
<style>
    .form-group input[type=file] {
        opacity: 100;
        position: relative;
    }
</style>

<div class="modal fade" id="addspeakermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Speaker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action='/speaker' method="POST" enctype="multipart/form-data">

                @csrf

                <div class=" modal-body">

                    <div class="form-group">
                        <label for="speaker_name" class="col-form-label">Speaker Name:</label>
                        <input type="text" name="speaker_name" class="form-control" id="speaker_name">
                    </div>
                    <div class="input-group">
                        <label for="speakerImg" class="col-form-label">Image:</label>
                        <input type="file" name="speakerImg" class="form-control-file" id="speakerImg">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of
                            image should not be
                            more than 2MB.</small>
                    </div>

                    <div class="form-group">
                        <label for="speaker_bio" class="col-form-label">Bio:</label>
                        <input type="text" name="speaker_bio" class="form-control" id="speaker_bio">
                    </div>
                    <div class="form-group">
                        <label for="speaker_email" class="col-form-label">Speaker Email:</label>
                        <input type="email" name="speaker_email" class="form-control" id="speaker_email">
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Speaker</h5>
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
                <h4 class="card-title">Speakers</h4>
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
                    data-target="#addspeakermodal">ADD</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="datatable">
                        <thead class=" text-primary">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Profile Image</th>
                            <th>Bio</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach ($speakers as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->speaker_name }}</td>

                                <td>
                                    @if(isset($row->speakerImg))
                                    <a class="btn btn-primary" href="{{ url('storage/'.$row->speakerImg) }}">
                                        View Image
                                    </a>
                                </td>
                                @endif
                                <td>{{ $row->speaker_bio }}</td>
                                <td>{{ $row->speaker_email }}</td>
                                <td>
                                    <a href="/speaker/{{$row->id}}/edit" class="btn btn-success">EDIT</a>
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
        $('#datatable').DataTable();

        $('#datatable').on('click', '.deletebtn', function(){
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            $('#delete_speaker_id').val(data[0]);

            $('#delete_modal_form').attr('action', '/speaker/'+data[0]);

            $('#deletemodalpop').modal('show');
        });
} );
</script>
@endsection