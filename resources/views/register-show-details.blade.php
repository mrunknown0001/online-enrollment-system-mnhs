@extends('layouts.guest')

@section('title') Register @endsection

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
                </div>
            </div>
        </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
            <div class="text-center custom-login">
                <h3>Online Registration</h3>
                <h3><small>Student Details</small></h3>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                    @include('includes.all')
                    <p>{{ $student->student_number }}</p>
                    <p>{{ $student->firstname . ' ' . $student->lastname }}</p>
                    <div class="">
                        <a href="{{ route('login') }}">Click Here to Login</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
    </div>
</div>

@endsection
