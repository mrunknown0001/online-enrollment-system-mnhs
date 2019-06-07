@extends('layouts.app')

@section('title') Student Evaluation @endsection

@section('sidebar')
    @include('student.includes.sidebar')
@endsection

@section('header')
    @include('student.includes.header')
@endsection

@section('content')
  <div class="section-admin container-fluid">
      <div class="row">
        <div class="col-md-12">
          <br><br><br>
          <h1>Student Evaluation</h1>
          <p>
            <button class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i></button>
          </p>
        </div>
        <div class="col-md-12">
          @include('includes.all')
          
          @if($grades > 0)
            <div class="row">
              <div class="col-md-9">
                <h4>Year & Section: Grade {{ Auth::user()->info->section->grade_level }} - {{ Auth::user()->info->section->name }}</h4>
              </div>
              <div class="col-md-3">
                <h4>School Year: {{ $sy->from . '-' . $sy->to }}</h4>
              </div>
            </div>
            <table id="grades" class="table table-hover table-striped table-bordered">
              <thead>
                <th>Subject</th>
                {{-- <th>Evaluation</th> --}}
                <th>Remarks</th>
              </thead>
              <tbody>
              	@foreach($grades as $g)
					<tr>
						<td>
							{{ $g['subject'] }}
						</td>
						{{-- <td>
							{{ $g['grade'] }}
						</td> --}}
						<td class="white-text" bgcolor="{{ $g['remark'] == 'Passed' ? 'green' : 'red' }}">

							{{ $g['remark'] }}
						
            </td>
					</tr>
              	@endforeach
              </tbody>
            </table>
          @else
            <p class="text-center">No Grades Available.</p>
          @endif
        </div>
      </div>
  </div>
@endsection
 