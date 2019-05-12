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
                <hr>
                <p>Name: <strong>{{ $admin->firstname . ' ' . $admin->lastname }}</strong></p>
                <p>ID Number: <strong>{{ $admin->employee_id }}</strong></p>
                <p>DepEd Email: <strong>{{ $admin->email }}</strong></p>
                <p>Mobile Number: <strong>{{ $admin->mobile_number }}</strong></p>
                <p>Position: <strong>{{ $admin->position }}</strong></p>
                <hr>
              </div>
            </div>

          </div>
        </div>
    </div>
@endsection
 