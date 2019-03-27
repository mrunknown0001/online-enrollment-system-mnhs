@extends('layouts.app')

@section('title') Student Evaluation @endsection

@section('sidebar')
    @include('student.includes.sidebar')
@endsection

@section('header')
    @include('student.includes.header')
@endsection

@section('content')
<div class="section-admin container-fluid">
    <div class="row">
        <div class="col-md-12">
            <br><br><br>
            <h1>Student Evaluation</h1>
        </div>
    </div>
</div>
@endsection
 