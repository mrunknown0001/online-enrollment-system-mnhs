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
    <h2><small>Choose Section for Grade {{ $grade_level }}</small></h2>
    @include('includes.all')
    <form action="" method="POST">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 form-group">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{ $id }}">
					<label for="section">Select Section</label>
					<select name="section" id="section" class="form-control selectpicker" data-live-search="true" required>
						@if(count($sections) > 0)
							@foreach($sections as $s)
								<option value="{{ $s->id }}">{{ $s->name }} Number of Slots Available</option>
							@endforeach
						@endif
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
 