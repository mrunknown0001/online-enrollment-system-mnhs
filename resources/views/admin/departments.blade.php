@extends('layouts.app')

@section('title') Departments @endsection

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
            <h1>Departments</h1>
            <p>
              <a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Add Department</a>
            </p>
          </div>
      </div>
  </div>
@endsection
 