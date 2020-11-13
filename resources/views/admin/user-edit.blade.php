@extends('layouts.master')

@section('title')
Registered Users
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Registered User</h3>
                </div>
                <div class="card-body">
                    <form action="/user/{{ $user->id }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="/user" class="btn btn-danger">Cancel</a>
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