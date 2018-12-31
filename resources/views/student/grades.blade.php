@extends('layouts.app')

@section('title') Grades @endsection

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
          <h1>Grades</h1>
        </div>
        <div class="col-md-6 col-md-offset-3">
          @include('includes.all')
          
        </div>
      </div>
  </div>
@endsection
 