@extends('layouts.app')

@section('title') COR @endsection

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
        <div class="breadcome-area">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list"> Certificate of Registration </div>
              </div>
            </div>
          </div>
        </div>
        @include('includes.all')
        <div class="col-md-12">
          @include('includes.all')
          <div class="alert alert-success text-center top-space">
            <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <b>{{ $message }}</b>
          </div>
          <h5>Student Name: {{ $student->lastname . ', ' . $student->firstname }}</h5>
          <h5>LRN: {{ $student->student_number }}</h5>

          <h5>Grade {{ $section->grade_level }} - {{ $section->name }}</h5>

          @if(count($subjects) > 0)
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
          @else
            <p class="text-center">No Subject for the Selected Grade Level</p>
          @endif
          

          <button type="button" class="btn btn-success" onclick="window.print()"><i class="fa fa-print"></i> Print</button>



        </div>
      </div>
    </div>
  </div>
@endsection
 