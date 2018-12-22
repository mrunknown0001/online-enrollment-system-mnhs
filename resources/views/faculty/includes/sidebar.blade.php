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

          <li class="{{ route('faculty.enroll.student') == url()->current() ? 'active' : '' }}">
            <a class="has-arrow" href="index.html">
               <i class="fa big-icon fa-users icon-wrap"></i>
               <span class="mini-click-non">Students</span>
            </a>
            <ul class="submenu-angle" aria-expanded="true">
                <li><a title="Students" href=""><i class="fa fa-users sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Students</span></a></li>
                <li><a title="Enroll Student" href="{{ route('faculty.enroll.student') }}"><i class="fa fa-user-plus sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Enroll Students</span></a></li>
            </ul>
          </li>

          {{-- <li>
            <a title="Landing Page" href="#" aria-expanded="false"><i class="fa fa-bookmark icon-wrap sub-icon-mg" aria-hidden="true"></i> <span class="mini-click-non">Landing Page</span></a>
          </li> --}}
        </ul>
      </nav>
    </div>
  </nav>
</div>