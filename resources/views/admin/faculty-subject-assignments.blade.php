@extends('layouts.app')

@section('title') Faculty Subject Assignments @endsection

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
          <h1> Faculty Subject Assignments </h1>
          <p>
            <a href="{{ route('admin.faculty.assignments.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Subject Assignment</a>
          </p>
        </div>
      </div>
  </div>
@endsection
 