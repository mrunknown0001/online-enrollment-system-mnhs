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
        <div class="col-md-12">
          <h4>Grade {{ $section->grade_level }} - {{ $section->name }}</h4>
          @include('includes.all')

          @if(count($subjects) > 0)
            
            <table class="table table-hover table-bordered table-stiped">
              <thead>
                <th>Subject Code</th>
                <th>Subject Title</th>
                <th>Room</th>
                <th>Schedule</th>
                <th>Faculty Assigned</th>
              </thead>
              <tbody>
                @foreach($subjects as $s)
                  <tr>
                    <td>{{ $s->code }}</td>
                    <td>{{ $s->title }}</td>
                    <td>{{ \App\Http\Controllers\GeneralController::get_room_name($school_year, $section->id, $s->id) }}</td>
                    <td>{{ \App\Http\Controllers\GeneralController::get_time_and_day($school_year, $section->id, $s->id) }}</td>
                    <td>{{ \App\Http\Controllers\GeneralController::faculty_assigned($school_year, $section->id, $s->id) }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @else
            <p class="text-center">No Subject for the Selected Grade Level</p>
          @endif
          
          <form action="{{ route('student.enrollment.save') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="section_id" value="{{ $section->id }}">
            <input type="hidden" name="strand_id" value="{{ $strand_id }}">
            <p>
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Enroll</button>
              <a href="{{ route('student.enrollment') }}" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
            </p>
          </form>


        </div>
      </div>
  </div>
@endsection
 