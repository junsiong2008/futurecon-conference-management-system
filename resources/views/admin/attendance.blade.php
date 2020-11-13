@extends('layouts.master')


@section('title')
Attendance
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Attendance</h4>
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
                            <th>Participant</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($attendance as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->participant->name }}</td>
                                
                                @if($row->attendance_status == 0)
                                <td>Not Attend</td>
                                <form action="/attendance/{{$row->id}}/verify" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <td>
                                        <button class="btn btn-success">MARK ATTEND</button>
                                    </td>
                                </form>
                                @elseif($row->attendance_status==1)
                                <td>Attend</td>
                                <form action="/attendance/{{$row->id}}/verify" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <td>
                                        <button class="btn btn-danger">MARK UNATTEND</button>
                                    </td>
                                </form>
                                @endif                        

                                
                                
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