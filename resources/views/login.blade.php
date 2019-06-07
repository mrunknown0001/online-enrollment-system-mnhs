@extends('layouts.guest')

@section('title') Login @endsection

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
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
          <div class="text-center m-b-md custom-login">
            <img src="{{ asset('images/logo.png') }}" width="80px">
            <h4>Login</h4>
            <p></p>
          </div>
          <div class="hpanel">
            <div class="panel-body">
              @include('includes.all')
              <form action="{{ route('login.post') }}" method="POST" id="loginForm" autocomplete="off">
                @csrf
                <div class="form-group">
                  <label class=control-label for="user_type">Select User</label>
                  <select name="user_type" id="user_type" class="form-control">
                    <option value="3">Student</option>
                    <option value="2">Faculty</option>
                    <option value="1">Admin</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label" for="identification">LRN/ID Number</label>
                  {{-- <div class="input-group"> --}}
                    {{-- <span class="input-group-addon" id="basic-addon1">LRN-300970</span> --}}
                    <input type="text" name="identification" id="identification" class="form-control" placeholder="LRN/ID Number" aria-describedby="basic-addon1" autofocus>
                  {{-- </div> --}}
                  <span class="help-block small">LRN for Student / ID Number for Employee</span>
                </div>
                <div class="form-group">
                  <label class="control-label" for="password">Password</label>
                  <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                  <span class="help-block small">Your strong password</span>
                </div>
                <div class="checkbox login-checkbox">
                  <label>
                    <input type="checkbox" name="remember_me" value="1" class="i-checks"> Remember me 
                  </label>
                  <p class="help-block small">(if this is a private computer)</p>
                </div>
                <button type="submit" class="btn btn-success btn-block loginbtn">Login</button>
                {{-- <a class="btn btn-default btn-block" href="{{ route('register') }}">Register</a> --}}
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
      </div>
      <div class="row">
        <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 text-center">
          {{-- <p>Copyright &copy; {{ date('Y') }} <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p> --}}
        </div>
      </div>
    </div>
@endsection
