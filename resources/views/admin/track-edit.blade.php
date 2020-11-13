@extends('layouts.master')

@section('title')
Track
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Track</h3>
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
                    <form action="/track/{{ $track->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>Track Name</label>
                            <input type="text" name="track_name" class="form-control" value="{{ $track->track_name }}">
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="/track" class="btn btn-danger">Cancel</a>
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