@extends('layouts.app')

@section('title') Faculty @endsection

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
            <h1>Reset Faculty Password</h1>
            <p>
              <a href="{{ route('admin.faculties') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Faculty Management</a>
            </p>
            @include('includes.all')
            @include('includes.errors')
            <form action="{{ route('admin.faculty.reset.password.post') }}" method="POST" autocomplete="off">
              @csrf
              <input type="hidden" name="faculty_id" value="{{ $faculty != null ? $faculty->id : '' }}">
              <div class="form-group">
                <p>Faculty Name: <strong>{{ $faculty->firstname . ' ' . $faculty->lastname }}</strong></p>
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
                <button type="submit" class="btn btn-warning">Reset Faculty Password</button>
              </div>
            </form>
          </div>
        </div>
    </div>
@endsection
 