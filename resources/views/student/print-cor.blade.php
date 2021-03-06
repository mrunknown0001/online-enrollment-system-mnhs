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
          <h1>Print COR</h1>
        </div>
        <div class="col-md-12">
          @include('includes.all')
          
          
          @if(count($subjects) > 0)
            <div id="printArea">
              <div class="row">
                <div class="col-md-12">
                  @include('includes.print-header')
                  <h5 class="text-center">Certificate of Registration</h5>
                </div>
                <div class="col-md-6">
                  <h5>Student Name: {{ $student->lastname . ', ' . $student->firstname . ' ' . $student->middlename }}</h5>
                  <h5>LRN: {{ $student->student_number }}</h5>
                  <h5>Grade {{ $section->grade_level }} - {{ $section->name }}</h5>
                  <h5>School Year: {{ $student_section->school_year }}</h5>
                </div>
                <div class="col-md-6">
                  @if($student->info->grade_level == 11 || $student->info->grade_level == 12)
                    <h5>{{ $strand != NULL ? $strand->name : '' }}</h5>
                    <h5>{{ $student_section->semester == 1 ? '1st' : '2nd' }} Semester</h5>
                  @endif
                </div>

              </div>
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
              <div class="row">
                <div class="col-md-6">
                  @if($student_section->assessor_id != NULL)
                    <h5>Assessor Name: {{ $student_section->assessor->firstname . ' ' . $student_section->assessor->lastname }}</h5>
                  @endif
                </div>
                <div class="col-md-6">
                  Date Printed: {{ date('M d, Y h:m:i A') }}
                </div>
              </div>
            </div>
          @else
            <p class="text-center">No Subject for the Selected Grade Level</p>
          @endif
          

          <button type="button" class="btn btn-success" onclick="window.print()"><i class="fa fa-print"></i> Print</button>

        </div>
      </div>
  </div>
<script>
  alert('Enrollment Successful!');
</script>
@endsection
 