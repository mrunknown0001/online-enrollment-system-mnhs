@extends('layouts.app')

@section('title') Students @endsection

@section('sidebar')
  @include('faculty.includes.sidebar')
@endsection

@section('header')
  @include('faculty.includes.header')
@endsection

@section('content')
<div class="section-admin container-fluid">
  <div class="row">
    <div class="col-md-12">
      <br><br><br>
      <h1>Register New/Transferee Student</h1>
      <h3><small>Grade {{ $grade_level }} -- {{ $section->name }}</small></h3>
      @include('includes.all')
      <form action="{{ route('faculty.save.new.student.registration') }}" method="POST" autocomplete="off">
      	{{ csrf_field() }}
      	<input type="hidden" name="grade_level" value="{{ $grade_level }}">
      	<input type="hidden" name="section_id" value="{{ $section->id }}">
				<div class="row">
					<div class="form-group col-md-4">
						<label for="firstname">Enter Firstname</label>
            <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" class="form-control" placeholder="Enter Firstname" required>
            <span class="help-block small"></span>
            @if ($errors->has('firstname'))
              <span class="invalid-feedback text-red" role="alert">
                <strong>{{ $errors->first('firstname') }}</strong>
              </span>
            @endif
					</div>

					<div class="form-group col-md-4">
						<label for="middlename">Enter Middlename</label>
            <input type="text" name="middlename" id="middlename" value="{{ old('middlename') }}" class="form-control" placeholder="Enter Middlename">
            <span class="help-block small"></span>
            @if ($errors->has('middlename'))
              <span class="invalid-feedback text-red" role="alert">
                <strong>{{ $errors->first('middlename') }}</strong>
              </span>
            @endif
					</div>

					<div class="form-group col-md-4">
						<label for="lastname">Enter Lastname</label>
            <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" class="form-control" placeholder="Enter Lastname" required>
            <span class="help-block small"></span>
            @if ($errors->has('lastname'))
              <span class="invalid-feedback text-red" role="alert">
                <strong>{{ $errors->first('lastname') }}</strong>
              </span>
            @endif
					</div>

					<div class="form-group col-md-4">
						<label for="suffix_name">Enter Suffix</label>
            <input type="text" name="suffix_name" id="suffix_name" value="{{ old('suffix_name') }}" class="form-control" placeholder="Enter Suffix">
            <span class="help-block small"></span>
            @if ($errors->has('suffix_name'))
              <span class="invalid-feedback text-red" role="alert">
                <strong>{{ $errors->first('suffix_name') }}</strong>
              </span>
            @endif
					</div>

					<div class="form-group col-md-4">
						<label for="lrn">Enter LRN</label>
					  <input type="text" name="lrn" id="lrn" class="form-control" placeholder="Enter LRN" >
            <span class="help-block small"></span>
            @if ($errors->has('lrn'))
              <span class="invalid-feedback text-red" role="alert">
                <strong>{{ $errors->first('lrn') }}</strong>
              </span>
            @endif
					</div>
				</div>

				<div class="row">
					
					<div class="form-group col-md-4">
						<label for="gender">Select Gender</label>
            <select name="gender" id="gender" class="form-control">
							<option value="">Select Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
            </select>
            <span class="help-block small"></span>
            @if ($errors->has('gender'))
              <span class="invalid-feedback text-red" role="alert">
                <strong>{{ $errors->first('gender') }}</strong>
              </span>
            @endif
					</div>

					<div class="form-group col-md-4">
						<label for="nationality">Enter Nationality</label>
            <input type="text" name="nationality" id="nationality" value="{{ old('nationality') }}" class="form-control" placeholder="Enter Nationality" required>
            <span class="help-block small"></span>
            @if ($errors->has('nationality'))
              <span class="invalid-feedback text-red" role="alert">
                <strong>{{ $errors->first('nationality') }}</strong>
              </span>
            @endif
					</div>

					<div class="form-group col-md-4">
						<label for="birthday">Enter Birthday</label>
            <input type="date" name="birthday" id="birthday" value="{{ old('birthday') }}" class="form-control" placeholder="Enter Birthday" required>
            <span class="help-block small"></span>
            @if ($errors->has('birthday'))
              <span class="invalid-feedback text-red" role="alert">
                <strong>{{ $errors->first('birthday') }}</strong>
              </span>
            @endif
					</div>

					<div class="form-group col-md-12">
						<label for="birthday">Enter Home Address</label>
            <input type="text" name="address" id="address" value="{{ old('birthday') }}" class="form-control" placeholder="Enter Home Address" required>
            <span class="help-block small"></span>
            @if ($errors->has('address'))
              <span class="invalid-feedback text-red" role="alert">
                <strong>{{ $errors->first('address') }}</strong>
              </span>
            @endif
					</div>

					<div class="form-group col-md-6">
						<label for="father">Enter Father's Name</label>
            <input type="text" name="father" id="father" value="{{ old('father') }}" class="form-control" placeholder="Enter Father's Name" required>
            <span class="help-block small"></span>
            @if ($errors->has('father'))
              <span class="invalid-feedback text-red" role="alert">
                <strong>{{ $errors->first('father') }}</strong>
              </span>
            @endif
					</div>

          <div class="form-group col-md-6">
            <label for="mother">Enter Mother's Name</label>
            <input type="text" name="mother" id="mother" value="{{ old('mother') }}" class="form-control" placeholder="Enter Mother's Name" required>
            <span class="help-block small"></span>
            @if ($errors->has('mother'))
              <span class="invalid-feedback text-red" role="alert">
                <strong>{{ $errors->first('mother') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group col-md-6">
            <label for="fathers_contact_number">Enter Father's Contact Number</label>
            <input type="number" name="fathers_contact_number" id="fathers_contact_number" value="{{ old('fathers_contact_number') }}" class="form-control" placeholder="Enter Father's Contact Number" required>
            <span class="help-block small"></span>
            @if ($errors->has('fathers_contact_number'))
              <span class="invalid-feedback text-red" role="alert">
                <strong>{{ $errors->first('fathers_contact_number') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group col-md-6">
            <label for="mothers_contact_number">Enter Mother's Contact Number</label>
            <input type="number" name="mothers_contact_number" id="mothers_contact_number" value="{{ old('mothers_contact_number') }}" class="form-control" placeholder="Enter Mother's Contact Number" required>
            <span class="help-block small"></span>
            @if ($errors->has('mothers_contact_number'))
              <span class="invalid-feedback text-red" role="alert">
                <strong>{{ $errors->first('mothers_contact_number') }}</strong>
              </span>
            @endif
          </div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h2><small>Requirements</small></h2>
					</div>
					<div class="col-md-6">
				    <div class="checkbox login-checkbox">
              <label>
                <input type="checkbox" name="birth_certificate" value="1" class="i-checks" required> Birth Certificate 
              </label>
              @if ($errors->has('birth_certificate'))
	              <span class="invalid-feedback text-red" role="alert">
	                <strong>{{ $errors->first('birth_certificate') }}</strong>
	              </span>
	            @endif
            </div>
				    <div class="checkbox login-checkbox">
              <label>
                <input type="checkbox" name="form_137" value="1" class="i-checks" required> Form 137 
              </label>
              @if ($errors->has('form_137'))
	              <span class="invalid-feedback text-red" role="alert">
	                <strong>{{ $errors->first('form_137') }}</strong>
	              </span>
	             @endif
            </div>
				    <div class="checkbox login-checkbox">
              <label>
                <input type="checkbox" name="good_moral_character" value="1" class="i-checks" required> Good Moral Character 
              </label>
              @if ($errors->has('good_moral_character'))
	              <span class="invalid-feedback text-red" role="alert">
	                <strong>{{ $errors->first('good_moral_character') }}</strong>
	              </span>
	            @endif
            </div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary">Register Student</button>
						<p></p>
					</div>
				</div>
      </form>
    </div>
  </div>
</div>
@endsection
 