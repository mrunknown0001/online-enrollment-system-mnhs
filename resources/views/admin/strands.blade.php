@extends('layouts.app')

@section('title') Strands Management @endsection

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
            <h1>Strands Management</h1>
            <p>
              <a href="{{ route('admin.add.strand') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Strand</a>
              <button class="btn btn-warning" onclick="reloadTable()"><i class="fa fa-refresh"></i> Reload Table</button>
            </p>
            @include('includes.all')

            <table id="strands" class="table table-hover table-bordered table-striped">
                <thead>
                    <th>Strand Name</th>
                    <th>Strand Code</th>
                    <th>Track</th>
                    <th>Action</th>
                </thead>
            </table>
          </div>
        </div>
    </div>
<script>
  $(document).ready(function() {
    $('#strands').DataTable({
      ajax: {
        url: "{{ route('all.strands') }}",
        dataSrc: ""
      },
      columns: [
        { data: 'name' },
        { data: 'code' },
        { data: 'track' },
        { data: 'action' }
      ]
    });
  } );

  function reloadTable() {
    // reload data datables
    var table = $('#strands').DataTable();
    table.ajax.reload();
  }

  function removeStrand($id) {
    if(confirm("Are you sure you want to remove strand?")) {
      $.ajax({
        url: '/admin/remove/strand/' + $id,
        type: "get"
      });
      alert('Strand Removed!');

      // reload data datables
      var table = $('#strands').DataTable();
      table.ajax.reload();
    }
    else {
      alert('Deletion Cancelled!');
    }
  }
</script>
@endsection
 