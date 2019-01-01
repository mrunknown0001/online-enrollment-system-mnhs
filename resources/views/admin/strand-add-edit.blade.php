@extends('layouts.app')

@section('title') Strand @endsection

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
            <h1>{{ $strand == null ? 'Add Strand' : 'Update Strand' }}</h1>
            <p>
              <a href="{{ route('admin.strands') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Strands</a>
            </p>
            @include('includes.all')
            <form action="{{ route('admin.store.strand') }}" method="POST" autocomplete="off">
              @csrf
              <input type="hidden" name="strand_id" value="{{ $strand != null ? $strand->id : '' }}">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Strand Name</label>
                    <input type="text" name="name" id="name" value="{{ $strand != null ? $strand->name : '' }}" class="form-control" placeholder="Enter Strand Name" autofocus="" required>
                    <span class="help-block small"></span>
                    @if ($errors->has('name'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="code">Strand Code</label>
                    <input type="text" name="code" id="code" value="{{ $strand != null ? $strand->code : '' }}" class="form-control" placeholder="Enter Strand Code" required>
                    <span class="help-block small"></span>
                    @if ($errors->has('code'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('code') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="track">Select Track</label>
                    <select name="track" id="track" class="form-control selectpicker" data-live-search="true" required>
                      <option value="">Select Track</option>
                      <option value="Academic Track" {{ $strand != null ? $strand->track == 'Academic Track' ? 'selected' : '' : '' }}>Academic Track</option>
                      <option value="Technical-Vocational-Livelihood (TVL) Track" {{ $strand != null ? $strand->track == 'Technical-Vocational-Livelihood (TVL) Track' ? 'selected' : '' : '' }}>Technical-Vocational-Livelihood (TVL) Track</option>
                      <option value="Sports Track" {{ $strand != null ? $strand->track == 'Sports Track' ? 'selected' : '' : '' }}>Sports Track</option>
                      <option value="Arts and Design Track" {{ $strand != null ? $strand->track == 'Arts and Design Track' ? 'selected' : '' : '' }}>Arts and Design Track</option>
                    </select>
                    <span class="help-block small"></span>
                    @if ($errors->has('track'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('track') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ $strand == null ? 'Add Strand' : 'Update Strand' }}</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
@endsection
 