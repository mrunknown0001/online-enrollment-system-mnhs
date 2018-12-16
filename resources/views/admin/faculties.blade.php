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
            </p>
            <table id="faculties" class="table">
              <thead>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Employee ID</th>
                <th>Action</th>
              </thead>
              <tfoot>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Employee ID</th>
                <th>Action</th>
              </tfoot>
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
</script>
@endsection
 