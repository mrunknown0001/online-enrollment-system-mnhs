@extends('layouts.app')

@section('title') Student @endsection

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
            <h1>Reset Student Password</h1>
            <p>
              <a href="{{ route('admin.students') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Students</a>
            </p>
            @include('includes.all')
            @include('includes.errors')
            <form action="{{ route('admin.reset.student.password.post') }}" method="POST" autocomplete="off">
              @csrf
              <input type="hidden" name="student_id" value="{{ $student != null ? $student->id : '' }}">
              <div class="form-group">
                <p>Student Name: <strong>{{ $student->firstname . ' ' . $student->lastname . ' - ' . $student->student_number }}</strong></p>
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
                <button type="submit" class="btn btn-warning">Reset Student Password</button>
              </div>
            </form>
          </div>
        </div>
    </div>
@endsection
 