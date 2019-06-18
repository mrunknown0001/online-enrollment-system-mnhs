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
            <h1>{{ $dept == null ? 'Add Department' : 'Update Department' }}</h1>
            <p>
              <a href="{{ route('admin.departments') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Department Management</a>
            </p>
            @include('includes.all')
            <form action="{{ route('admin.store.department') }}" method="POST" autocomplete="off">
              @csrf
              <input type="hidden" name="dept_id" value="{{ $dept != null ? $dept->id : '' }}">
              <div class="row">
                <div class="form-group col-lg-6">
                    <label for="department_name">Department Name</label>
                    <input type="text" name="department_name" id="department_name" class="form-control" value="{{ $dept == null ? old('department_name') : $dept->department_name }}" placeholder="Enter Department Name" required onkeydown="return alphaOnly(event);">
                    <span class="help-block small"></span>
                    @if ($errors->has('department_name'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('department_name') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-6">
                    <label for="department_description">Department Description <em>(Optional)</em></label>
                    <input type="text" name="department_description" id="department_description" class="form-control" value="{{ $dept == null ? old('department_description') : $dept->department_description }}" placeholder="Enter Department Description (Optional)" onkeydown="return alphaOnly(event);">
                    <span class="help-block small"></span>
                    @if ($errors->has('department_description'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('department_description') }}</strong>
                      </span>
                    @endif
                </div>

              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ $dept == null ? 'Add Department' : 'Update Department' }}</button>
              </div>
            </form>
          </div>
        </div>
    </div>
@endsection
 