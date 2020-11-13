@extends('layouts.master')


@section('title')
Activity Log
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Activity Log</h4>
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
                <form action="{{url('/logActivity/clear')}}" method="POST">
                    @csrf
                    <td><button type="submit" class="btn btn-danger">Clear Log</button></td>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="datatable">
                        <thead class=" text-primary">
                            <th>ID</th>
                            <th>User</th>
                            <th>Subject</th>
                            <th>URL</th>
                            <th>Method</th>
                            <th>IP</th>
                            <th>Timestamp</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($logs as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->user }}</td>
                                <td>{{ $row->subject }}</td>
                                <td>{{ $row->url }}</td>
                                <td>{{ $row->method }}</td>
                                <td>{{ $row->ip }}</td>
                                <td>{{ $row->created_at }}</td>

                                <form action="{{url('/logActivity'.'/'. $row->id ) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <td><button type=" submit" class="btn btn-danger btn-sm">DELETE</button></td>
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
} );
</script>
@endsection