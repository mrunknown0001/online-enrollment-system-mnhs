@extends('layouts.app')

@section('title') Student Schedule @endsection

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
            <h1>Student Schedule</h1>
			<p>
				<button class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i></button>
			</p>
			@include('includes.all')

            @if($schedules != NULL)
                <div id="printArea">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <th>Subject</th>
                            <th>Room</th>
                            <th>Day</th>
                            <th>Time</th>
                        </thead>
                        <tbody>
                            @foreach($schedules as $s)
    	                        <tr>
    	                            <td>{{ $s['subject'] }}</td>
    	                            <td>{{ $s['room'] }}</td>
    	                            <td>{{ $s['day'] }}</td>
    	                            <td>
    	                                {{ $s['start_time'] }} - {{ $s['end_time'] }}
    	                            </td>
    	                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else 
                <p class="text-center">NO Schedules Available.</p>
            @endif
        </div>

    </div>
</div>
@endsection
 