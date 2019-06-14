@extends('layouts.app')

@section('title') Admin Management @endsection

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
            <h1>Admin Management</h1>
            <p>
              <a href="{{ route('admin.add.admin') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Admin</a>
              <button class="btn btn-warning" onclick="reloadTable()"><i class="fa fa-refresh"></i> Reload Table</button>
            </p>
            @include('includes.all')
            <table id="admins" class="table table-hover table-bordered table-striped">
              <thead>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Admin ID</th>
                <th>Action</th>
              </thead>
            </table>
          </div>
        </div>
    </div>
<script>
  $(document).ready(function() {
    $('#admins').DataTable({
      ajax: {
        url: "{{ route('all.admins') }}",
        dataSrc: ""
      },
      columns: [
        { data: 'lastname' },
        { data: 'firstname' },
        { data: 'admin_id' },
        { data: 'action' }
      ]
    });
  } );


  function remove_admin($id) {
    if(confirm("Are you sure you want to remove admin?")) {
      $.ajax({
        url: '/admin/remove/admin/' + $id,
        type: "get"
      });
      alert('Admin Removed!');

      // reload data datables
      var table = $('#admins').DataTable();
      table.ajax.reload();
    }
    else {
      alert('Deletion Cancelled!');
    }

  }


  function reloadTable() {
    // reload data datables
    var table = $('#admins').DataTable();
    table.ajax.reload();
  }
</script>
@endsection
 