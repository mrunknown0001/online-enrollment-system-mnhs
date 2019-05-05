@extends('layouts.app')

@section('title') Admin @endsection

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
            <h1>{{ $admin == null ? 'Add Admin' : 'Update Admin' }}</h1>
            <p>
              <a href="{{ route('admin.admins') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Admin Management</a>
            </p>
            @include('includes.all')
            <form action="{{ route('admin.store.admin') }}" method="POST" autocomplete="off">
              @csrf
              <input type="hidden" name="admin_id" value="{{ $admin != null ? $admin->id : '' }}">
              <div class="row">
                <div class="form-group col-lg-6">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" id="firstname" value="{{ $admin == null ? old('firstname') : $admin->firstname }}" class="form-control" placeholder="Enter Firstname" required onkeydown="return alphaOnly(event);">
                    <span class="help-block small"></span>
                    @if ($errors->has('firstname'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('firstname') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group col-lg-6">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $admin == null ? old('lastname') : $admin->lastname }}" placeholder="Enter Lastname" required onkeydown="return alphaOnly(event);">
                    <span class="help-block small"></span>
                    @if ($errors->has('lastname'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('lastname') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group col-lg-6">
                    <label for="admin_id">Admin ID</label>
                    <input type="number" name="admin_id" id="admin_id" value="{{ $admin == null ? old('admin_id') : $admin->employee_id }}" class="form-control" placeholder="Enter Admin ID" required>
                    <span class="help-block small"></span>
                    @if ($errors->has('admin_id'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('admin_id') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group col-lg-6">
                    <label for="dep_ed_email">DepEd Email</label>
                    <input type="email" name="dep_ed_email" id="dep_ed_email" class="form-control" value="{{ $admin == null ? old('dep_ed_email') : $admin->email }}" placeholder="Enter Enter Email" required>
                    <span class="help-block small"></span>
                    @if ($errors->has('dep_ed_email'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('dep_ed_email') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group col-lg-6">
                    <label for="mobile_number">Mobile Number</label>
                    <input type="number" name="mobile_number" id="mobile_number" class="form-control" value="{{ $admin == null ? old('mobile_number') : $faculty->mobile_number }}" placeholder="Enter Mobile Number" required >
                    <span class="help-block small"></span>
                    @if ($errors->has('mobile_number'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('mobile_number') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ $admin == null ? 'Add Admin' : 'Update Admin' }}</button>
              </div>
            </form>
          </div>
        </div>
    </div>
<script>
  function alphaOnly(event) {
    var key = event.keyCode;
    return ((key >= 65 && key <= 90) || key == 8 || key == 32);
  }
</script>
@endsection
 