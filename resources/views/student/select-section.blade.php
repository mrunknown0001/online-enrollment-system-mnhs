@extends('layouts.app')

@section('title') Enrollment @endsection

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
          <h1>Enrollment</h1>
        </div>
        <div class="col-md-6 col-md-offset-3">
          @include('includes.all')

          @if($enrollment->enrollment == 1)
            @if(empty($student_section))
              <form action="{{ route('student.preview.subjects') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <select class="form-control" name="section" id="section" required>
                    <option value="">Select Section</option>
                    @if(count($sections) > 0)
                      @foreach($sections as $s)
                        <option value="{{ $s->id }}">Grade {{ $s->grade_level }} - {{ $s->name }}</option>
                      @endforeach
                    @else
                      <option value="">No Section Available</option>
                    @endif
                  </select>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Continue</button>
                </div>
              </form>
            @else
              <p class="text-center"><strong>Unable to enroll. You have active enrollment.</strong></p>
            @endif
          @else
            <p class="text-center"><strong>Enrollment is Not Active</strong></p>
          @endif
          
        </div>
      </div>
  </div>
@endsection
 