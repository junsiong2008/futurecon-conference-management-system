@extends('layouts.master')

@section('title')
Fee
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Fee Section</h3>
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
                    <form action="/fee/{{ $fee->id }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $fee->title }}">
                        </div>

                        <div class="form-group">
                            <label>Desccription</label>
                            <input type="text" name="description" class="form-control" value="{{ $fee->description }}">
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" value="{{ $fee->price }}">
                        </div>

                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="/fee" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

@endsections