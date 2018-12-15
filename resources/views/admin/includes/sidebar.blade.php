<div class="left-sidebar-pro">
  <nav id="sidebar" class="">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}"><img class="main-logo" width="80px" src="{{ asset('images/logo.jpg') }}" alt="" /></a>
        <strong><img scr="{{ asset('images/logo.jpg') }}"></strong>
    </div>
    <div class="left-custom-menu-adp-wrap comment-scrollbar">
      <nav class="sidebar-nav left-sidebar-menu-pro">
        <ul class="metismenu" id="menu1">
          <li class="{{ route('admin.dashboard') == url()->current() ? 'active' : '' }}">
            <a class="has-arrow" href="javascript:void(0)">
               <i class="fa big-icon fa-home icon-wrap"></i>
               <span class="mini-click-non">Home</span>
            </a>
            <ul class="submenu-angle" aria-expanded="true">
                <li><a title="Dashboard" href="{{ route('admin.dashboard') }}"><i class="fa fa-bullseye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Dashboard</span></a></li>

            </ul>
          </li>

          <li class="{{ route('admin.faculties') == url()->current() || route('admin.students') == url()->current() ? 'active' : '' }}">
            <a class="has-arrow" href="javascript:void(0)">
               <i class="fa big-icon fa-users icon-wrap"></i>
               <span class="mini-click-non">Users</span>
            </a>
            <ul class="submenu-angle" aria-expanded="true">
              <li><a title="Faculty Management" href="{{ route('admin.faculties') }}"><i class="fa fa-user sub-icon-mg" aria-hidden="true"></i><span class="mini-sub-pro">Faculties</span></a></li>
              <li><a title="Student Management" href="{{ route('admin.students') }}"><i class="fa fa-graduation-cap sub-icon-mg" aria-hidden="true"></i><span class="mini-sub-pro">Students</span></a></li>
            </ul>
          </li>

          <li class="{{ route('admin.activity.logs') == url()->current() ? 'active' : '' }}">
            <a title="Activity Logs" href="{{ route('admin.activity.logs') }}" aria-expanded="false"><i class="fa fa-history icon-wrap sub-icon-mg" aria-hidden="true"></i> <span class="mini-click-non">Activity Logs</span></a>
          </li>

        </ul>
      </nav>
    </div>
  </nav>
</div>