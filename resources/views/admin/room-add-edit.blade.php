@extends('layouts.app')

@section('title') Room Mangement @endsection

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
        <h1>{{ $room != null ? 'Update Room' : 'Add Room' }}</h1>
        <p>
          <a href="{{ route('admin.rooms') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Room Management</a>
        </p>
        @include('includes.all')
      </div>
      <div class="col-md-6">
        <form action="{{ route('admin.room.store') }}" method="POST" autocomplete="off">
          {{ csrf_field() }}
          <input type="hidden" name="room_id" value="{{ $room != null ? $room->id : '' }}">
          <div class="form-group">
            <label for="name">Room Name</label>
            <input type="text" name="name" id="name" value="{{ $room != null ? $room->name : '' }}" class="form-control" placeholder="Enter Room Name" autofocus="" required onkeydown="return alphaOnly(event);">
            <span class="help-block small"></span>
            @if ($errors->has('name'))
              <span class="invalid-feedback text-red" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group">
            <label for="description">Room Description <i>(Optional)</i></label>
            <input type="text" name="description" id="description" value="{{ $room != null ? $room->description : '' }}" class="form-control" placeholder="Optional">
            <span class="help-block small"></span>
            @if ($errors->has('description'))
              <span class="invalid-feedback text-red" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ $room != null ? 'Update Room' : 'Add Room' }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<script>
  function alphaOnly(event) {
    var key = event.keyCode;
    return ((key >= 65 && key <= 90) || key == 8 || key == 32);
  }
</script>
@endsection
 