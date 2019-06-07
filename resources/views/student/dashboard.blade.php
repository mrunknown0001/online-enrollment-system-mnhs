@extends('layouts.app')

@section('title') Student Dashboard @endsection

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
            <h1>Student Dashboard</h1>
        </div>
        <div class="col-md-12">
        	<p>Fullname: <strong>{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</strong></p>
            <p>LRN: <strong>{{ Auth::user()->student_number }}</strong></p>
            <p>Grade & Section: <strong>
                Grade {{ Auth::user()->info->grade_level }} - {{ Auth::user()->info->section->name }}
            </strong></p>
            <p>Gender: <strong>{{ Auth::user()->info->gender }}</strong></p>
            <p>Birthday: <strong>{{ Auth::user()->info->birthday }}</strong></p>
            <p>Address: <strong>{{ Auth::user()->info->address }}</strong></p>
            <p>Nationality: <strong>{{ Auth::user()->info->nationality }}</strong></p>
            <p>Father's Name: <strong>{{ Auth::user()->info->father }}</strong></p>
            <p>Mother's Name: <strong>{{ Auth::user()->info->mother }}</strong></p>
        </div>
    </div>
</div>
@endsection
 