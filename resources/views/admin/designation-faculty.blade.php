@extends('layouts.app')

@section('title') View Faculty Designation @endsection

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
            <h1>View Faculty Designation</h1>
            <p>
              <a href="{{ route('admin.designations') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Faculty Designations</a>
            </p>
            <p>Fullname/Employee ID: <strong>{{ $faculty->firstname . ' ' . $faculty->lastname . ' / ' . $faculty->employee_id }}</strong></p>
            <p>DepEd Email: <strong>{{ $faculty->email }}</strong></p>
            <p>Mobile Number: <strong>{{ $faculty->mobile_number }}</strong></p>
            <p>Department: <strong>{{ $faculty->designation->department->department_name }}</strong></p>
            <p>Position: <strong>{{ $faculty->position }}</strong></p>
          </div>
      </div>
  </div>
@endsection
 