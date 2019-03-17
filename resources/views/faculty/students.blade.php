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
	            <table class="table table-hover table-bordered table-striped">
					<thead>
						<th>Name</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($students as $s)
							<tr>
								<td>{{ $s->student->lastname }}, {{ $s->student->firstname }}</td>
								<td>
									<a href="" class="btn btn-primary btn-xs">Action</a>
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
 