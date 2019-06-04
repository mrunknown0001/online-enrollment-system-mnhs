@extends('layouts.app')

@section('title') Reports @endsection

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
        <h1>Student Per Grade Level</h1>

        @include('includes.all')

        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <form action="{{ route('admin.list.of.student.grade.level.post') }}" method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="grade_level">Select Grade Level</label>
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
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
 