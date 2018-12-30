@extends('layouts.app')

@section('title') Password Change @endsection

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('header')
    @include('admin.includes.header')
@endsection

@section('content')
    <div class="section-admin container-fluid">
        <div class="row">
          <div class="col-md-12">
            <br><br><br>
            <h1>Password Change</h1>
          </div>
          <div class="col-md-6 col-md-offset-3">
            @include('includes.all')
            <form action="{{ route('admin.password.update') }}" method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="old_password">Enter Old Password</label>
                <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Enter Old Password" autofocus="">
                @if ($errors->has('old_password'))
                  <span class="invalid-feedback text-red" role="alert">
                    <strong>{{ $errors->first('old_password') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="password">Enter New Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter New Password">
                @if ($errors->has('password'))
                  <span class="invalid-feedback text-red" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="password_confirmation">Enter Mobile Number</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">
                @if ($errors->has('password'))
                  <span class="invalid-feedback text-red" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Change Password</button>
              </div>
            </form>
          </div>
        </div>
    </div>
@endsection
 