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
            <h1>Students on {{ $subject->code }} | Grade {{ $section->grade_level }} - {{ $section->name }}</h1>
			
			<p>
				<a href="{{ route('faculty.assigned.subjects') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
				<button class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i></button>
			</p>

            @include('includes.all')

            @if(count($students) > 0)
	            <table class="table table-hover table-bordered table-striped">
					<thead>
						<th>Name</th>
						<th>LRN</th>
						<th>Grade</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($students as $s)
							<tr>
								<td>{{ $s->student->lastname }}, {{ $s->student->firstname }}</td>
								<td>{{ $s->student->student_number }}</td>
								<td>{{ Auth::user()->getGrades($s->student->id, $subject->id) }}</td>
								<td>
									<a href="{{ route('faculty.student.view.details', ['id' => encrypt($s->student->id)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> View Student Details</a>
									<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#id-{{ $s->student->student_number }}"><i class="fa fa-pencil"></i> Update Grade</button>



									<div id="id-{{ $s->student->student_number }}" class="modal fade" role="dialog">
										<div class="modal-dialog">

											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Update Grade on {{ $subject->code }} | Grade {{ $section->grade_level }} - {{ $section->name }}</h4>
												</div>
												<div class="modal-body">
													<p>Name: {{ $s->student->lastname }}, {{ $s->student->firstname }}</p>
													<p>LRN: {{ $s->student->student_number }}</p>
													<form action="{{ route('faculty.update.grade') }}" method="POST" autocomplete="off">
														{{ csrf_field() }}
														<input type="hidden" name="grade_id" value="{{ Auth::user()->getGradePrimKey($s->student->id, $subject->id) }}">
														<div class="form-group">
															<label>Grade:</label>
															<input type="number" name="grade" id="grade" class="form-control" value="{{ Auth::user()->getGrades($s->student->id, $subject->id) }}">
														</div>
														<div class="form-group">
															<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Grade</button> <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
														</div>
													</form>
												</div>
												<div class="modal-footer">
													
												</div>
											</div>

										</div>
									</div>


								</td>
							</tr>
						@endforeach
					</tbody>
	            </table>
            @else
				<p class="text-center">No Student Enrolled</p>
            @endif
        </div>
    </div>
</div>
@endsection
 