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
          <div class="col-md-3">
            <br><br><br>
            <h1>Reports</h1>

            @include('includes.all')
              <p><a href="{{ route('admin.student.enrollment.history') }}" class="btn btn-primary btn-sm btn-block">Enrollment History</a></p>
              <p><a href="{{ route('admin.online.enrolled.students') }}" class="btn btn-primary btn-sm btn-block">Online Enrollment</a></p>
              <p><a href="{{ route('admin.assisted.enrolled.students') }}" class="btn btn-primary btn-sm btn-block">Assisted Enrollment</a></p>
              <p><a href="{{ route('admin.list.of.sections') }}" class="btn btn-primary btn-sm btn-block">List of sections</a></p>
              <p><a href="{{ route('admin.list.of.student.grade.level') }}" class="btn btn-primary btn-sm btn-block">List of students per grade level</a></p>
              <p><a href="{{ route('admin.list.of.student.per.section') }}" class="btn btn-primary btn-sm btn-block">List of students per section</a></p>
              {{-- <p><a href="{{ route('admin.reports.junior.high') }}" class="btn btn-primary btn-sm btn-block">List of junior high students</a></p>
              <p><a href="{{ route('admin.list.of.senior.high.students') }}" class="btn btn-primary btn-sm btn-block">List of senior high students</a></p> --}}
              {{-- List of faculties per grade level with sections assigned
              List of faculties per department
              List of class schedule --}}
            
          </div>
        </div>
    </div>
@endsection
 