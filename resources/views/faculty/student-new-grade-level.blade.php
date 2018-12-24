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
      <h1>{{ $id == 1 ? 'Register New Student' : 'Register Existing Student' }}</h1>
      <h2><small>Choose Grade Level</small></h2>
      @include('includes.all')
      <form action="{{ route('faculty.register.choose.section') }}" method="POST">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 form-group">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $id }}">
						<label for="grade_level">Select Grade Level</label>
						<select name="grade_level" id="grade_level" class="form-control selectpicker" data-live-search="true" required>
							<option value="">Select Grade Level</option>
							<option value="7">Grade 7</option>
							<option value="8">Grade 8</option>
							<option value="9">Grade 9</option>
							<option value="10">Grade 10</option>
							<option value="11">Grade 11</option>
							<option value="12">Grade 12</option>
						</select>
					</div>
					<div class="col-md-6 col-md-offset-3 form-group">
						<button type="submit" class="btn btn-primary">Continue</button>
					</div>
				</div>
      </form>
    </div>
  </div>
</div>
@endsection
 