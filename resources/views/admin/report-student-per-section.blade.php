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
        <h1>Student Per Section</h1>
        <p>
          <a href="{{ route('admin.reports') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Reports</a>
        </p>
        @include('includes.all')

        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <form action="" method="POST">
              {{ csrf_field() }}
              
              @if(count($sections) > 0)
                <div class="form-group">
                  <label for="grade_level_section">Select Grade Level and Section</label>
                  <select class="form-control" name="grade_level_section" id="grade_level_section" required>
                    <option value="">Select Grade Level and Section</option>
                    @foreach($sections as $s)
                      <option value="{{ $s->id }}">Grade {{ $s->grade_level }} - {{ $s->name }}</option>
                    @endforeach
                  </select>
                </div>
              @else
                <p class="text-center">No Available Active Sections</p>
              @endif

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Continue</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
 