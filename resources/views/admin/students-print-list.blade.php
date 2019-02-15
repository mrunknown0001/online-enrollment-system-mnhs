@extends('layouts.app')

@section('title') Student Print @endsection

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('header')
    @include('admin.includes.header')
@endsection

@section('content')
    <div class="section-admin container-fluid">

      <br><br><br>
      <div class="row">
        <div class="col-md-12">
          <h1>Student Print</h1>
          @include('includes.all')
          <p>
            <a href="{{ route('admin.students') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Students</a>
          </p>
          
        </div>
        <div class="col-md-6 col-md-offset-3">
          <form action="" method="POST">
            <div class="form-group">
              <label for="filter">Filter</label>
              <select name="filter" id="filter" class="form-control">
                <option value="">Select a Filter</option>
                <option>Student Per Section and Year Level</option>
                <option>Student Per Year Level</option>

              </select>              
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Continue</button>
            </div>
          </form>
        </div>
      </div>
          
@endsection
 