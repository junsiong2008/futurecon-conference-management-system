@extends('layouts.master')


@section('title')
Fee
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Fee</h4>
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
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price (RM) </th>
                            <th>Edit</th>
                        </thead>
                        <tbody>
                            @foreach ($fees as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->description }}</td>
                                <td>{{ $row->price }}</td>
                                <td>
                                    <a href="/fee/{{$row->id}}/edit" class="btn btn-success">EDIT</a>
                                    {{-- <a href="/user-edit/{{$row->id}}" class="btn btn-success">EDIT</a> --}}
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