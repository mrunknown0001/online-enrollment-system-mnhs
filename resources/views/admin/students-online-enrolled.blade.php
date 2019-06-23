@extends('layouts.app')

@section('title') Online Enrolled Students @endsection

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
            <h1>Online Enrolled Students</h1>
            <div class="row">
              <div class="col-md-3">
                <form>
                  <input type="hidden" name="current" id="current" value="{{ $ay }}">
                  <div class="form-group">
                    <select onchange="selectChange()" class="form-control" name="academic_year" id="academic_year">
                      <option value="">Select Academic Year</option>
                      @if(count($ays) > 0)
                        @foreach($ays as $a)  
                          <option value="{{ $a->academic_year }}">{{ $a->academic_year }}</option>
                        @endforeach
                      @else
                        <option value="">No Record</option>
                      @endif
                    </select>
                  </div>
                </form>
              </div>
            </div>
            @include('includes.all')

            <table id="students" class="table table-hover table-bordered table-striped">
                <thead>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>LRN</th>
                    <th>Grade &amp; Section</th>
                    <th>Status</th>
                    <th>Date Enrolled</th>
                </thead>
            </table>
          </div>
        </div>
    </div>
<script>
  $(document).ready(function() {
    var ay = null;
    $('#students').DataTable({
      ajax: {
        url: "/admin/student/online/enrolled/students/" + ay,
        dataSrc: ""
      },
      columns: [
        { data: 'lastname' },
        { data: 'firstname' },
        { data: 'lrn' },
        { data: 'grade_section' },
        { data: 'status' },
        { data: 'date_enrolled' }
      ],
      destroy: true,
    });
  } );

  function selectChange() {
    var ay = document.getElementById("academic_year").value;
    if(ay == '') {
      ay = 'null';
    }
    // alert(ay);
    $('#students').DataTable({
      ajax: {
        url: "/admin/student/online/enrolled/students/" + ay,
        dataSrc: ""
      },
      columns: [
        { data: 'lastname' },
        { data: 'firstname' },
        { data: 'lrn' },
        { data: 'grade_section' },
        { data: 'status' },
        { data: 'date_enrolled' }
      ],
      destroy: true,
    });
  }
</script>
@endsection
 