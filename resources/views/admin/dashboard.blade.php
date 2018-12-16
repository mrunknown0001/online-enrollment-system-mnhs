@extends('layouts.app')

@section('title') Admin Dashboard @endsection

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
            <h1>Admin Dashboard</h1>
          </div>
        </div>
    </div>
@endsection
 