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

    <div id="printArea">
      <br><br><br><br>
      <div class="row">
        <div class="col-md-12">
          @include('includes.print-header')
          <h5 class="text-center">Student Evaluation</h5>
          <p>
            <button class="btn btn-primary hidden-on-print" onclick="window.print()"><i class="fa fa-print hidden-on-print"></i></button>
          </p>
        </div>
        <div class="col-md-6">
          <h5>Student Name: {{ $student->lastname . ', ' . $student->firstname . ' ' . $student->middlename }}</h5>
          <h5>LRN: {{ $student->student_number }}</h5>
        </div>
        <div class="col-md-12">
          @include('includes.all')
          @if($grades > 0)
            <div class="row">
              <div class="col-md-9">
                <h5>Year & Section: Grade {{ Auth::user()->info->section->grade_level }} - {{ Auth::user()->info->section->name }}</h5>
              </div>
              <div class="col-md-3">
                <h5>School Year: {{ $sy->from . '-' . $sy->to }}</h5>
              </div>
            </div>
            <table id="grades" class="table table-hover table-striped table-bordered">
              <thead>
                <th>Subject</th>
                {{-- <th>Evaluation</th> --}}
                <th>Grade</th>
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

        							{{ $g['grade'] }}
        						
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
  </div>
@endsection
 