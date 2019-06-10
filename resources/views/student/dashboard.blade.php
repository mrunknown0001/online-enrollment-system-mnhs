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
            <table class="table table-hover table-bordered table-striped">
                <tr>
                    <td>Fullname</td>
                    <td><strong>{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</strong></td>
                </tr>
                <tr>
                  <td>LRN</td>
                  <td><strong>{{ Auth::user()->student_number }}</strong></td>
                </tr>
                <tr>
                  <td>Grade & Section</td>
                  <td><strong>Grade {{ Auth::user()->info->grade_level }} - {{ Auth::user()->info->section->name }}</strong></td>
                </tr>
                <tr>
                  <td>Gender</td>
                  <td><strong>{{ Auth::user()->info->gender }}</td>
                </tr>
                <tr>
                  <td>Birthday</td>
                  <td><strong>{{ Auth::user()->info->birthday }}</strong></td>
                </tr>
                <tr>
                  <td>Home Address</td>
                  <td><strong>{{ Auth::user()->info->address }}</strong></td>
                </tr>
                <tr>
                  <td>Nationality</td>
                  <td><strong>{{ Auth::user()->info->nationality }}</strong></td>
                </tr>
                <tr>
                  <td>Father's Name</td>
                  <td><strong>{{ Auth::user()->info->father }}</strong></td>
                </tr>
                <tr>
                  <td>Mother's Name</td>
                  <td><strong>{{ Auth::user()->info->mother }}</strong></td>
                </tr>
            </table>
        	
        </div>
    </div>
</div>
@endsection
 