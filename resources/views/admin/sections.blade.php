@extends('layouts.app')

@section('title') Section Management @endsection

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
            <h1>Section Management</h1>
            <p>
              <a href="{{ route('admin.add.section') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Section</a>
              <button class="btn btn-warning" onclick="reloadTable()"><i class="fa fa-refresh"></i> Reload Table</button>
            </p>
            @include('includes.all')

            <table id="sections" class="table table-hover table-bordered table-striped">
                <thead>
                    <th>Section Name</th>
                    <th>Grade Level</th>
                    <th>Enrolled</th>
                    <th>Student Limit</th>
                    <th>Action</th>
                </thead>
            </table>
          </div>
        </div>
    </div>
<script>
  $(document).ready(function() {
    $('#sections').DataTable({
      ajax: {
        url: "{{ route('all.sections') }}",
        dataSrc: ""
      },
      columns: [
        { data: 'name' },
        { data: 'grade_level' },
        { data: 'enrolled' },
        { data: 'limit' },
        { data: 'action' }
      ]
    });
  } );

  function reloadTable() {
    // reload data datables
    var table = $('#sections').DataTable();
    table.ajax.reload();
  }

  function removeSection($id) {
    if(confirm("Are you sure you want to remove section?")) {
      $.ajax({
        url: '/admin/remove/section/' + $id,
        type: "get"
      });
      alert('Section Removed!');

      // reload data datables
      var table = $('#sections').DataTable();
      table.ajax.reload();
    }
    else {
      alert('Deletion Cancelled!');
    }
  }
</script>
@endsection
 