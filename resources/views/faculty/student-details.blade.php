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
          {{-- <p>Fullname: <strong>{{ $student->lastname }}, {{ $student->firstname }} {{ $student->middlename }} {{ $student->prefix }}</strong></p>
          <p>LRN: <strong>{{ $student->student_number }}</strong></p>
          <p>Grade &amp; Section: Grade <strong>{{ $student->student_section->section->grade_level . ' - ' . $student->student_section->section->name }}</strong></p>
          <p>Gender: <strong>{{ $student->info->gender }}</strong></p>
          <p>Nataionality: <strong>{{ $student->info->nationality }}</strong></p>
          <p>Birthday: <strong>{{ $student->info->birthday }}</strong></p>
          <p>Email Address: <strong>{{ $student->info->email }}</strong></p>
          <p>Father's Name: <strong>{{ ucwords($student->info->father) }}</strong></p>
          <p>Mother's Name: <strong>{{ ucwords($student->info->mother) }}</strong></p> --}}
          <table class="table table-hover table-bordered table-striped">
              <tr>
                  <td>Fullname</td>
                  <td><strong>{{ $student->firstname . ' ' . $student->lastname }}</strong></td>
              </tr>
              <tr>
                <td>LRN</td>
                <td><strong>{{ $student->student_number }}</strong></td>
              </tr>
              <tr>
                <td>Grade & Section</td>
                <td><strong>Grade {{ $student->info->grade_level }} - {{ $student->info->section->name }}</strong></td>
              </tr>
              <tr>
                <td>Gender</td>
                <td><strong>{{ $student->info->gender }}</td>
              </tr>
              <tr>
                <td>Birthday</td>
                <td><strong>{{ $student->info->birthday }}</strong></td>
              </tr>
              <tr>
                <td>Home Address</td>
                <td><strong>{{ $student->info->address }}</strong></td>
              </tr>
              <tr>
                <td>Nationality</td>
                <td><strong>{{ $student->info->nationality }}</strong></td>
              </tr>
              <tr>
                <td>Father's Name</td>
                <td><strong>{{ $student->info->father }}</strong></td>
              </tr>
              <tr>
                <td>Mother's Name</td>
                <td><strong>{{ $student->info->mother }}</strong></td>
              </tr>
          </table>
        </div>
      </div>
          
@endsection
 