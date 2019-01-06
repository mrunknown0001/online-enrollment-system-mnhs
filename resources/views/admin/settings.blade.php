@extends('layouts.app')

@section('title') Settings @endsection

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
        <h1>Settings</h1>
      </div>
      <div class="col-md-12">
        <p>
          <strong>Academic Year:</strong>
          {{ date('Y') . '-' . (date('Y') + 1) }}
        </p>
      </div>
      <div class="col-md-12">
        <p>
          <strong>Enrollment Setting For Junior High</strong>
        </p>
        <p>
          <button class="btn btn-primary">Turn On Enrollment for Junior High</button>
        </p>
      </div>
      <div class="col-md-12">
        <p>
          <strong>Enrollment Setting for Senior High</strong>
        </p>
        <p>
          <button class="btn btn-primary">Turn On Enrollment for Senior High</button>
        </p>
        <p>
          <button class="btn btn-primary">Semester Select</button>
        </p>
      </div>
    </div>
  </div>
@endsection
 