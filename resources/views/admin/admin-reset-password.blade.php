@extends('layouts.app')

@section('title') Admin @endsection

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
            <h1>Reset Admin Password</h1>
            <p>
              <a href="{{ route('admin.admins') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Admin Management</a>
            </p>
            @include('includes.all')
            @include('includes.errors')
            <form action="{{ route('admin.reset.password.admin.post') }}" method="POST" autocomplete="off">
              @csrf
              <input type="hidden" name="admin_id" value="{{ $admin != null ? $admin->id : '' }}">
              <div class="form-group">
                <p>Admin Name: <strong>{{ $admin->firstname . ' ' . $admin->lastname }}</strong></p>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter New Password" required>
                  </div>
                  <div class="form-group">
                    <label>Password Confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm New Password" required="">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-warning">Reset Admin Password</button>
              </div>
            </form>
          </div>
        </div>
    </div>
@endsection
 