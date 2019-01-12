@extends('layouts.app')

@section('title') Schedules @endsection

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
            <h1>Schedule for: Grade {{ $section->grade_level }} -  {{ $section->name }}</h1>
            <p>
              <a href="{{ route('admin.schedules') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Schedules</a>
            </p>
            @include('includes.success')
            @include('includes.error')
          </div>
          <div class="col-md-6">
            <form action="" method="POST" autocomplete="off">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="room">Select Room</label>
                <select name="room" id="room" class="form-control selectpicker" data-live-search="true" required>
                  <option value="">Select Room</option>
                  @if(count($rooms) > 0)
                    @foreach($rooms as $r)
                      <option value="{{ $r->id }}"> {{ $r->name }}</option>
                    @endforeach
                  @endif
                </select>
                <span class="help-block small"></span>
                @if ($errors->has('room'))
                  <span class="invalid-feedback text-red" role="alert">
                    <strong>{{ $errors->first('room') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="day">Select Day</label>
                <select name="day" id="day" class="form-control selectpicker" data-live-search="true" required>
                  <option value="">Select Day</option>
                  <option value="1">Monday</option>
                  <option value="2">Tuesday</option>
                  <option value="3">Wednesday</option>
                  <option value="4">Thursday</option>
                  <option value="5">Friday</option>
                  <option value="6">Saturday</option>
                </select>
                <span class="help-block small"></span>
                @if ($errors->has('day'))
                  <span class="invalid-feedback text-red" role="alert">
                    <strong>{{ $errors->first('day') }}</strong>
                  </span>
                @endif
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label>Start Time</label>
                  <select name="start_time" class="form-control">
                    
                  </select>
                </div>
                <div class="col-md-6 form-group">
                  <label>End Time</label>
                  <select name="end_time" class="form-control">
                    
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="subject">Select Subject</label>
                <select name="subject" id="subject" class="form-control selectpicker" data-live-search="true" required>
                  <option value="">Select Subject</option>
                  @if(count($subjects) > 0)
                    @foreach($subjects as $s)
                      <option value="{{ $s->id }}">{{ $s->title }}</option>
                    @endforeach
                  @endif
                </select>
                <span class="help-block small"></span>
                @if ($errors->has('subject'))
                  <span class="invalid-feedback text-red" role="alert">
                    <strong>{{ $errors->first('subject') }}</strong>
                  </span>
                @endif
              </div>              
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
    </div>
@endsection
 