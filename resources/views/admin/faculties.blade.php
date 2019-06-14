@extends('layouts.app')

@section('title') Faculty Management @endsection

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
            <h1>Faculty Management</h1>
            <p>
              <a href="{{ route('admin.add.faculty') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Faculty</a>
              <button class="btn btn-warning" onclick="reloadTable()"><i class="fa fa-refresh"></i> Reload Table</button>
              {{-- <a href="{{ route('admin.faculty.assignments') }}" class="btn btn-info"><i class="fa fa-user"></i> Faculty Subject Assignment</a>
              <a href="{{ route('admin.designations') }}" class="btn btn-warning"><i class="fa fa-tasks"></i> Designations</a> --}}
            </p>
            @include('includes.all')
            <table id="faculties" class="table table-hover table-bordered table-striped">
              <thead>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Employee ID</th>
                <th>Action</th>
              </thead>
            </table>
          </div>
        </div>
    </div>
<script>
  $(document).ready(function() {
    $('#faculties').DataTable({
      ajax: {
        url: "{{ route('all.faculties') }}",
        dataSrc: ""
      },
      columns: [
        { data: 'lastname' },
        { data: 'firstname' },
        { data: 'employee_id' },
        { data: 'action' }
      ]
    });
  } );


  function remove_faculty($id) {
    if(confirm("Are you sure you want to remove faculty?")) {
      $.ajax({
        url: '/admin/remove/faculty/' + $id,
        type: "get"
      });
      alert('Faculty Removed!');

      // reload data datables
      var table = $('#faculties').DataTable();
      table.ajax.reload();
    }
    else {
      alert('Deletion Cancelled!');
    }

  }


  function reloadTable() {
    // reload data datables
    var table = $('#faculties').DataTable();
    table.ajax.reload();
  }
</script>
@endsection
 