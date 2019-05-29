@extends('layouts.app')

@section('title') Designations @endsection

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
            <h1>Designations</h1>
            <p>
              <button class="btn btn-warning" onclick="reloadTable()"><i class="fa fa-refresh"></i> Reload Table</button>
            </p>

            <table id="designations" class="table table-hover table-bordered table-striped">
              <thead>
                <th>Name</th>
                <th>Position</th>
                <th>Department</th>
                <th>Action</th>
              </thead>
            </table>
          </div>
      </div>
  </div>


<script>
  $(document).ready(function() {
    $('#designations').DataTable({
      ajax: {
        url: "{{ route('all.designations') }}",
        dataSrc: ""
      },
      columns: [
        { data: 'name' },
        { data: 'position' },
        { data: 'department' },
        { data: 'action' }
      ]
    });
  } );



  function reloadTable() {
    // reload data datables
    var table = $('#designations').DataTable();
    table.ajax.reload();
  }
</script>
@endsection
 