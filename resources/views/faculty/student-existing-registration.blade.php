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
      <h1>Register Existing Student</h1>
      @include('includes.all')
      <div class="row">
      	<div class="col-md-6 col-md-offset-3">
      		<h4>Search Student:</h4>
      		<form action="{{ route('faculty.existing.student.register.search') }}" method="POST" autocomplete="off">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="grade_level" value="{{ $grade_level }}">
            <input type="hidden" name="section_id" value="{{ $section_id }}">
						<div class="form-group">
							<input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search Student" autofocus="">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Search</button>
						</div>
      		</form>
      	</div>
      </div>
    </div>
  </div>
</div>
@endsection
 