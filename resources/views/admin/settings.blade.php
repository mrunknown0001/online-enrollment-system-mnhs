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
          {{ !empty($sy) ? $sy->from . '-' . $sy->to : 'N/A' }}
        </p>
      </div>
      <div class="col-md-12">
        @if($setting->enrollment == 0)
          <div class="row">
            @if(empty($sy))
              <div class="col-md-6">
                <form action="{{ route('admin.sy.activate.selected') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="school_year">School Year To Activate</label>
                    <select name="school_year" id="school_year" class="form-control" required>
                      <option value="">Select School Year</option>
                      @if(count($sys) > 0)
                        @foreach($sys as $s)
                          <option value="{{ $s->id }}">{{ $s->from . '-' . $s->to }}</option>
                        @endforeach
                      @endif
                    </select>
                  </div>
                  <div class="form-group">

                    <button type="submit" class="btn btn-primary">Active Selected</button>
                  </div>
                </form>
              </div>
              <div class="col-md-12">
                <hr>
              </div>
            @endif
            <div class="col-md-12">
              <form action="{{ route('admin.enrollment.toggle') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="enrollment" value="{{ $setting->enrollment }}">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Turn On Enrollment</button>
                </div>
              </form>
            </div>
          </div>
        @else
          <div class="row">
            <div class="col-md-12">
              <form action="{{ route('admin.enrollment.toggle') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="enrollment" value="{{ $setting->enrollment }}">
                <div class="form-group">
                  <button type="submit" class="btn btn-danger">Close Enrollment</button>
                </div>
              </form>
            </div>
          </div>
        @endif
      </div>
      <div class="col-md-12">
        <h3>Enrollment Setting for Senior High</h3>
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

      @if(!empty($sy))
        <div class="col-md-12">
          <p><strong>Close School Year</strong></p>
          <form action="{{ route('admin.close.school.year') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <button type="submit" class="btn btn-warning">Close School Year</button>
            </div>
          </form>
        </div>
      @endif
    </div>
  </div>
@endsection
 