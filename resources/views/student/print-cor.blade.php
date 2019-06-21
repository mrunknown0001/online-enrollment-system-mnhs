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
                  <p class="text-center">
                    Republic of the Philippines
                    <br>
                    <img src="{{ asset('images/logo.png') }}" width="60px">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Maliwalo National High School
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="{{ asset('images/deped.png') }}" width="60px">
                    <br>
                    Tarlac City
                  </p>
                  <h4 class="text-center">Certificate of Registration</h4>
                </div>
                <div class="col-md-6">
                  <h5>Student Name: {{ $student->lastname . ', ' . $student->firstname . ' ' . $student->middlename }}</h5>
                  <h5>LRN: {{ $student->student_number }}</h5>
                  <h5>Grade {{ $section->grade_level }} - {{ $section->name }}</h5>
                </div>
                <div class="col-md-6">
                  @if($student->info->grade_level == 11 || $student->info->grade_level == 12)
                    <h5>{{ $strand->name }}</h5>
                    <h5>{{ $student_section->semester == 1 ? '1st' : '2nd' }} Semester</h5>
                  @endif
                </div>
                <div class="col-md-12">
                  <h5>Assessor Name: {{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</h5>
                </div>
              </div>
              <table class="table table-hover table-bordered table-stiped">
                <thead>
                  <th>Subject Code</th>
                  <th>Subject Title</th>
                </thead>
                <tbody>
                  @foreach($subjects as $s)
                    <tr>
                      <td>{{ $s->code }}</td>
                      <td>{{ $s->title }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @else
            <p class="text-center">No Subject for the Selected Grade Level</p>
          @endif
          

          <button type="button" class="btn btn-success" onclick="window.print()"><i class="fa fa-print"></i> Print</button>

        </div>
      </div>
  </div>
@endsection
 