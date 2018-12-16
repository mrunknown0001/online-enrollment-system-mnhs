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
                {{-- <p>Admin template with very clean and aesthetic style prepared for your next app. </p> --}}
            </div>
            <div class="hpanel">
                <div class="panel-body">
                    @include('includes.all')
                    <form action="{{ route('register.post') }}" method="POST" id="loginForm" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label for="student_number">Student Number</label>
                                <input type="text" name="student_number" id="student_number" value="{{ old('student_number') }}" class="form-control" placeholder="Enter Student Number" required autofocus="">
                                <span class="help-block small">Your Student Number</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" value="" class="form-control" placeholder="Enter Password" required>
                                <span class="help-block small">Your Strong Password</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="password_confirmation">Repeat Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Re-Enter Password" required>
                                <span class="help-block small">Your Strong Password</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label id="email">Email Address</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Email Address">
                                <span class="help-block small">Your Valid Email Address</span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="email_confirmation">Repeat Email Address</label>
                                <input type="email" name="email_confirmation" id="email_confirmation" value="{{ old('email_confirmation') }}" class="form-control" placeholder="Re-Enter Email Address">
                                <span class="help-block small">Your Valid Email</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success loginbtn">Register</button>
                            <button class="btn btn-default">Cancel</button>
                        </div>
                    </form>
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
