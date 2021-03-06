<div class="header-advance-area">
  <div class="header-top-area">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-top-wraper">
                      <div class="row">
                          <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                              <div class="menu-switcher-pro">
                                  <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                          <i class="fa fa-bars"></i>
                                      </button>
                              </div>
                          </div>
                          <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                              <div class="header-top-menu tabl-d-n">
                                  <ul class="nav navbar-nav mai-top-nav">
                                      {{-- <li class="nav-item"><a href="{{ route('student.dashboard') }}" class="nav-link">Dashboard</a>
                                      </li> --}}
                                  </ul>
                              </div>
                          </div>
                          <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                              <div class="header-right-info">
                                  <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                     
                                      <li class="nav-item">
                                          <a href="javascript:void(0)" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                  <i class="fa fa-user adminpro-user-rounded header-riht-inf" aria-hidden="true"></i>
                                                  <span class="admin-name">{{ ucwords(Auth::user()->fullname()) }}</span>
                                                  <i class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i>
                                              </a>
                                          <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                              <li><a href="{{ route('student.profile') }}"><span class="fa fa-user author-log-ic"></span>My Profile</a>
                                              </li>
                                              </li>
                                              <li><a href="{{ route('logout') }}"><span class="fa fa-sign-out author-log-ic"></span>Log Out</a>
                                              </li>
                                          </ul>
                                      </li>

                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Mobile Menu start -->
  <div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                          <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                              <ul class="collapse dropdown-header-top">
                                <li><a href="{{ route('student.dashboard') }}">Dashboard</a></li>
                              </ul>
                          </li>
                          <li><a href="">Evaluation</a></li>
                          <li><a href="">Enrollment</a></li>
                          <li><a href="">Schedule</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- Mobile Menu end -->

</div>