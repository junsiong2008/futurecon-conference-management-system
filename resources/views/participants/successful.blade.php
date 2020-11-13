@extends('layouts.form')
@section('content')
<!-- Page Content -->
<div class="container">
    <div class="progress ">
        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
            style="width:100%">
            <span class="sr-only">100% Complete</span>
        </div>
    </div>
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="display-3">Thank You!</h1>
            <p class="lead">We've received your registration. We will send you an email once we've verified your
                email and paper
                ID.</p>
            <hr>

            <p class="lead">
                <a class="btn btn-primary btn-sm" href="/home" role="button">Continue to homepage</a>
            </p>


        </div>
    </div>
    @endsection