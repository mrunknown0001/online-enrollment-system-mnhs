@extends('layouts.app')

@section('title') Student Details @endsection

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('header')
    @include('admin.includes.header')
@endsection

@section('content')
    <div class="section-admin container-fluid">

      <br><br><br>
      <div class="row">
        <div class="col-md-12">
          <h1>Student Details</h1>
          @include('includes.all')
          <p>
            <a href="{{ route('admin.students') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Students</a>
          </p>
          <p>Fullname: <strong>{{ $student->lastname }}, {{ $student->firstname }} {{ $student->middlename }} {{ $student->prefix }}</strong></p>
          <p>Grade &amp; Section: Grade <strong>{{ $student->info->section->grade_level . ' - ' . $student->info->section->name }}</strong></p>
          <p>Gender: <strong>{{ $student->info->gender }}</strong></p>
          <p>Nataionality: <strong>{{ $student->info->nationality }}</strong></p>
          <p>Birthday: <strong>{{ $student->info->birthday }}</strong></p>
          <p>Email Address: <strong>{{ $student->info->email }}</strong></p>
          <p>Father's Name: <strong>{{ ucwords($student->info->father) }}</strong></p>
          <p>Mother's Name: <strong>{{ ucwords($student->info->mother) }}</strong></p>
        </div>
      </div>
          
@endsection
 