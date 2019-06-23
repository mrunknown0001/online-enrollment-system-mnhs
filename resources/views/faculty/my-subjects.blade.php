@extends('layouts.app')

@section('title') My Subjects @endsection

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
      <h1>My Subjects</h1>
      <div class="row">
      	<div class="col-md-3">
      		<form>
      			<input type="hidden" id="current" value="{{ $ay }}">
						<div class="form-group">
							<select onchange="selectChange()" class="form-control" id="school_year" name="school_year">
								<option value="">Select School Year</option>
								@if(count($sy) > 0)
									@foreach($sy as $s)
										<option value="{{ $s->academic_year }}">{{ $s->academic_year }}</option>
									@endforeach
								@else
									<option value="">No Record</option>
								@endif
							</select>
						</div>
      		</form>
      	</div>
      </div>
      @include('includes.all')

      <table id="assignment" class="table table-hover table-bordered table-striped">
				<thead>
					<th>Grade Level &amp; Section</th>
					<th>Subject</th>
					<th>Action</th>
				</thead>
      </table>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    var ay = $("#current").val();
    // alert(ay)
    $('#assignment').DataTable({
      ajax: {
        url: "/faculty/subjects/assigned/all/" + ay,
        dataSrc: ""
      },
      columns: [
        { data: 'grade_section' },
        { data: 'subject' },
        { data: 'action' },
      ],
      destroy: true,
    });
  } );

  function selectChange() {
    var ay = document.getElementById("school_year").value;
    if(ay == '') {
      ay = 'null';
    }
    // alert(ay);
    $('#assignment').DataTable({
      ajax: {
        url: "/faculty/subjects/assigned/all/" + ay,
        dataSrc: ""
      },
      columns: [
        { data: 'grade_section' },
        { data: 'subject' },
        { data: 'action' },
      ],
      destroy: true,
    });
  }
</script>
@endsection
 