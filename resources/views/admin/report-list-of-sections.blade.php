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
            <h1>List of Sections</h1>
            <p>
              <a href="{{ route('admin.reports') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Return to Reports</a>
            </p>
            @include('includes.all')

            @if(count($sections) > 0)
              <p>
                <button class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
              </p>
              <div id="printArea">
                @include('includes.print-header')
                <table class="table table-hover table-bordered table-triped">
                  <thead>
                    <th>Section</th>
                    <th>Grade Level</th>
                  </thead>
                  <tbody>
                    @foreach($sections as $s)
                      <tr>
                        <td>{{ $s->name }}</td>
                        <td>Grade {{ $s->grade_level }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <p class="text-center"><strong>No Section Available.</strong></p>
            @endif

          </div>
        </div>
    </div>
@endsection
 