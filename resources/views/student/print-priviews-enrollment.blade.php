@extends('layouts.app')

@section('title') Enrollment History @endsection

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
          <h1>Enrollment History</h1>
        </div>
        <div class="col-md-12">
          
          <div id="printArea">
            <div class="col-md-12">
              @include('includes.print-header')
              <h4 class="text-center">Certificate of Registration</h4>
            </div>
            <h4>{{ Auth::user()->lastname . ', ' . Auth::user()->firstname . ' ' . Auth::user()->middlename }}</h4>
            <h4>{{ Auth::user()->student_number }}</h4>
            <h4>Grade {{ $section->grade_level }} - {{ $section->name }}</h4>
            <table class="table table-hover table-bordered table-stiped">
              <thead>
                <th>Subject Code</th>
                <th>Subject Title</th>
              </thead>
              <tbody>
                @foreach($subjects as $s)
                  <tr>
                    <td>{{ $s->code }}</td>
                    <td>{{ $s->title }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <button type="button" class="btn btn-success" onclick="window.print()"><i class="fa fa-print"></i> Print</button>

        </div>
      </div>
  </div>
@endsection
 