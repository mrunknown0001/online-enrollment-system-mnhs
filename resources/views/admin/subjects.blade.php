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
              <button class="btn btn-warning" onclick="reloadTable()"><i class="fa fa-refresh"></i> Reload Table</button>
            </p>
            @include('includes.all')

            <table id="subjects" class="table table-hover table-bordered table-striped">
                <thead>
                    <th>Subject Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </thead>
                <tfoot>
                    <th>Subject Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tfoot>
            </table>
          </div>
        </div>
    </div>
<script>
  $(document).ready(function() {
    $('#subjects').DataTable({
      ajax: {
        url: "{{ route('all.subjects') }}",
        dataSrc: ""
      },
      columns: [
        { data: 'title' },
        { data: 'description' },
        { data: 'action' }
      ]
    });
  } );

  function reloadTable() {
    // reload data datables
    var table = $('#subjects').DataTable();
    table.ajax.reload();
  }
</script>
@endsection
 