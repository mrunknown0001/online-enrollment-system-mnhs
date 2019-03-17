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
            <form action="" method="POST" autocomplete="off">
            	{{ csrf_field() }}
	            <table class="table table-hover table-bordered table-striped">
					<thead>
						<th>Name</th>
						<th>Grade</th>
					</thead>
					<tbody>
						@foreach($students as $s)
							<tr>
								<td>{{ $s->student->lastname }}, {{ $s->student->firstname }}</td>
								<td>
									<input type="number" name="grade_{{ $s->student->id }}" class="form-control">
								</td>
							</tr>
						@endforeach
					</tbody>
	            </table>
	            <p>
	            	<button class="btn btn-primary"><i class="fa fa-save"></i> Save Grades</button>
	            </p>
	        </form>
            @else
				<p class="text-center">No Student Enrolled</p>
            @endif
        </div>
    </div>
</div>
@endsection
 