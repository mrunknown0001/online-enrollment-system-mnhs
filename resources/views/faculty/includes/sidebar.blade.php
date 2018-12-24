<div class="left-sidebar-pro">
  <nav id="sidebar" class="">
    <div class="sidebar-header">
        <a href="{{ route('faculty.dashboard') }}"><img class="main-logo" width="80px" src="{{ asset('images/logo.jpg') }}" alt="" /></a>
        <strong><img scr="{{ asset('images/logo.jpg') }}"></strong>
    </div>
    <div class="left-custom-menu-adp-wrap comment-scrollbar">
      <nav class="sidebar-nav left-sidebar-menu-pro">
        <ul class="metismenu" id="menu1">
          <li class="{{ route('faculty.dashboard') == url()->current() ? 'active' : '' }}">
            <a class="has-arrow" href="index.html">
               <i class="fa big-icon fa-home icon-wrap"></i>
               <span class="mini-click-non">Home</span>
            </a>
            <ul class="submenu-angle" aria-expanded="true">
                <li><a title="Dashboard" href="{{ route('faculty.dashboard') }}"><i class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Dashboard</span></a></li>
            </ul>
          </li>

          <li class="">
            <a class="has-arrow" href="index.html">
               <i class="fa big-icon fa-users icon-wrap"></i>
               <span class="mini-click-non">Students</span>
            </a>
            <ul class="submenu-angle" aria-expanded="true">
                <li><a title="Students" href=""><i class="fa fa-users sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Students</span></a></li>
            </ul>
          </li>

          <li class="{{ route('faculty.new.student.registration') ==  url()->current() || route('faculty.existing.student.registration') == url()->current() ? 'active' : '' }}">
            <a class="has-arrow" href="index.html">
               <i class="fa big-icon fa-user-plus icon-wrap"></i>
               <span class="mini-click-non">Registration</span>
            </a>
            <ul class="submenu-angle" aria-expanded="true">
                <li><a title="Existing Student" href="{{ route('faculty.register.choose.grade', ['id' => 2]) }}"><i class="fa fa-user-plus sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Existing Student</span></a></li>
                <li><a title="New Student" href="{{ route('faculty.register.choose.grade') }}"><i class="fa fa-user-plus sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">New Student</span></a></li>
            </ul>
          </li>

          <li>
            <a title="Schedules" href="" aria-expanded="false"><i class="fa fa-calendar icon-wrap sub-icon-mg" aria-hidden="true"></i> <span class="mini-click-non">Schedules</span></a>
          </li>
        </ul>
      </nav>
    </div>
  </nav>
</div>