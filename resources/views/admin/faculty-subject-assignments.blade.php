@extends('layouts.app')

@section('title') Faculty Subject Assignments @endsection

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
          <h1> Faculty Subject Assignments </h1>
          <p>
            <a href="{{ route('admin.faculty.assignments.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Subject Assignment</a>
            <button class="btn btn-warning" onclick="reloadTable()"><i class="fa fa-refresh"></i> Reload Table</button>
          </p>

          @include('includes.all')

          <table id="faculty_assignments" class="table table-hover table-bordered table-striped">
              <thead>
                <th>Faculty</th>
                <th>Grade &amp; Section</th>
                <th>Subject</th>
                <th>Action</th>
              </thead>
            </table>
        </div>
      </div>
  </div>

<script>
  $(document).ready(function() {
    $('#faculty_assignments').DataTable({
      ajax: {
        url: "{{ route('all.faculty.assignments') }}",
        dataSrc: ""
      },
      columns: [
        { data: 'faculty' },
        { data: 'grade_section' },
        { data: 'subject' },
        { data: 'action' }
      ]
    });
  } );

  function remove_assignment($id) {
    if(confirm("Are you sure you want to remove faculty assignment?")) {
      $.ajax({
        url: '/admin/remove/faculty/assignment/' + $id,
        type: "get"
      });
      alert('Faculty Assignment Removed!');

      // reload data datables
      var table = $('#faculty_assignments').DataTable();
      table.ajax.reload();
    }
    else {
      alert('Deletion Cancelled!');
    }

  }


  function reloadTable() {
    // reload data datables
    var table = $('#faculty_assignments').DataTable();
    table.ajax.reload();
  }
</script>
@endsection
 