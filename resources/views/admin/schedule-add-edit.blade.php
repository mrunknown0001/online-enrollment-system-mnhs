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
            <h1>{{ $schedule != null ? 'Update Schedule' : 'Add Schedule' }}</h1>
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
                <label for="section">Select Year Level &amp; Section</label>
                <select name="section" id="section" class="form-control selectpicker" data-live-search="true">
                  <option value="">Select Year Level &amp; Section</option>
                  @if(count($sections) > 0)
                    @foreach($sections as $s)
                      <option value="{{ $s->id }}">Grade {{ $s->grade_level }} - {{ $s->name }}</option>
                    @endforeach
                  @endif
                </select>
                <span class="help-block small"></span>
                @if ($errors->has('section'))
                  <span class="invalid-feedback text-red" role="alert">
                    <strong>{{ $errors->first('section') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="room">Select Room</label>
                <select name="room" id="room" class="form-control selectpicker" data-live-search="true">
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
            </form>
          </div>
        </div>
    </div>
@endsection
 