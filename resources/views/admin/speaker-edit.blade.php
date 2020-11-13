@extends('layouts.master')

@section('title')
Speaker
@endsection

@section('content')
<style>
    .form-group input[type=file] {
        opacity: 100;
        position: relative;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Speaker</h3>
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
                    <form action="/speaker/{{ $speaker->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>Speaker Name</label>
                            <input type="text" name="speaker_name" class="form-control"
                                value="{{ $speaker->speaker_name }}">
                        </div>

                        <div class="form-group">
                            <label for="speakerImg" class="col-form-label">Image:</label>
                            <input type="file" name="speakerImg" class="form-control-file" id="speakerImg">
                            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of
                                image should not be
                                more than 2MB.</small>
                        </div>

                        <div class="form-group">
                            <label>Bio</label>
                            <input type="text" name="speaker_bio" class="form-control"
                                value="{{ $speaker->speaker_bio }}">
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="speaker_email" class="form-control"
                                value="{{ $speaker->speaker_email }}">
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="/speaker" class="btn btn-danger">Cancel</a>
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