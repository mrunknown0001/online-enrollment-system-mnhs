@extends('layouts.app')

@section('title') Student Management @endsection

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
            <h1>Student Management</h1>
            <p>
              <button class="btn btn-warning" onclick="reloadTable()"><i class="fa fa-refresh"></i> Reload Table</button> 
              {{-- <a href="{{ route('admin.print.student.list') }}" class="btn btn-primary"><i class="fa fa-print"></i> Print Student List</a> --}}
            </p>
            @include('includes.all')

            <table id="students" class="table table-hover table-bordered table-striped">
                <thead>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>LRN</th>
                    <th>Action</th>
                </thead>
            </table>
          </div>
        </div>
    </div>
<script>
  $(document).ready(function() {
    $('#students').DataTable({
      ajax: {
        url: "{{ route('all.students') }}",
        dataSrc: ""
      },
      columns: [
        { data: 'lastname' },
        { data: 'firstname' },
        { data: 'lrn' },
        { data: 'action' }
      ]
    });
  } );

  function reloadTable() {
    // reload data datables
    var table = $('#students').DataTable();
    table.ajax.reload();
  }
</script>
@endsection
 