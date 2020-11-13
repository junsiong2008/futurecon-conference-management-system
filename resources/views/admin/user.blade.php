@extends('layouts.master')


@section('title')
Registered Users
@endsection


@section('content')

<div class="modal fade" id="addusermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action='/user' method="POST">

                @csrf

                <div class="modal-body">

                    <div class="form-group">
                        <label for="name" class="col-form-label">Name:</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password:</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="col-form-label">Confirm Password:</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            id="password_confirmation">
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
                <h5 class="modal-title" id="exampleModalLabel">Delete admin user (committee)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="delete_modal_form" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <input type="hidden" id="delete_user_id">
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
                <h4 class="card-title">Registered Users</h4>
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
                    data-target="#addusermodal">ADD</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="datatable">
                        <thead class=" text-primary">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>
                                    <a href="/user/{{$row->id}}/edit" class="btn btn-success">EDIT</a>
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

            $('#delete_user_id').val(data[0]);

            $('#delete_modal_form').attr('action', '/user/'+data[0]);

            $('#deletemodalpop').modal('show');
        });
} );
</script>
@endsection