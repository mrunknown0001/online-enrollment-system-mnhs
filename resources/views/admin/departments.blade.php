@extends('layouts.app')

@section('title') Departments @endsection

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
            <h1>Departments</h1>
            <p>
              <a href="{{ route('admin.department.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Department</a>
              <button class="btn btn-warning" onclick="reloadTable()"><i class="fa fa-refresh"></i> Reload Table</button>
            </p>

            <table id="departments" class="table table-hover table-bordered table-striped">
              <thead>
                <th>Department Name</th>
                <th>Department Description</th>
                <th>Action</th>
              </thead>
            </table>
          </div>
      </div>
  </div>


<script>
  $(document).ready(function() {
    $('#departments').DataTable({
      ajax: {
        url: "{{ route('all.departments') }}",
        dataSrc: ""
      },
      columns: [
        { data: 'department_name' },
        { data: 'department_description' },
        { data: 'action' }
      ]
    });
  } );


  function remove_department($id) {
    if(confirm("Are you sure you want to remove department?")) {
      $.ajax({
        url: '/admin/department/remove/' + $id,
        type: "get"
      });
      alert('Department Removed!');

      // reload data datables
      var table = $('#departments').DataTable();
      table.ajax.reload();
    }
    else {
      alert('Deletion Cancelled!');
    }

  }


  function reloadTable() {
    // reload data datables
    var table = $('#departments').DataTable();
    table.ajax.reload();
  }
</script>
@endsection
 