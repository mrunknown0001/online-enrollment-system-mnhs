@extends('layouts.app')

@section('title') Subject Management @endsection

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
            <h1>Subject Management</h1>
            <p>
              <a href="{{ route('admin.subjects') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Junior High Subject Management</a>
              <a href="{{ route('admin.add.senior.subject') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Senior High Subject</a>
              <button class="btn btn-warning" onclick="reloadTable()"><i class="fa fa-refresh"></i> Reload Table</button>
            </p>
            @include('includes.all')

            <table id="subjects" class="table table-hover table-bordered table-striped">
                <thead>
                    <th>Subject Title</th>
                    <th>Code</th>
                    <th>Strand</th>
                    <th>Prerequisite</th>
                    <th>Grade Level</th>
                    <th>Semester</th>
                    <th>Action</th>
                </thead>
            </table>
          </div>
        </div>
    </div>
<script>
  $(document).ready(function() {
    $('#subjects').DataTable({
      ajax: {
        url: "{{ route('all.subjects.senior') }}",
        dataSrc: ""
      },
      columns: [
        { data: 'title' },
        { data: 'code' },
        { data: 'strand' },
        { data: 'prerequisite' },
        { data: 'grade_level' },
        { data: 'semester' },
        { data: 'action' }
      ]
    });
  } );

  function reloadTable() {
    // reload data datables
    var table = $('#subjects').DataTable();
    table.ajax.reload();
  }

  function removeSubject($id) {
    if(confirm("Are you sure you want to remove subject?")) {
      $.ajax({
        url: '/admin/remove/subject/' + $id,
        type: "get"
      });
      alert('Subject Removed!');

      // reload data datables
      var table = $('#subjects').DataTable();
      table.ajax.reload();
    }
    else {
      alert('Deletion Cancelled!');
    }
  }
</script>
@endsection
 