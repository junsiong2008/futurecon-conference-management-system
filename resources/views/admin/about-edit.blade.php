@extends('layouts.master')

@section('title')
About
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit About Section</h3>
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
                    <form action="/about/{{ $about->id }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control"
                                value="{{ $about->description }}">
                        </div>

                        <div class="form-group">
                            <label>Venue</label>
                            <input type="text" name="venue" class="form-control" value="{{ $about->venue }}">
                        </div>

                        <div class="form-group">
                            <label>Date</label>
                            <input type="text" name="date" class="form-control" value="{{ $about->date }}">
                        </div>

                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="/about" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

@endsections