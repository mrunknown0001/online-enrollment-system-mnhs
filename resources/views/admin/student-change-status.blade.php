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
            <h1>Student Change Status</h1>
            <p>
              <a href="{{ route('admin.students') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Students</a>
            </p>
            @include('includes.all')
            @include('includes.errors')
            <form action="{{ route('admin.update.student.status.post') }}" method="POST" autocomplete="off">
              @csrf
              <input type="hidden" name="student_id" value="{{ $student != null ? $student->id : '' }}">
              <div class="form-group">
                <p>Student Name: <strong>{{ $student->firstname . ' ' . $student->lastname . ' - ' . $student->student_number }}</strong></p>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" id="status" required>
                      <option value="">Select Status</option>
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                      <option value="Graduate">Graduate</option>
                      <option value="Transfered">Transfered</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-info">Update Student Status</button>
              </div>
            </form>
          </div>
        </div>
    </div>
@endsection
 