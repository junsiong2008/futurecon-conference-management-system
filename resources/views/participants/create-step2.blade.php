@extends('layouts.form')

@section('content')


<!-- Page Content -->
<div class="container">
    <div class="progress ">
        <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"
            style="width:33.33%">
            <span class="sr-only">33% Complete</span>
        </div>
    </div>
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="font-weight-light">Participant Registration</h1>

            <form action="/participants/create-step2" method="post">
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



                </table>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <a type="button" href="/participants/create-step1" class="btn btn-warning">Back</a>
                <button type="submit" class="btn btn-primary">Continue</button>
            </form>
        </div>
    </div>
</div>

@endsection