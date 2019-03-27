@extends('layouts.app')

@section('title') Student Details @endsection

@section('sidebar')
    @include('faculty.includes.sidebar')
@endsection

@section('header')
    @include('faculty.includes.header')
@endsection

@section('content')
    <div class="section-admin container-fluid">

      <br><br><br>
      <div class="row">
        <div class="col-md-12">
          <h1>Student Details</h1>
          @include('includes.all')
          <p>
            <a href="{{ route('faculty.assigned.subjects') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Subject Assigned</a>
          </p>
          <p>Fullname: <strong>{{ $student->lastname }}, {{ $student->firstname }} {{ $student->middlename }} {{ $student->prefix }}</strong></p>
          <p>LRN: <strong>{{ $student->student_number }}</strong></p>
          <p>Grade &amp; Section: Grade <strong>{{ $student->student_section->section->grade_level . ' - ' . $student->student_section->section->name }}</strong></p>
          <p>Gender: <strong>{{ $student->info->gender }}</strong></p>
          <p>Nataionality: <strong>{{ $student->info->nationality }}</strong></p>
          <p>Birthday: <strong>{{ $student->info->birthday }}</strong></p>
          <p>Email Address: <strong>{{ $student->info->email }}</strong></p>
          <p>Father's Name: <strong>{{ ucwords($student->info->father) }}</strong></p>
          <p>Mother's Name: <strong>{{ ucwords($student->info->mother) }}</strong></p>
        </div>
      </div>
          
@endsection
 