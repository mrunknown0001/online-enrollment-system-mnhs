@extends('layouts.app')

@section('title') Grades @endsection

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
          <h1>Grades</h1>
          <p>
            <button class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i></button>
          </p>
        </div>
        <div class="col-md-12">
          @include('includes.all')
          
          @if($grades > 0)
            <table id="grades" class="table table-hover table-striped table-bordered">
              <thead>
                <th>Grade Level</th>
                <th>Subjet</th>
                <th>Grade</th>
              </thead>
            </table>
          @else
            <p class="text-center">No Grades Available.</p>
          @endif
        </div>
      </div>
  </div>
<script>
  $(document).ready(function() {
    $('#grades').DataTable({
      ajax: {
        url: "{{ route('student.grades.all') }}",
        dataSrc: ""
      },
      columns: [
        { data: 'grade_level' },
        { data: 'subject' },
        { data: 'grade' }
      ],
      "order": [[ 0, 'asc' ], [ 1, 'asc']]
    });
  } );
</script>
@endsection
 