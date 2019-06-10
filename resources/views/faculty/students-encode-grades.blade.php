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
			</p>

            @include('includes.all')

            @if(count($students) > 0)
            <form action="{{ route('faculty.save.grades') }}" method="POST" autocomplete="off">
            	{{ csrf_field() }}
            	<input type="hidden" name="subject_id" value="{{ $subject->id }}">
            	<input type="hidden" name="section_id" value="{{ $section->id }}">
	            <table class="table table-hover table-bordered table-striped">
					<thead>
						<th>Name</th>
						<th>Final Grade</th>
					</thead>
					<tbody>
						@foreach($students as $s)
							<tr>
								<td>{{ $s->student->lastname }}, {{ $s->student->firstname }} - {{ $s->student->student_number }}</td>
								<td>
									<input type="number" name="grade_{{ $s->student->id }}" class="form-control" value="{{ Auth::user()->getGrades($s->student->id, $subject->id) }}" min="0" max="100">

									{{-- <select name="grade_{{ $s->student->id }}" class="form-control" required>
										<option value="">Remark</option>
										<option value="Passed" {{ Auth::user()->getRemark($s->student->id, $subject->id) == 'Passed' ? 'selected' : '' }}>Passed</option>
										<option value="Failed" {{ $s->remarks == 'Failed' ? 'selected' : '' }} {{ Auth::user()->getRemark($s->student->id, $subject->id) == 'Failed' ? 'selected' : '' }}>Failed</option>
									</select> --}}
								</td>
							</tr>
						@endforeach
					</tbody>
	            </table>
	            <p>
	            	<button class="btn btn-primary"><i class="fa fa-save"></i> Save Remarks</button>
	            </p>
	        </form>
            @else
				<p class="text-center">No Student Enrolled</p>
            @endif
        </div>
    </div>
</div>
@endsection
 