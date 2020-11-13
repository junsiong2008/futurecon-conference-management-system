@extends('layouts.master')


@section('title')
Payment
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Payment</h4>
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
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Pay By</th>
                            <th>Verify</th>
                            <th>Receipt</th>
                        </thead>
                        <tbody>
                            @foreach ($payment as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->participant->name }}</td>
                                <td>{{ $row->payment_amount }}</td>
                                @if($row->payment_status == 0)
                                <td>Not Paid</td>
                                @elseif($row->payment_status==1)
                                <td>Paid</td>
                                @endif

                                @if($row->pay_by == 0)
                                <td>Individual</td>
                                @elseif($row->pay_by == 1)
                                <td>Organization</td>
                                @endif
                                

                                <form action="/payment/{{$row->id}}/verify" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <td>
                                        <button class="btn btn-success">VERIFY PAID</button>
                                    </td>
                                </form>
                                <td>
                                    @if(isset($row->paymentImg))
                                    <a class="btn btn-primary" href="{{ url('storage/'.$row->paymentImg) }}">View Receipt</a>
                                    @endif
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
} );
</script>
@endsection