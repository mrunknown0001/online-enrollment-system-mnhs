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
              <input type="hidden" name="faculty_id" value="{{ $faculty != null ? $faculty->id : '' }}">
              <div class="row">
                <div class="form-group col-lg-6">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" value="{{ $faculty == null ? old('firstname') : $faculty->firstname }}" class="form-control" placeholder="Enter First Name" required onkeydown="return alphaOnly(event);">
                    <span class="help-block small"></span>
                    @if ($errors->has('firstname'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('firstname') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group col-lg-6">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $faculty == null ? old('lastname') : $faculty->lastname }}" placeholder="Enter Last Name" required onkeydown="return alphaOnly(event);">
                    <span class="help-block small"></span>
                    @if ($errors->has('lastname'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('lastname') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group col-lg-6">
                    <label for="employee_id">Employee Number</label>
                    <input type="number" name="employee_id" id="employee_id" value="{{ $faculty == null ? old('employee_id') : $faculty->employee_id }}" class="form-control" placeholder="Enter Employee Number" required>
                    <span class="help-block small"></span>
                    @if ($errors->has('employee_id'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('employee_id') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group col-lg-6">
                    <label for="email">DepEd Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $faculty == null ? old('email') : $faculty->email }}" placeholder="Enter DepEd Email" required>
                    <span class="help-block small"></span>
                    @if ($errors->has('email'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group col-lg-6">
                    <label for="mobile_number">Mobile Number</label>
                    <input type="number" name="mobile_number" id="mobile_number" class="form-control" value="{{ $faculty == null ? old('mobile_number') : $faculty->mobile_number }}" placeholder="Enter Mobile Number" required >
                    <span class="help-block small"></span>
                    @if ($errors->has('mobile_number'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('mobile_number') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group col-lg-6">
                    <label for="department">Department</label>
                    <select class="form-control" name="department" id="department">
                      <option value="">Select Department</option>
                      @if(count($dept) > 0)
                        @foreach($dept as $d)
                          <option value="{{ $d->id }}" {{ $faculty != NULL && $faculty->designation != NULL ? $faculty->designation->department_id == $d->id ? 'selected' : '' : '' }}>{{ $d->department_name }}</option>
                        @endforeach
                      @endif
                    </select>
                    <span class="help-block small"></span>
                    @if ($errors->has('department'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('department') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group col-lg-6">
                    <label for="position">Position</label>
                    {{-- <input type="text" name="position" id="position" class="form-control" value="{{ $faculty == null ? old('position') : $faculty->position }}" placeholder="Enter Position" required  > --}}
                    <select class="form-control" name="position" id="position">
                      <option value="">Select Position</option>
                      <option value="Teacher I">Teacher I</option>
                      <option value="Teacher II">Teacher II</option>
                      <option value="Teacher III">Teacher III</option>
                      <option value="Master Teacher I">Master Teacher I</option>
                      <option value="Master Teacher II">Master Teacher II</option>
                      <option value="Master Teacher III">Master Teacher III</option>
                      <option value="Master Teacher IV">Master Teacher IV</option>
                      <option value="Head Teacher I">Head Teacher I</option>
                      <option value="Head Teacher II">Head Teacher II</option>
                      <option value="Head Teacher III">Head Teacher III</option>
                      <option value="Head Teacher IV">Head Teacher IV</option>
                      <option value="Principal II">Principal II</option>
                      <option value="Principal III">Principal III</option>
                      <option value="Principal IV">Principal IV</option>
                      <option value="Registrar I">Guidance Councelor I</option>
                      <option value="Admin Officer I">Admin Officer I</option>
                      <option value="Admin Officer II">Admin Officer II</option>
                      <option value="Admin Assistant I">Admin Assistant I</option>
                      <option value="Admin Assistant II">Admin Assistant II</option>
                    </select>
                    <span class="help-block small"></span>
                    @if ($errors->has('position'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('position') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group col-lg-6">
                  <label>Status</label>
                  <select class="form-control" name="status" id="status" required>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ $faculty == null ? 'Add Faculty' : 'Update Faculty' }}</button>
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
 