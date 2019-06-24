@extends('layouts.app')

@section('title') Enrollment History @endsection

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
          <div id="printArea">
            @include('includes.print-header')
            <h5 class="text-center">Certificate of Registration</h5>
            
            <h5>{{ Auth::user()->lastname . ', ' . Auth::user()->firstname . ' ' . Auth::user()->middlename }}</h5>
            <h5>{{ Auth::user()->student_number }}</h5>
            <h5>Grade {{ $section->grade_level }} - {{ $section->name }}</h5>
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
                    <td>{{ \App\Http\Controllers\GeneralController::get_room_name($student_section->school_year, $student_section->section_id, $s->id) }}</td>
                    <td>{{ \App\Http\Controllers\GeneralController::get_time_and_day($student_section->school_year, $student_section->section_id, $s->id) }}</td>
                    <td>{{ \App\Http\Controllers\GeneralController::faculty_assigned($student_section->school_year, $student_section->section_id, $s->id) }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <button type="button" class="btn btn-success" onclick="window.print()"><i class="fa fa-print"></i> Print</button>

        </div>
      </div>
  </div>
@endsection
 