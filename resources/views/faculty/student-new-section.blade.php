@extends('layouts.app')

@section('title') Students @endsection

@section('sidebar')
    @include('faculty.includes.sidebar')
@endsection

@section('header')
    @include('faculty.includes.header')
@endsection

@section('content')
<div class="section-admin container-fluid">
    <div class="row">
        <div class="col-md-12">
            <br><br><br>
            <h1>Register Existing Student</h1>
            <h2><small>Choose Section</small></h2>
        </div>
    </div>
</div>
@endsection
 