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
            @include('includes.all')

            @if(count($subjects) > 0)
            	<p>
            		<button class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i></button>
            	</p>
	            <table class="table table-hover table-bordered table-striped">
					<thead>
						<th>Grade Level &amp; Section</th>
						<th>Subject</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($subjects as $s)
							<tr>
								<td>Grade {{ $s->section->grade_level }} - {{ $s->section->name }}</td>
								<td>{{ $s->subject->code }} - {{ $s->subject->title }}</td>
								<td>
									<a href="{{ route('faculty.view.students', ['subject_id' => encrypt($s->subject->id), 'section_id' => encrypt($s->section_id)]) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View Students</a>
									<a href="{{ route('faculty.encode.grades', ['subject_id' => encrypt($s->subject->id), 'section_id' => encrypt($s->section_id)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Encode Remarks</a>
								</td>
							</tr>
						@endforeach
					</tbody>
	            </table>
	        @else
				<p class="text-center">No Subject Assigned!</p>
	        @endif
        </div>
    </div>
</div>
@endsection
 