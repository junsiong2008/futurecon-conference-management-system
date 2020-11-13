@extends('layouts.form')

@section('content')

<h3>Review Attendee Information - Step 3</h3>
@if(isset($payment->paymentimg))
<img alt="Payment Receipt" src="/storage/productImg/{{$payment->productImg}}" />
@endif
<form action="/participants/store" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <table class="table">
        <tr>
            <td>Name:</td>
            <td><strong>{{ $participant->name }}</strong></td>
        </tr>
        <tr>
            <td>Email Address:</td>
            <td><strong>{{ $participant->email }}</strong></td>
        </tr>
        <tr>
            <td>Organization:</td>
            <td><strong>{{ $participant->organization }}</strong></td>
        </tr>
        <tr>
            <td>Phone Number:</td>
            <td><strong>{{ $participant->phone_num }}</strong></td>
        </tr>
        <tr>
            <td>Member Type:</td>
            @if($participant->member_type == 0)
            <td><strong>Non-IEEE Member</strong></td>
            @elseif($participant->member_type == 1)
            <td><strong>IEEE Member</strong></td>
            @elseif($participant->member_type == 2)
            <td><strong>Student</strong></td>
            @endif
        </tr>

        <tr>
            <td>Track:</td>
            @if($participant->track_id == 1)
            <td><strong>Track 1: Industry 4.0 and Beyond</strong></td>
            @elseif($participant->track_id == 2)
            <td><strong>Track 2: Business Informatics and Industry 4.0</strong></td>
            @elseif($participant->track_id == 3)
            <td><strong>Track 3: Software System and Emerging Technologies</strong></td>
            @elseif($participant->track_id == 4)
            <td><strong>Track 4: Communication Networks and Industry 4.0</strong></td>
            @endif
        </tr>
        <tr>
            <td>Paper ID:</td>
            <td><strong>{{ $participant->paper_id }}</strong></td>
        </tr>
        <tr>
            <td>Present:</td>
            @if($participant->present_method == 0)
            <td><strong>Physically</strong></td>
            @elseif($participant->present_method == 1)
            <td><strong>Online</strong></td>
            @endif
        </tr>

        <tr>
            <td>Total Amount:</td>
            @if($participant->member_type == 0)
            <td>2200</td>
            @elseif($participant->member_type == 1)
            <td>2000</td>
            @elseif($participant->member_type == 2)
            <td>1600</td>
            @endif
        </tr>
    </table>
    <div class="form-group">
        <label for="pay_by">Pay by:</label><br />
        <div class="custom-control custom-radio">
            <input id="individual" name="pay_by" type="radio" class="custom-control-input" value="0"
                {{{ (isset($payment->pay_by) && $payment->pay_by == '0') ? "checked" : ""}}} required>
            <label class="custom-control-label" for="individual">Individual</label>
        </div>
        <div class="custom-control custom-radio">
            <input id="organization" name="pay_by" type="radio" class="custom-control-input" value="1"
                {{{ (isset($payment->pay_by) && $payment->pay_by == '1') ? "checked" : ""}}} required>
            <label class="custom-control-label" for="organization">Organization</label>
        </div>

    </div>

    <div class="form-group">
        <label for="payment_status">Payment Method:</label><br />
        <div class="custom-control custom-radio">
            <input id="not_paid" name="payment_status" type="radio" value="0" class="payment_radio custom-control-input"
                required>
            <label class="custom-control-label" for="not_paid">On-site payment</label>
        </div>
        <div class="custom-control custom-radio">
            <input id="paid" name="payment_status" type="radio" value="1" class="payment_radio custom-control-input"
                required>
            <label class="custom-control-label" for="paid">Online Banking / Bank Transfer</label>
        </div>

    </div>

    <div class="form-group upload_proof">
        <label>Please upload a receipt of your payment</label>
        <input type="file" {{ (!empty($payment->productImg)) ? "disabled" : ''}} class="form-control-file"
            name="paymentImg" id="paymentImg" aria-describedby="fileHelp">
        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be
            more than 2MB.</small>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <a type="button" href="/participants/create-step2" class="btn btn-warning">Back</a>
    <button type="submit" class="btn btn-primary">Confirm</button>
</form>


@push('head')
<!-- jQuery cdn-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- Scripts -->
<script src="{{ asset('js/showInput.js')}}"></script>
@endpush

@endsection