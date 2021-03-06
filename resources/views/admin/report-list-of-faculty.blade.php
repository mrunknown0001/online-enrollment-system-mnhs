@extends('layouts.app')

@section('title') List of Faculty @endsection

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
        <h1>List of Faculty</h1>
        <p>
          <a href="{{ route('admin.reports') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Reports</a>
        </p>
        <div class="row">
          <div class="col-md-3">
            <form>
              <input type="hidden" id="current" value="{{ $ay != NULL ? $ay : '1' }}">
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
        <p>
          <button class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i></button>
        </p>
        @include('includes.all')
        <div id="printArea">
          @include('includes.print-header')
          <h5 class="text-center">Faculty Subject Assignment in School Year <span id="year"></span></h5>
          <table id="faculty" class="table table-hover table-bordered table-striped">
            <thead>
              <th>Faculty Name</th>
              <th>ID Number</th>
              <th>Grade &amp; Section</th>
              <th>Subject</th>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
<script>
  $(document).ready(function() {
    var ay = $("#current").val();
    // $("#year").val() = ay;
    $("#year").text(ay);
    $('#faculty').DataTable({
      ajax: {
        url: "/admin/reports/list-of-faculty/data/" + ay,
        dataSrc: ""
      },
      columns: [
        { data: 'faculty' },
        { data: 'id_number' },
        { data: 'grade_section' },
        { data: 'subject' },
      ],
      destroy: true,
      paging: false,
      searching: false,
      bInfo : false,
    });
  } );

  function selectChange() {
    var ay = document.getElementById("academic_year").value;
    // document.getElementById("year").value = ay;
    $("#year").text(ay);
    if(ay == '') {
      ay = 'null';
    }
    // alert(ay);
    $('#faculty').DataTable({
      ajax: {
        url: "/admin/reports/list-of-faculty/data/" + ay,
        dataSrc: ""
      },
      columns: [
        { data: 'faculty' },
        { data: 'id_number' },
        { data: 'grade_section' },
        { data: 'subject' },
      ],
      destroy: true,
      paging: false,
      searching: false,
      bInfo : false,
    });
  }
</script>
@endsection
 