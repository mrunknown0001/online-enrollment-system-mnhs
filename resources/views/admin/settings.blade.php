@extends('layouts.app')

@section('title') Settings @endsection

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
        <h1>Settings</h1>
        @include('includes.all')
        <p class="">Enrollment is {{ $setting->enrollment == 1 ? 'Active.' : 'Inactive.' }}</p>
      </div>
      <div class="col-md-12">
        <p>
          <strong>Academic Year:</strong>
          {{ date('Y') . '-' . (date('Y') + 1) }}
        </p>
      </div>
      <div class="col-md-12">
        <form action="{{ route('admin.enrollment.toggle') }}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="enrollment" value="{{ $setting->enrollment }}">
          <div class="form-group">
            @if($setting->enrollment == 0)
              <button type="submit" class="btn btn-primary">Turn On Enrollment</button>
            @else
              <button type="submit" class="btn btn-danger">Close Enrollment</button>
            @endif
          </div>
        </form>
      </div>
      <div class="col-md-12">
        <p>
          <strong>Enrollment Setting for Senior High</strong>
        </p>
        <p>
          Selected Semester: {{ $setting->semester == 1 ? 'First Semester' : 'Second Semester' }}
        </p>
        <p>
          <form action="{{ route('admin.semester.toggle') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="semester" value="{{ $setting->semester }}">
            <button class="btn btn-primary">{{ $setting->semester == 1 ? 'Select Second Semester' : 'Select First Semester' }}</button>
          </form>
        </p>
      </div>
    </div>
  </div>
@endsection
 