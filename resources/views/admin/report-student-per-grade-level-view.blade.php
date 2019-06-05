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
        <h1>Student Per Grade Level</h1>
        <p>
          <a href="{{ route('admin.reports') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Reports</a>
        </p>
        @include('includes.all')

        <div class="row">
          <div class="col-md-12">
            @if(count($students) > 0)
              <table class="table table-striped table-hovered table-bordered">
                <thead>
                  <th>Student Name/LRN</th>
                  <th>Grade &amp; Section</th>
                </thead>
                <tbody>
                  @foreach($students as $s)
                    <tr>
                      <td>{{ $s->student->lastname . ', ' . $s->student->firstname . '-' . $s->student->student_number }}</td>
                      <td>Grade {{ $s->section->grade_level }} - {{ $s->section->name }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @else
              <p class="text-center"><strong>No Student on Selected Grade Level</strong></p>
            @endif
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
 