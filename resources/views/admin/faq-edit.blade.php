@extends('layouts.master')

@section('title')
Faq
@endsection

@section('content')
<style>
    textarea {
        height: auto;

    }

    textarea.form-control {
        max-height: 100%;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Faq</h3>
                </div>
                <div class="card-body">
                    <form action="/faq/{{ $faq->id }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>Question</label>
                            <input type="text" name="question" class="form-control" value="{{ $faq->question }}">
                        </div>

                        <div class="form-group">
                            <label>Answer</label>
                            <textarea name="answer" class="form-control" rows="10">{{ $faq->answer }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="/faq" class="btn btn-danger">Cancel</a>
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