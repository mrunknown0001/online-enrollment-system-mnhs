@extends('layouts.app')

@section('title') Schedules @endsection

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
            <h1>Schedules</h1>
            <p>
              <a href="{{ route('admin.schedule.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Schedule</a>
              <a href="{{ route('admin.rooms') }}" class="btn btn-primary"><i class="fa fa-building"></i> Room Management</a>
            </p>
            @include('includes.success')
            @include('includes.error')
          </div>
        </div>
    </div>
@endsection
 