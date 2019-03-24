@extends('layouts.app')

@section('title') Schedules @endsection

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
            <h1>Schedules</h1>
            <p>
            	<button class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i></button>
            </p>
            @include('includes.all')
        </div>
    </div>
</div>
@endsection
 