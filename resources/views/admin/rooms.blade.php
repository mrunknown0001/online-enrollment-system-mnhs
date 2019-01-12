@extends('layouts.app')

@section('title') Room Mangement @endsection

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
        <h1>Room Mangement</h1>
        <p>
          <a href="{{ route('admin.schedules') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Schedules</a> <a href="{{ route('admin.room.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Room</a>
        </p>
        @include('includes.all')
        <table id="rooms" class="table table-hover table-bordered table-striped">
          <thead>
            <th>Room Name</th>
            <th>Description</th>
            <th>Action</th>
          </thead>
        </table>
      </div>
      </div>
  </div>
<script>
  $(document).ready(function() {
    $('#rooms').DataTable({
      ajax: {
        url: "{{ route('all.rooms') }}",
        dataSrc: ""
      },
      columns: [
        { data: 'name' },
        { data: 'description' },
        { data: 'action' }
      ]
    });
  } );

  function reloadTable() {
    // reload data datables
    var table = $('#rooms').DataTable();
    table.ajax.reload();
  }

  function removeRoom($id) {
    if(confirm("Are you sure you want to remove Room?")) {
      $.ajax({
        url: '/admin/remove/room/' + $id,
        type: "get"
      });
      alert('Section Removed!');

      // reload data datables
      var table = $('#rooms').DataTable();
      table.ajax.reload();
    }
    else {
      alert('Deletion Cancelled!');
    }
  }
</script>
@endsection
 