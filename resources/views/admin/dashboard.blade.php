@extends('layouts.master')


@section('title')
Committee Dashboard
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Dashboard</h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                You are logged in!
                <img src="https://pbs.twimg.com/media/DqMnM7kWoAAjYjg.jpg" alt="">
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection