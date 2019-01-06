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
              <a href="{{ route('admin.senior.subjects') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Senior High Subject Management</a>
            </p>
            @include('includes.all')
            <form action="{{ route('admin.senior.subject.store') }}" method="POST" autocomplete="off">
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
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="prerequisite">Subject Prerequisite</label>
                    <select name="prerequisite" id="prerequisite" class="form-control selectpicker" data-live-search="true">
                      <option data-token="" value=""></option>
                      @if(count($subjects) > 0)
                        @foreach($subjects as $s)
                          @if($subject != null && $subject->id != $s->id)
                            <option data-token="" value="{{ $s->id }}" {{ $subject != null ? $subject->prerequisite == $s->id ? 'selected' : '' : '' }}>{{ $s->title }} for Grade {{ $s->grade_level }}</option>
                          @endif
                        @endforeach
                      @endif
                      
                    </select>
                    <span class="help-block small"></span>
                    @if ($errors->has('prerequisite'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('prerequisite') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="grade_level">Grade Level</label>
                    <select name="grade_level" id="grade_level" class="form-control selectpicker" data-live-search="true" required>
                      <option data-token="" value="11" {{ $subject != null ? $subject->grade_level == 11 ? 'selected' : '' : '' }}>Grade 11</option>
                      <option data-token="" value="12" {{ $subject != null ? $subject->grade_level == 12 ? 'selected' : '' : '' }}>Grade 12</option>
                    </select>
                    <span class="help-block small"></span>
                    @if ($errors->has('grade_level'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('grade_level') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="strand">Select Strand</label>
                    <select name="strand" id="strand" class="form-control selectpicker" data-live-search="true" required>
                      @if(count($strands) > 0)
                        @foreach($strands as $s)
                          <option data-token="" value="{{ $s->id }}" {{ $subject != null ? $subject->strand_id == $s->id ? 'selected' : '' : '' }}>{{ $s->name }}</option>
                        @endforeach
                      @else
                        <option data-token="" value=""></option>
                      @endif
                      
                    </select>
                    <span class="help-block small"></span>
                    @if ($errors->has('strand'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('strand') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="semester">Select Semester</label>
                    <select name="semester" id="semester" class="form-control selectpicker" data-live-search="true" rqeuired>
                      <option data-token="" value="1" {{ $subject != null ? $subject->semester == 1 ? 'selected' : '' : '' }}>First Semester</option>
                      <option data-token="" value="2" {{ $subject != null ? $subject->semester == 2 ? 'selected' : '' : '' }}>Second Semester</option>
                    </select>
                    <span class="help-block small"></span>
                    @if ($errors->has('semester'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('semester') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ $subject == null ? 'Add Subject' : 'Update Subject' }}</button>
              </div>
            </form>
          </div>
        </div>
    </div>
@endsection
 