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
      <h2><small>Select Strand</small></h2>
      @include('includes.all')
	    <div class="row">
	    	<div class="col-md-6 col-md-offset-3">
		      <form action="{{ route('admin.regitration.select.strand') }}" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $id }}">
						<input type="hidden" name="grade_level" value="{{ $grade_level }}">
						<div class="form-group">
							<label>Select Strand</label>
							<select class="form-control" name="strand" id="strand" required>
								<option value="">Select Strand</option>
								@foreach($strands as $s)
									<option value="{{ $s->id }}">{{ $s->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Continue</button>
						</div>
		      </form>	    		
	    	</div>

	    </div>
    </div>
  </div>
</div>
@endsection
 