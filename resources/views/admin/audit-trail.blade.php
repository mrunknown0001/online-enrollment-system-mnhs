@extends('layouts.app')

@section('title') Activity Logs @endsection

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
            <h1>Activity Logs <small>Audit Trails</small></h1>
            <table id="logs" class="table table-hover table-striped table-bordered">
                <thead>
                    <th>User</th>
                    <th>Activity</th>
                    <th>Date &amp; Time</th>
                </thead>
            </table>
          </div>
        </div>
    </div>
<script>
  $(document).ready(function() {
    $('#logs').DataTable({
      ajax: {
        url: "{{ route('all.activity.logs') }}",
        dataSrc: ""
      },
      columns: [
        { data: 'user' },
        { data: 'activity' },
        { data: 'created_at' }
      ],
      "order": [[ 2, 'desc' ]]
    });
  } );
</script>
@endsection
 