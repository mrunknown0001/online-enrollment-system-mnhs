@extends('layouts.app')

@section('title') COR @endsection

@section('sidebar')
    @include('faculty.includes.sidebar')
@endsection

@section('header')
    @include('faculty.includes.header')
@endsection

@section('content')
  <div class="section-admin container-fluid">
    <div class="row">
      <div class="col-md-12">
        <br><br><br>
        @include('includes.all')
        <div class="alert alert-success text-center top-space">
          <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <b>{{ $message }}</b>
        </div>
        <p>
          <button type="button" id="printButton" class="btn btn-success hidden-on-print" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
        </p>
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
              <h5>SY: {{ $enrolled_counter->academic_year }}</h5>
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

          @if(count($subjects) > 0)
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
             <div class="row">
                <div class="col-md-6">
                  <h5>Assessor Name: {{ $student_section->assessor->firstname . ' ' . $student_section->assessor->lastname }}</h5>
                </div>
                <div class="col-md-6">
                  Date Printed: {{ date('M d, Y h:m:i A') }}
                </div>
              </div>
          @else
            <p class="text-center">No Subject for the Selected Grade Level</p>
          @endif
        </div>
        

        <p><a href="{{ route('faculty.register.choose.grade') }}" class="btn btn-success hidden-on-print" onclick="alert('Student COR Saved!')"><i class="fa fa-print"></i> Save</a></p>


      </div>
    </div>
  </div>
@endsection
 