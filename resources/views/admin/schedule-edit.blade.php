@extends('layouts.master')

@section('title')
Schedule
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Schedule</h3>
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
                    <form action="/schedule/{{ $schedule->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $schedule->title }}">
                        </div>


                        <div class="form-group">
                            <label>Subtitle</label>
                            <input type="text" name="subtitle" class="form-control" value="{{ $schedule->subtitle }}">
                        </div>

                        <div class="form-group">
                            <label for="start_time" class="col-form-label">Start Time</label>
                            <div>
                                <input class="form-control" name="start_time" type="time" id="start_time"
                                    value="{{ $schedule->start_time }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="speaker_id">Speaker:</label>
                            <select class="form-control" id="speaker_id" name=speaker_id>
                                <option value=""></option>
                                @foreach($speakers as $speaker)
                                <option value="{{ $speaker->id }}"
                                    {{ $schedule->speaker_id == $speaker->id ? 'selected' : ''}}>
                                    {{ $speaker->speaker_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="track_id">Track:</label>
                            <select class="form-control" id="track_id" name=track_id>
                                @foreach($tracks as $track)
                                <option value="{{ $track->id }}"
                                    {{ $schedule->track_id == $track->id ? 'selected' : ''}}>
                                    {{ $track->track_name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="/schedule" class="btn btn-danger">Cancel</a>
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