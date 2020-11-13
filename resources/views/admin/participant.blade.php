@extends('layouts.master')


@section('title')
Participants
@endsection


@section('content')

<!-- Modal -->
<div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Participants</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="delete_modal_form" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <input type="hidden" id="delete_participant_id">
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
                <h4 class="card-title">Participants</h4>
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
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="datatable">
                        <thead class=" text-primary">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Organization</th>
                            <th>Phone Number</th>
                            <th>Member Type</th>
                            <th>Track</th>
                            <th>Present Method</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach ($participants as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->organization }}</td>

                                <td>{{ $row->phone_num }}</td>
                                @if($row->member_type == 0)
                                <td>Non-IEEE Member</td>
                                @elseif($row->member_type == 1)
                                <td>IEEE Member</td>
                                @elseif($row->member_type==2)
                                <td>Student</td>
                                @endif

                                <td>{{ $row->track->track_name }}</td>

                                @if($row->present_method == 0)
                                <td>Present Physically</td>
                                @elseif($row->present_method == 1)
                                <td>Present Online</td>
                                @endif

                                <td>
                                    <a href="/participant/{{$row->id}}/edit" class="btn btn-success">EDIT</a>
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


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Verify Participants</h4>
                @if (session('status2'))
                <div class="alert alert-success" role="alert">
                    {{ session('status2') }}
                </div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="datatable2">
                        <thead class=" text-primary">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Paper ID</th>
                            <th>Verification Status</th>
                            <th>Verify</th>

                        </thead>
                        <tbody>
                            @foreach ($participants as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->paper_id }}</td>

                                @if($row->verify_status == 0)
                                <td>Not Verified</td>
                                @elseif($row->verify_status == 1)
                                <td>Verified</td>
                                @endif
                                
                                <form action="/participant/{{$row->id}}/verify" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <td>
                                        <button class="btn btn-success">VERIFY DETAILS</button>
                                    </td>
                                </form>

                                
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
        $('#datatable2').DataTable();
        $('#datatable').on('click', '.deletebtn', function(){
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            $('#delete_participant_id').val(data[0]);

            $('#delete_modal_form').attr('action', '/participant/'+data[0]);

            $('#deletemodalpop').modal('show');
        });
} );
</script>
@endsection