@extends('layouts.master')

@section('title')
Registered Participants
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Registered Participant</h3>
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
                    <form action="/participant/{{ $participant->id }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $participant->name }}">
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ $participant->email }}">
                        </div>

                        <div class="form-group">
                            <label>Organization</label>
                            <input type="text" name="organization" class="form-control"
                                value="{{ $participant->organization }}">
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone_num" class="form-control"
                                value="{{ $participant->phone_num }}">
                        </div>

                        <div class="form-group">
                            <label for="member_type">Member Type:</label><br />
                            <div class="custom-control custom-radio">
                                <input id="non-ieee-member" name="member_type" type="radio" class="custom-control-input"
                                    value="0"
                                    {{{ (isset($participant->member_type) && $participant->member_type == '0') ? "checked" : ""}}}
                                    required>
                                <label class="custom-control-label" for="non-ieee-member">Non-IEEE Member</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="ieee-member" name="member_type" type="radio" class="custom-control-input"
                                    value="1"
                                    {{{ (isset($participant->member_type) && $participant->member_type == '1') ? "checked" : ""}}}
                                    required>
                                <label class="custom-control-label" for="ieee-member">IEEE Member</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="student" name="member_type" type="radio" class="custom-control-input"
                                    value="2"
                                    {{{ (isset($participant->member_type) && $participant->member_type == '2') ? "checked" : ""}}}
                                    required>
                                <label class="custom-control-label" for="student">Student</label>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="track_id">Track:</label>
                            <div class="custom-control custom-radio">
                                <input id="track-1" name="track_id" type="radio" class="custom-control-input" value="1"
                                    {{{ (isset($participant->track_id) && $participant->track_id == '1') ? "checked" : ""}}}>
                                <label class="custom-control-label" for="track-1">Track 1: Industry 4.0 and
                                    Beyond</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="track-2" name="track_id" type="radio" class="custom-control-input" value="2"
                                    {{{ (isset($participant->track_id) && $participant->track_id == '2') ? "checked" : ""}}}>
                                <label class="custom-control-label" for="track-2">Track 2: Business Informatics and
                                    Industry
                                    4.0</label>
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
                                <label class="custom-control-label" for="track-4">Track 4: Communication Networks and
                                    Industry
                                    4.0</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Paper ID</label>
                            <input type="text" name="paper_id" class="form-control"
                                value="{{ $participant->paper_id }}">
                        </div>

                        <div class="form-group">
                            <label for="present_method">Present:</label>
                            <div class="custom-control custom-radio">
                                <input id="physically" name="present_method" type="radio" class="custom-control-input"
                                    value="0"
                                    {{{ (isset($participant->present_method) && $participant->present_method == '0') ? "checked" : ""}}}
                                    required>
                                <label class="custom-control-label" for="physically">Physically</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="online" name="present_method" type="radio" class="custom-control-input"
                                    value="1"
                                    {{{ (isset($participant->present_method) && $participant->present_method == '1') ? "checked" : ""}}}
                                    required>
                                <label class="custom-control-label" for="online">Online</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="/participant" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('scripts')

@endsection