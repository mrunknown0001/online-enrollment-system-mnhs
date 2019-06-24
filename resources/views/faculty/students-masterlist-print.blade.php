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
      <p>
      	<a href="{{ route('faculty.assigned.subjects') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
      	<button class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i></button>
			</p>
      
      <div id="printArea">
      	@include('includes.print-header')
        <h5>Grade {{ $section->grade_level }} - {{ $section->name }}</h5>
        @if($section->strand_id != NULL)
					{{ $section->strand->name }}
        @endif
        <h5>{{ $subject->title }}</h5>
				<h5>School Year: {{ $academic_year }}</h5>

        @if(count($students) > 0)
        	<div class="row">
        		<div class="col-md-6 col-md-offset-3">
	            <table class="table borderless">
								<tbody>
									@foreach($students as $s)
										<tr>
											<td>{{ $s->student->student_number }}</td>
											<td>{{ $s->student->lastname }}, {{ $s->student->firstname }}</td>
											
										</tr>
									@endforeach
								</tbody>
	            </table>            			
        		</div>
        	</div>

        @else
				<p class="text-center">No Student Enrolled</p>
        @endif            	
      </div>

    </div>
  </div>
</div>
@endsection
 