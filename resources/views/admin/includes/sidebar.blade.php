<div class="left-sidebar-pro">
  <nav id="sidebar" class="">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}"><img class="main-logo" width="80px" src="{{ asset('images/logo.jpg') }}" alt="" /></a>
        <strong>OES</strong>
    </div>
    <div class="left-custom-menu-adp-wrap comment-scrollbar">
      <nav class="sidebar-nav left-sidebar-menu-pro">
        <ul class="metismenu" id="menu1">

          <li><a title="Dashboard" href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Dashboard</span></a></li>

            

          <li class="{{ route('admin.faculties') == url()->current() || route('admin.students') == url()->current() ? 'active' : '' }}">
            <a class="has-arrow" href="javascript:void(0)">
               <i class="fa big-icon fa-users icon-wrap"></i>
               <span class="mini-click-non">Users</span>
            </a>
            <ul class="submenu-angle" aria-expanded="true">
              <li>
                <a href="{{ route('admin.admins') }}" title="Admin Management"><i class="fa fa-user sub-icon-mg" aria-hidden="true"></i><span class="mini-sub-pro">Admin</span></a>
              </li>

              <li><a class="{{ route('admin.faculties') == url()->current() ? 'active' : '' }}" title="Faculty Management" href="{{ route('admin.faculties') }}"><i class="fa fa-user sub-icon-mg" aria-hidden="true"></i><span class="mini-sub-pro">Faculty</span></a></li>

              <li><a title="Student Management" href="{{ route('admin.students') }}"><i class="fa fa-graduation-cap sub-icon-mg" aria-hidden="true"></i><span class="mini-sub-pro">Students</span></a></li>
            </ul>
          </li>

          <li class="">
            <a class="has-arrow" href="javascript:void(0)">
               <i class="fa big-icon fa-wrench icon-wrap"></i>
               <span class="mini-click-non">Maintenance</span>
            </a>
            <ul class="submenu-angle" aria-expanded="true">

              <li class="">
                <a class="{{ route('admin.strands') == url()->current() ? 'active' : '' }}"" title="Strand Management" href="{{ route('admin.strands') }}"><i class="fa fa-graduation-cap sub-icon-mg" aria-hidden="true"></i> <span class="mini-click-non">Strands</span></a>
              </li>

              <li class="{{ route('admin.subjects') == url()->current() || route('admin.add.subject') == url()->current() ? 'active' : '' }}">
                <a title="Subject Management" href="{{ route('admin.subjects') }}" aria-expanded="false"><i class="fa fa-book icon-wrap sub-icon-mg" aria-hidden="true"></i> <span class="mini-click-non">Subjects</span></a>
              </li>

              <li><a title="Faculty Subject Assignment" href="{{ route('admin.faculty.assignments') }}"><i class="fa fa-user sub-icon-mg" aria-hidden="true"></i><span class="mini-sub-pro">Faculty Subjects</span></a></li>

              <li class="{{ route('admin.sections') == url()->current() ? 'active' : '' }}">
                <a title="Section Management" href="{{ route('admin.sections') }}" aria-expanded="false"><i class="fa fa-users icon-wrap sub-icon-mg" aria-hidden="true"></i> <span class="mini-click-non">Sections</span></a>
              </li>

              <li class="{{ route('admin.schedules') == url()->current() ? 'active' : '' }}">
                <a title="Schedules" href="{{ route('admin.schedules') }}" aria-expanded="false"><i class="fa fa-calendar icon-wrap sub-icon-mg" aria-hidden="true"></i> <span class="mini-click-non">Schedules</span></a>
              </li>
              
              <li>
                <a href="{{ route('admin.departments') }}" title="Department"><i class="fa fa-building-o sub-icon-mg" aria-hidden="true"></i><span class="mini-sub-pro">Department</span></a>
              </li>
              {{-- <li>
                <a href="{{ route('admin.designations') }}" title="Designation"><i class="fa fa-tasks sub-icon-mg" aria-hidden="true"></i><span class="mini-sub-pro">Designation</span></a>
              </li> --}}
            </ul>
          </li>

          <li class="{{ route('admin.reports') == url()->current() ? 'active' : '' }}">
            <a title="Repots" href="{{ route('admin.reports') }}" aria-expanded="false"><i class="fa fa-file icon-wrap sub-icon-mg" aria-hidden="true"></i> <span class="mini-click-non">Reports</span></a>
          </li>

          <li class="{{ route('admin.online.enrollment') == url()->current() ? 'active' : '' }}">
            <a title="Online Enrollment" href="{{ route('admin.online.enrollment') }}" aria-expanded="false"><i class="fa fa-gear icon-wrap sub-icon-mg" aria-hidden="true"></i> <span class="mini-click-non">Online Enrollment</span></a>
          </li>

          <li class="{{ route('admin.activity.logs') == url()->current() ? 'active' : '' }}">
            <a class="active" title="Activity Logs" href="{{ route('admin.activity.logs') }}" aria-expanded="false"><i class="fa fa-history icon-wrap sub-icon-mg" aria-hidden="true"></i> <span class="mini-click-non">Activity Logs</span></a>
          </li>

        </ul>
      </nav>
    </div>
  </nav>
</div>