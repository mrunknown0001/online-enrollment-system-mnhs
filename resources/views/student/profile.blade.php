@extends('layouts.app')

@section('title') Profile @endsection

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
          <h1>Profile</h1>
        </div>
        <div class="col-md-12">
          @include('includes.all')
          <p>
            Fullname &amp; LRN: {{ Auth::user()->fullname() }} / {{ Auth::user()->student_number }}
          </p>
          <p>
            Gender, Birthday &amp; Nationality: {{ Auth::user()->info->gender }}
            / {{ date('F j, Y', strtotime(Auth::user()->info->birthday)) }}
            / {{ Auth::user()->info->nationality }}
          </p>
          <p>
            Address: {{ Auth::user()->info->address }}
          </p>
          <p>
            Parents: {{ Auth::user()->info->father }} &amp; {{ Auth::user()->info->mother }}
          </p>
          <p>
            Email &amp; Mobile Number: {{ Auth::user()->email != null ? Auth::user()->email : 'N/A' }} &amp; {{ Auth::user()->mobile_number != null ? Auth::user()->mobile_number : 'N/A' }}
          </p>
          <p>
            <a href="{{ route('student.password') }}" class="btn btn-primary">Change Password</a>
          </p>
        </div>
      </div>
  </div>
@endsection
 