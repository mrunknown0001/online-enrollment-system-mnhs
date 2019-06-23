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
            <form action="{{ route('admin.schedule.store') }}" method="POST" autocomplete="off">
              {{ csrf_field() }}
              <input type="hidden" name="section_id" value="{{ encrypt($section->id) }}">
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
                {{-- <label for="day">Select Day</label>
                <select name="day" id="day" class="form-control selectpicker" data-live-search="true" required>
                  <option value="">Select Day</option>
                  @foreach($days as $d)
                    <option value="{{ $d['id'] }}">{{ $d['name'] }}</option>
                  @endforeach
                </select> --}}
                <div class="row">
                  <div class="col-md-6">
                    <p><label for="mon">
                      Monday
                      <input type="checkbox" name="day[]" id="mon" value="M">
                    </label></p>
                    <p><label for="tue">
                      Tuesday
                      <input type="checkbox" name="day[]" id="tue" value="T">
                    </label></p>
                    <p><label for="wed">
                      Wednesday
                      <input type="checkbox" name="day[]" id="wed" value="W">
                    </label></p>                    
                  </div>
                  <div class="col-md-6">
                    <p><label for="thu">
                      Thursday
                      <input type="checkbox" name="day[]" id="thu" value="Th">
                    </label></p>
                    <p><label for="fri">
                      Friday
                      <input type="checkbox" name="day[]" id="fri" value="F">
                    </label></p>
                    <p><label for="sat">
                      Saturday
                      <input type="checkbox" name="day[]" id="sat" value="S">
                    </label></p>
                  </div>
                </div>

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
                  <select name="start_time" class="form-control" required>
                    <option value="">Select Start Time</option>
                    @foreach($time as $t)
                      <option value="{{ $t['id'] }}">{{ $t['time'] }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6 form-group">
                  <label>End Time</label>
                  <select name="end_time" class="form-control" required>
                    <option value="">Select End Time</option>
                    @foreach($time as $t)
                      <option value="{{ $t['id'] }}">{{ $t['time'] }}</option>
                    @endforeach
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
 