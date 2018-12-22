@extends('layouts.app')

@section('title') Subject @endsection

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
            <h1>{{ $subject == null ? 'Add Subject' : 'Update Subject' }}</h1>
            <p>
              <a href="{{ route('admin.subjects') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Subjects</a>
            </p>
            @include('includes.success')
            @include('includes.error')
            <form action="{{ route('admin.store.subject') }}" method="POST" autocomplete="off">
              @csrf
              <input type="hidden" name="subject_id" value="{{ $subject != null ? $subject->id : '' }}">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="title">Subject Title</label>
                    <input type="text" name="title" id="title" value="{{ $subject != null ? $subject->title : '' }}" class="form-control" placeholder="Enter Subject Title" autofocus="" required>
                    <span class="help-block small"></span>
                    @if ($errors->has('title'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="code">Subject Code</label>
                    <input type="text" name="code" id="code" value="{{ $subject != null ? $subject->code : '' }}" class="form-control" placeholder="Enter Subject Code" required="">
                    <span class="help-block small"></span>
                    @if ($errors->has('code'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('code') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="description">Subject Description</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Enter Subject Description" required>{{ $subject != null ? $subject->description : '' }}</textarea>
                    <span class="help-block small"></span>
                    @if ($errors->has('description'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="prerequisite">Subject Prerequisite</label>
                    <select name="prerequisite" id="prerequisite" class="form-control selectpicker" data-live-search="true">
                      <option data-token="" value=""></option>
                    </select>
                    <span class="help-block small"></span>
                    @if ($errors->has('prerequisite'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('prerequisite') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ $subject == null ? 'Add Subject' : 'Update Subject' }}</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
@endsection
 