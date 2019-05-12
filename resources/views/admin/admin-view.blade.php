@extends('layouts.app')

@section('title') View Admin Details @endsection

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
            <h1>View Admin Details</h1>
            <p>
              <a href="{{ route('admin.admins') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Admin Management</a>
            </p>
            <div class="row">
              <div class="col-md-6">
                <p>{{ $admin->firstname . ' ' . $admin->lastname }}</p>
              </div>
            </div>

          </div>
        </div>
    </div>
@endsection
 