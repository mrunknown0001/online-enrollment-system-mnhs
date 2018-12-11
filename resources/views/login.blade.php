@extends('layouts.guest')

@section('title') Login @endsection

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="back-link back-backend">
            <a href="javascript:void(0)" class="btn btn-primary">Back to Home</a>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
          <div class="text-center m-b-md custom-login">
            <h3>Login</h3>
            <p></p>
          </div>
          <div class="hpanel">
            <div class="panel-body">
              <form action="{{ route('login.post') }}" method="POST" id="loginForm" autocomplete="off">
                @csrf
                <div class="form-group">
                  <label class="control-label" for="username">Student Number</label>
                  <input type="text" placeholder="Enter Your Student Number" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                  <span class="help-block small">Your Student Number</span>
                </div>
                <div class="form-group">
                  <label class="control-label" for="password">Password</label>
                  <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                  <span class="help-block small">Yur strong password</span>
                </div>
                <div class="checkbox login-checkbox">
                  <label>
                    <input type="checkbox" class="i-checks"> Remember me 
                  </label>
                  <p class="help-block small">(if this is a private computer)</p>
                </div>
                <button class="btn btn-success btn-block loginbtn">Login</button>
                <a class="btn btn-default btn-block" href="{{ route('register') }}">Register</a>
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
