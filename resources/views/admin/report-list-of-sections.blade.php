@extends('layouts.app')

@section('title') Reports @endsection

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
        <h1>List of Sections</h1>
        <p>
          <a href="{{ route('admin.reports') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Return to Reports</a>
        </p>
        <div class="row">
          <div class="col-md-3">
            <form>
              <div class="form-group">
                <input type="hidden" id="current" value="{{ $current != NULL ? $current : '1' }}">
                <select class="form-control" id="academic_year" onclick="selectChange()">
                  <option value="">Select School Year</option>
                  @if(count($ssc) > 0)
                    @foreach($ssc as $y)
                      <option value="{{ $y->school_year }}">{{ $y->school_year }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </form>
          </div>
        </div>
        @include('includes.all')


        <p>
          <button class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
        </p>
        <div id="printArea">
          @include('includes.print-header')
          <table class="table table-hover table-bordered table-triped" id="sections">
            <thead>
              <th>Section</th>
              <th>Grade Level</th>
              <th>Total Enrolled</th>
            </thead>
          </table>
        </div>
 

      </div>
    </div>
  </div>
<script>
  $(document).ready(function() {
    var ay = $("#current").val();
    $('#sections').DataTable({
      ajax: {
        url: "/admin/reports/list-of-sections/data/" + ay,
        dataSrc: ""
      },
      columns: [
        { data: 'section' },
        { data: 'grade_level' },
        { data: 'count' }
      ],
      destroy: true,
      paging: false,
      searching: false,
      bInfo : false,
    });
  } );

  function selectChange() {
    var ay = document.getElementById("academic_year").value;
    if(ay == '') {
      ay = 'null';
    }
    // alert(ay);
    $('#sections').DataTable({
      ajax: {
        url: "/admin/reports/list-of-sections/data/" + ay,
        dataSrc: ""
      },
      columns: [
        { data: 'section' },
        { data: 'grade_level' },
        { data: 'count' }
      ],
      destroy: true,
      paging: false,
      searching: false,
      bInfo : false,
    });
  }
</script>
@endsection
 