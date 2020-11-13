@extends('layouts.form')

@section('content')
<div class="container">
    <h1>Attendee Registration - Step 1</h1>
    <hr>
    <form action="/participants/create-step1" method=post>
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Full Name</label>
            {{-- {{ dd($participant) }} --}}
            <input type="text" value="{{{ session()->get('participant.name') }}}" class="form-control" id="taskTitle"
                name="name">
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" value="{{{ session()->get('participant.email') }}}" class="form-control" id="taskTitle"
                placeholder="name@example.com" name="email">
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" value="{{{ session()->get('participant.phone_num') }}}" class="form-control" id="phone"
                placeholder="Enter phone number" name="phone_num">
        </div>
        <div class="form-group">
            <label for="organization">Organization</label>
            <input type="text" value="{{{ session()->get('participant.organization')  }}}" class="form-control"
                id="organization" placeholder="Enter organization name" name="organization">
        </div>

        <div class="form-group">
            <label for="track_id">Present:</label>
            <div class="custom-control custom-radio">
                <input id="track-1" name="track_id" type="radio" class="custom-control-input" value="1"
                    {{{ (isset($participant->track_id) && $participant->track_id == '1') ? "checked" : ""}}}>
                <label class="custom-control-label" for="track-1">Track 1: Industry 4.0 and Beyond</label>
            </div>
            <div class="custom-control custom-radio">
                <input id="track-2" name="track_id" type="radio" class="custom-control-input" value="2"
                    {{{ (isset($participant->track_id) && $participant->track_id == '2') ? "checked" : ""}}}>
                <label class="custom-control-label" for="track-2">Track 2: Business Informatics and Industry 4.0</label>
            </div>
            <div class="custom-control custom-radio">
                <input id="track-3" name="track_id" type="radio" class="custom-control-input" value="3"
                    {{{ (isset($participant->track_id) && $participant->track_id == '3') ? "checked" : ""}}}>
                <label class="custom-control-label" for="track-3">Track 3: Software System and Emerging
                    Technologies</label>
            </div>

            <div class="custom-control custom-radio">
                <input id="track-4" name="track_id" type="radio" class="custom-control-input" value="4"
                    {{{ (isset($participant->track_id) && $participant->track_id == '4') ? "checked" : ""}}}>
                <label class="custom-control-label" for="track-4">Track 4: Communication Networks and Industry
                    4.0</label>
            </div>
        </div>

        <div class="form-group">
            <label for="paper_id">Paper ID</label>
            <input type="text" class="form-control" value="{{{ session()->get('participant.paper_id') }}}" id="paper_id"
                placeholder="Enter the paper ID of your conference paper" name="paper_id">
        </div>


        <div class="form-group">
            <label for="member_type">Member Type:</label><br />
            <div class="custom-control custom-radio">
                <input id="non-ieee-member" name="member_type" type="radio" class="custom-control-input" value="0"
                    {{{ (isset($participant->member_type) && $participant->member_type == '0') ? "checked" : ""}}}
                    required>
                <label class="custom-control-label" for="non-ieee-member">Non-IEEE Member</label>
            </div>
            <div class="custom-control custom-radio">
                <input id="ieee-member" name="member_type" type="radio" class="custom-control-input" value="1"
                    {{{ (isset($participant->member_type) && $participant->member_type == '1') ? "checked" : ""}}}
                    required>
                <label class="custom-control-label" for="ieee-member">IEEE Member</label>
            </div>
            <div class="custom-control custom-radio">
                <input id="student" name="member_type" type="radio" class="custom-control-input" value="2"
                    {{{ (isset($participant->member_type) && $participant->member_type == '2') ? "checked" : ""}}}
                    required>
                <label class="custom-control-label" for="student">Student</label>
            </div>

        </div>
        <br>

        <div class="form-group">
            <label for="present_method">Present:</label>
            <div class="custom-control custom-radio">
                <input id="physically" name="present_method" type="radio" class="custom-control-input" value="0"
                    {{{ (isset($participant->present_method) && $participant->present_method == '0') ? "checked" : ""}}}
                    required>
                <label class="custom-control-label" for="physically">Physically</label>
            </div>
            <div class="custom-control custom-radio">
                <input id="online" name="present_method" type="radio" class="custom-control-input" value="1"
                    {{{ (isset($participant->present_method) && $participant->present_method == '1') ? "checked" : ""}}}
                    required>
                <label class="custom-control-label" for="online">Online</label>
            </div>
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
        <button type="submit" class="btn btn-primary">Continue</button>

</div>



</form>

@endsection