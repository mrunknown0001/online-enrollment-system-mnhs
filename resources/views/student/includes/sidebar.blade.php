<div class="left-sidebar-pro">
  <nav id="sidebar" class="">
    <div class="sidebar-header">
        <a href="{{ route('student.dashboard') }}"><img class="main-logo" width="80px" src="{{ asset('images/logo.jpg') }}" alt="" /></a>
        <strong><img scr="{{ asset('images/logo.jpg') }}"></strong>
    </div>
    <div class="left-custom-menu-adp-wrap comment-scrollbar">
      <nav class="sidebar-nav left-sidebar-menu-pro">
        <ul class="metismenu" id="menu1">
          <li class="">
            <a class="has-arrow" href="javascript:void(0)">
               <i class="fa big-icon fa-home icon-wrap"></i>
               <span class="mini-click-non">Home</span>
            </a>
            <ul class="submenu-angle" aria-expanded="true">
                <li><a title="Dashboard" href="{{ route('student.dashboard') }}"><i class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Dashboard</span></a></li>
            </ul>
          </li>
          <li>
            <a title="Grades" href="{{ route('student.grades') }}" aria-expanded="false"><i class="fa fa-file icon-wrap sub-icon-mg" aria-hidden="true"></i><span class="mini-click-non"> Grades</span></a>
          </li>
          <li>
            <a title="Evaluation" href="{{ route('student.evaluation') }}" aria-expanded="false"><i class="fa fa-file icon-wrap sub-icon-mg" aria-hidden="true"></i><span class="mini-click-non"> Evaluation</span></a>
          </li>
          <li>
            <a title="Schedule" href="{{ route('student.schedules') }}" aria-expanded="false"><i class="fa fa-calendar icon-wrap sub-icon-mg" aria-hidden="true"></i><span class="mini-click-non"> Schedule</span></a>
          </li>
        </ul>
      </nav>
    </div>
  </nav>
</div>