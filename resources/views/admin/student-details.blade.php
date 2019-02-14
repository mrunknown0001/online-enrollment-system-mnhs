@extends('layouts.app')

@section('title') Student Details @endsection

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
            <div class="breadcome-area">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list"> Student Details </div>
                  </div>
                </div>
              </div>
          </div>
          
          <div class="row">
            <div class="col-md-12">
              <h1>Student Details</h1>
              @include('includes.all')

            </div>
          </div>
          



        </div>
    </div>
@endsection
 