@extends('layouts.app')

@section('title') Profile @endsection

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
          <h1>Profile</h1>
        </div>
        <div class="col-md-12">
          @include('includes.all')
          
          <p>
            <a href="{{ route('student.password') }}" class="btn btn-primary">Change Password</a>
          </p>
        </div>
      </div>
  </div>
@endsection
 