@extends('layouts.app')

@section('title') Profile @endsection

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
          <h1>Profile</h1>
        </div>
        <div class="col-md-6 col-md-offset-3">
          @include('includes.all')
          <form action="{{ route('admin.profile.update') }}" method="POST" autocomplete="off">
            {{ csrf_field() }}
            <div class="row">
              <div class="form-group col-md-6">
                <label for="firstname">Enter Firstname</label>
                <input type="text" name="firstname" id="firstname" value="{{ Auth::user()->firstname != null ? Auth::user()->firstname : '' }}" class="form-control" placeholder="Enter Firstname" required>
                @if ($errors->has('firstname'))
                  <span class="invalid-feedback text-red" role="alert">
                    <strong>{{ $errors->first('firstname') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label for="lastname">Enter Lastname</label>
                <input type="text" name="lastname" id="lastname" value="{{ Auth::user()->lastname != null ? Auth::user()->lastname : '' }}" class="form-control" placeholder="Enter Lastname" required>
                @if ($errors->has('lastname'))
                  <span class="invalid-feedback text-red" role="alert">
                    <strong>{{ $errors->first('lastname') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="employee_id">Employee ID</label>
              <input type="text" name="employee_id" id="employee_id" value="{{ Auth::user()->employee_id != null ? Auth::user()->employee_id : '' }}" class="form-control" placeholder="Employee ID" readonly="">
            </div>
            <div class="form-group">
              <label for="email">Enter Email</label>
              <input type="email" name="email" id="email" value="{{ Auth::user()->email != null ? Auth::user()->email : '' }}" class="form-control" placeholder="Enter Email">
              @if ($errors->has('email'))
                <span class="invalid-feedback text-red" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="mobile_number">Enter Mobile Number</label>
              <input type="number" name="mobile_number" id="mobile_number" value="{{ Auth::user()->mobile_number != null ? Auth::user()->mobile_number : '' }}" class="form-control" placeholder="Enter Mobile number">
              @if ($errors->has('mobile_number'))
                <span class="invalid-feedback text-red" role="alert">
                  <strong>{{ $errors->first('mobile_number') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Update Profile</button>
              <a href="{{ route('admin.password') }}" class="btn btn-primary">Change Password</a>
            </div>
          </form>
        </div>
      </div>
  </div>
@endsection
 