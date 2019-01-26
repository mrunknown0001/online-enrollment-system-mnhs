@extends('layouts.app')

@section('title') Faculty Subject Assignments @endsection

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
          <h1> {{ $assignment != null ? 'Update' : 'Add' }} Faculty Subject Assignment </h1>
          <p>
            <a href="{{ route('admin.faculty.assignments') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Subject Assignment</a>
          </p>
          @include('includes.all')
          
          <form action="{{ route('admin.faculty.assignments.store') }}" method="POST" autocomplete="off">
            {{ csrf_field() }}
            <input type="hidden" name="assignment" value="{{ $assignment }}">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="faculty">Select Faculty</label>
                  <select name="faculty" id="faculty" class="form-control selectpicker" data-live-search="true" required>
                    <option value=""></option>
                    @if(count($faculties) > 0)
                      @foreach($faculties as $f)
                        <option value="{{ $f->id }}">{{ $f->firstname . ' ' . $f->lastname }}</option>
                      @endforeach
                    @endif
                  </select>
                </div>
                <div class="form-group">
                  <label for="section">Select Section</label>
                  <select name="section" id="section" class="form-control selectpicker" data-live-search="true" required novalidate>
                    <option value=""></option> 
                    @if(count($sections) > 0)
                      @foreach($sections as $s)
                        <option value="{{ $s->id }}">Grade {{ $s->grade_level }} - {{ $s->name }}</option>
                      @endforeach
                    @endif
                  </select>
                </div>
                <div class="form-group">
                  <label for="subject">Select Subject</label>
                  <select name="subject" id="subject" class="form-control" data-live-search="true" required>
                    <option value=""></option>
                  </select>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">{{ $assignment != null ? 'Update' : 'Add' }} Subject Assignment</button>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
  </div>


 <script>
  $(document).ready(function () {
    $('#section').on('change', function() {
      var section = $('#section').val();

      $('#subject')
          .empty()
      ;
      // get grade_level in section

     $.ajax({
            type: "GET",
            url: "/admin/get/grade-level/" + section,
            dataType: "html",
            success: function(data) {
                // Run the code here that needs
                //    to access the data returned
                // console.log (data);
                gradeLevel = data;

                // select and append subjects in subject select section
                $.ajax({url: "/admin/get/subjects/" + gradeLevel , success: function(result) {
                    
                    Object.keys(result).forEach(function(key) {

                    $('#subject').append('<option value="' + result[key].id + '">' + result[key].code + ' - ' + result[key].title + '</option>');
                    
                  });
                }});


                // $('#subject').selectpicker('refresh');
                
            },
            error: function() {
                alert('Error occured');
            }
        });

    });
  });
 </script> 
@endsection
 