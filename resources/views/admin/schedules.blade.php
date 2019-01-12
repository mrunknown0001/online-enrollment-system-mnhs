@extends('layouts.app')

@section('title') Schedules @endsection

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
        <h1>Schedules</h1>
        <p>
          <a href="{{ route('admin.schedule.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Schedule</a>
          <a href="{{ route('admin.rooms') }}" class="btn btn-primary"><i class="fa fa-building"></i> Room Management</a>
        </p>
        @include('includes.success')
        @include('includes.error')
        <table id="schedules" class="table table-hover table-bordered table-striped">
          <thead>
            <th>Grade &amp; Section</th>
            <th>Day</th>
            <th>Room</th>
            <th>Time</th>
            <th>Subject</th>
            <th>Action</th>
          </thead>
        </table>
      </div>
    </div>
</div>
<script>
  $(document).ready(function() {
    $('#schedules').DataTable({
      ajax: {
        url: "{{ route('all.schedules') }}",
        dataSrc: ""
      },
      columns: [
        { data: 'section' },
        { data: 'day' },
        { data: 'room' },
        { data: 'time', },
        { data: 'subject' },
        { data: 'action' }
      ]
    });
  } );

  function reloadTable() {
    // reload data datables
    var table = $('#schedules').DataTable();
    table.ajax.reload();
  }

  function removeSched($id) {
    if(confirm("Are you sure you want to remove Schedule?")) {
      $.ajax({
        url: '/admin/remove/schedule/' + $id,
        type: "get"
      });
      alert('Schedule Removed!');

      // reload data datables
      var table = $('#schedules').DataTable();
      table.ajax.reload();
    }
    else {
      alert('Deletion Cancelled!');
    }
  }
</script>
@endsection
 