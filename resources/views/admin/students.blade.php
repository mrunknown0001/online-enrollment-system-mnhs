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
            </p>
            @include('includes.all')

            <table id="students" class="table">
                <thead>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>LRN</th>
                    <th>Action</th>
                </thead>
                <tfoot>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>LRN</th>
                    <th>Action</th>
                </tfoot>
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
 