@extends('layouts.app')

@section('title') My Students @endsection

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
            <h1>My Students</h1>
            @include('includes.all')
        </div>
    </div>
</div>
@endsection
 