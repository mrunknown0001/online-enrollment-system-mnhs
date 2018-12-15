@extends('layouts.app')

@section('title') Faculty @endsection

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
            <h1>{{ $faculty == null ? 'Add Faculty' : 'Update Faculty' }}</h1>
            <p>
              <a href="{{ route('admin.faculties') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Faculty Management</a>
            </p>
            @include('includes.all')
            <form action="{{ route('admin.store.faculty') }}" method="POST" autocomplete="off">
              @csrf
              <div class="row">
                <div class="form-group col-lg-6">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" id="firstname" value="{{ $faculty == null ? old('firstname') : $faculty->firstname }}" class="form-control" placeholder="Enter Firstname" required>
                    <span class="help-block small"></span>
                </div>
                <div class="form-group col-lg-6">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $faculty == null ? old('lastname') : $faculty->lastname }}" placeholder="Enter Lastname" required>
                    <span class="help-block small"></span>
                </div>

                <div class="form-group col-lg-6">
                    <label for="employee_id">Employee ID</label>
                    <input type="text" name="employee_id" id="employee_id" value="{{ $faculty == null ? old('employee_id') : $faculty->employee_id }}" class="form-control" placeholder="Enter Employee ID" required>
                    <span class="help-block small"></span>
                </div>

                <div class="form-group col-lg-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $faculty == null ? old('email') : $faculty->email }}" placeholder="Enter Enter Email" required>
                    <span class="help-block small"></span>
                </div>
                <div class="form-group col-lg-6">
                    <label for="mobile_number">Mobile Number</label>
                    <input type="text" name="mobile_number" id="mobile_number" class="form-control" value="{{ $faculty == null ? old('mobile_number') : $faculty->mobile_number }}" placeholder="Enter Mobile Number" required>
                    <span class="help-block small"></span>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ $faculty == null ? 'Add Faculty' : 'Update Faculty' }}</button>
              </div>
            </form>
          </div>
        </div>
    </div>
@endsection
 