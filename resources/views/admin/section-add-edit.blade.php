@extends('layouts.app')

@section('title') Section @endsection

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
            <h1>{{ $section == null ? 'Add Section' : 'Update Section' }}</h1>
            <p>
              <a href="{{ route('admin.sections') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Sections</a>
            </p>
            @include('includes.all')
            <form action="{{ route('admin.store.section') }}" method="POST" autocomplete="off">
              @csrf
              <input type="hidden" name="section_id" value="{{ $section != null ? $section->id : '' }}">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Section Name</label>
                    <input type="text" name="name" id="name" value="{{ $section != null ? $section->name : '' }}" class="form-control" placeholder="Enter Section Name" autofocus="" required>
                    <span class="help-block small"></span>
                    @if ($errors->has('name'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                      </span>
                    @endif
                  </div>


                  <div class="form-group">
                    <label for="grade_level">Grade Level</label>
                    <select name="grade_level" id="grade_level" class="form-control selectpicker" data-live-search="true" required>
                      <option value="7" {{ $section != null ? $section->grade_level == 7 ? 'selected' : '' : '' }}>Grade 7</option>
                      <option value="8" {{ $section != null ? $section->grade_level == 8 ? 'selected' : '' : '' }}>Grade 8</option>
                      <option value="9" {{ $section != null ? $section->grade_level == 9 ? 'selected' : '' : '' }}>Grade 9</option>
                      <option value="10" {{ $section != null ? $section->grade_level == 10 ? 'selected' : '' : '' }}>Grade 10</option>
                      <option value="11" {{ $section != null ? $section->grade_level == 11 ? 'selected' : '' : '' }}>Grade 11</option>
                      <option value="12" {{ $section != null ? $section->grade_level == 12 ? 'selected' : '' : '' }}>Grade 12</option>
                    </select>
                    <span class="help-block small"></span>
                    @if ($errors->has('name'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                      </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="student_limit">Student Limit</label>
                    <input type="number" name="student_limit" id="student_limit" value="{{ $section != null ? $section->student_limit : '' }}" class="form-control" placeholder="Enter Section Name" autofocus="" required>
                    <span class="help-block small"></span>
                    @if ($errors->has('student_limit'))
                      <span class="invalid-feedback text-red" role="alert">
                        <strong>{{ $errors->first('student_limit') }}</strong>
                      </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ $section == null ? 'Add Section' : 'Update Section' }}</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
@endsection
 