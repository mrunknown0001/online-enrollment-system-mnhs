@extends('layouts.app')

@section('title') Enrollment @endsection

@section('sidebar')
  @include('student.includes.sidebar')
@endsection

@section('header')
  @include('student.includes.header')
@endsection

@section('content')
  <div class="section-admin container-fluid">
      <div class="row">
        <div class="col-md-12">
          <br><br><br>
          <h1>Enrollment</h1>
        </div>
        <div class="col-md-6 col-md-offset-3">
          @include('includes.all')

          @if($enrollment->enrollment == 1)
            <form action="{{ route('student.enrollment.select.grade.level') }}" method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                <select class="form-control" name="grade_level" id="grade_level" required>
                  <option value="">Select Grade Level</option>
                  <option value="7">Grade 7</option>
                  <option value="8">Grade 8</option>
                  <option value="9">Grade 9</option>
                  <option value="10">Grade 10</option>
                  <option value="11">Grade 11</option>
                  <option value="12">Grade 12</option>
                </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Continue</button>
              </div>
            </form>
          @else
            <p class="text-center"><strong>Enrollment is Not Active</strong></p>
          @endif
          
        </div>
      </div>
  </div>
@endsection
 