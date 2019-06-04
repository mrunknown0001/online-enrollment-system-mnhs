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
          <div class="col-md-12">
            <br><br><br>
            <h1>Reports</h1>

            @include('includes.all')

            <ul type="disc">
              <li><a href="{{ route('admin.list.of.sections') }}">List of sections</a></li>
              <li><a href="{{ route('admin.list.of.student.grade.level') }}">List of students per grade level</a></li>
              <li>List of students per section</li>
              <li>List of junior high students</li>
              <li>List of senior high students</li>
              <li>List of faculties per grade level with sections assigned</li>
              <li>List of faculties per department</li>
              <li>List of class schedule</li>
            </ol>
          </div>
        </div>
    </div>
@endsection
 