@extends('layouts.app')

@section('title') Student Schedule @endsection

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
	     @include('includes.all')
        @if($schedules != NULL)
          <br><br><br><br>
          <div id="printArea">
            @include('includes.print-header')
            <h5 class="text-center">Student Schedule</h5>
            <p>
              <button class="btn btn-primary hidden-on-print" onclick="window.print()"><i class="fa fa-print hidden-on-print"></i></button>
            </p>
            <div class="row">
              <div class="col-md-6">
                <h5>Student Name: {{ $student->lastname . ', ' . $student->firstname . ' ' . $student->middlename }}</h5>
                <h5>LRN: {{ $student->student_number }}</h5>
              </div>
            </div>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <th>Subject</th>
                    <th>Room</th>
                    <th>Day</th>
                    <th>Time</th>
                </thead>
                <tbody>
                  @foreach($schedules as $s)
                    <tr>
                      <td>{{ $s['subject'] }}</td>
                      <td>{{ $s['room'] }}</td>
                      <td>{{ $s['day'] }}</td>
                      <td>
                          {{ $s['start_time'] }} - {{ $s['end_time'] }}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        @else 
          <p class="text-center">NO Schedules Available.</p>
        @endif
    </div>
  </div>
</div>
@endsection
 