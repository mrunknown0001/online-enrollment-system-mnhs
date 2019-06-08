@extends('layouts.app')

@section('title') Admin Dashboard @endsection

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
            <div class="breadcome-area">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list"> Dashboard </div>
                  </div>
                </div>
              </div>
          </div>
          
          @include('includes.all')

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
            <div class="admin-content analysis-progrebar-ctn res-mg-t-15" style="background-color: #e52110; color: white;">
              <h4 class="text-center text-uppercase"><i class="fa fa-graduation-cap"></i> <b>Enrolled</b></h4>
              <div class="row vertical-center-box vertical-center-box-tablet">
                <div class="col-xs-3 mar-bot-15 text-left">

                </div>
                <div class="col-xs-12 cus-gh-hd-pro">
                    <h2 class="text-center">{{ $total_enroll != null ? $total_enroll->count : '0' }}</h2>
                </div>
              </div>
            </div>
          </div>


          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="admin-content analysis-progrebar-ctn res-mg-t-15" style="background-color: #e52110; color: white;">
              <h4 class="text-center text-uppercase"><i class="fa fa-users"></i> <b>Faculties</b></h4>
              <div class="row vertical-center-box vertical-center-box-tablet">
                <div class="col-xs-3 mar-bot-15 text-left">
                  
                </div>
                <div class="col-xs-12 cus-gh-hd-pro">
                    <h2 class="text-center">{{ $faculties }}</h2>
                </div>
              </div>
            </div>
          </div>



          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="admin-content analysis-progrebar-ctn res-mg-t-15" style="background-color: #e52110; color: white;">
              <h4 class="text-center text-uppercase"><i class="fa fa-book"></i> <b>Subjects</b></h4>
              <div class="row vertical-center-box vertical-center-box-tablet">
                <div class="col-xs-3 mar-bot-15 text-left">
                  
                </div>
                <div class="col-xs-12 cus-gh-hd-pro">
                    <h2 class="text-center">{{ $subjects }}</h2>
                </div>
              </div>
            </div>
          </div>


        </div>
    </div>
@endsection
 