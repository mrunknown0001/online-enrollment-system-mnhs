@extends('layouts.app')

@section('title') Reports @endsection

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('header')
    @include('admin.includes.header')
@endsection

@section('content')
  <div class="section-admin container-fluid">
    <div class="row">
      <div class="col-md-12">
        <br><br><br>
        <h1>Senior High Students</h1>
        <p>
          <a href="{{ route('admin.reports') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Reports</a>
        </p>
        @include('includes.all')
        <p>
          <button class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
        </p>
        <div id="printArea">
          @include('includes.print-header')
          <div class="row">
            <div class="col-md-12">
              @if(count($students) > 0)
                <table class="table table-hover table-bordered table-striped">
                  <thead>
                    <th>Student Name/Student Number</th>
                    <th>Grade Level &amp; Section</th>
                  </thead>
                  <tbody>
                    @foreach($students as $s)
                      <tr>
                        <td>{{  $s->student->lastname . ', ' . $s->student->firstname . ' - ' . $s->student->student_number}}
                        </td>
                        <td>
                          Grade {{ $s->grade_level }} - {{ $s->section->name }}
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              @else
                <p class="text-center"><strong>No Enrolled Students on Senior High School</strong></p>
              @endif
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
 