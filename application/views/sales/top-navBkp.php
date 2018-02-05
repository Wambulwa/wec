
    <!-- /sidebar panel -->
    <!-- content panel -->
    <div class="main-panel">
      <!-- top header -->
      <div class="header navbar">
        <div class="brand visible-xs">
          <!-- toggle offscreen menu -->
          <div class="toggle-offscreen">
            <a href="javascript:;" class="hamburger-icon visible-xs" data-toggle="offscreen" data-move="ltr">
              <span></span>
              <span></span>
              <span></span>
            </a>
          </div>
          <!-- /toggle offscreen menu -->
          <!-- logo -->
          <a class="brand-logo">
            <span>WILLFREIGHT</span>
          </a>
          <!-- /logo -->
        </div>
        <ul class="nav navbar-nav hidden-xs">
          <li>
            <a href="javascript:;" class="small-sidebar-toggle ripple" data-toggle="layout-small-menu">
              <i class="icon-toggle-sidebar"></i>
            </a>
          </li>
          <li class="searchbox">
            <a href="javascript:;" data-toggle="search">
              <i class="search-close-icon icon-close hide"></i>
              <i class="search-open-icon icon-magnifier"></i>
            </a>
          </li>
          <li class="navbar-form search-form hide">
            <input type="search" class="form-control search-input" placeholder="Start typing...">
            <div class="search-predict hide">
              <a href="#">Search results.....</a>
              <div class="heading">
                <span class="title">People</span>
              </div>
              <ul class="predictive-list">
                <li>
                  <a class="avatar" href="#">
                    <img src="images/face1.jpg" class="img-circle" alt="">
                    <span>Tammy Carpenter</span>
                  </a>
                </li>
                <li>
                  <a class="avatar" href="#">
                    <img src="images/face2.jpg" class="img-circle" alt="">
                    <span>Catherine Moreno</span>
                  </a>
                </li>
                <li>
                  <a class="avatar" href="#">
                    <img src="images/face3.jpg" class="img-circle" alt="">
                    <span>Diana Robertson</span>
                  </a>
                </li>
                <li>
                  <a class="avatar" href="#">
                    <img src="images/face4.jpg" class="img-circle" alt="">
                    <span>Emma Sullivan</span>
                  </a>
                </li>
              </ul>
<!--               <div class="heading">
                <span class="title">Page posts</span>
              </div> -->
<!--               <ul class="predictive-list">
                <li>
                  <a class="avatar" href="#">
                    <img src="images/unsplash/img2.jpeg" class="img-rounded" alt="">
                    <span>The latest news for cloud-based developers </span>
                  </a>
                </li>
                <li>
                  <a class="avatar" href="#">
                    <img src="images/unsplash/img2.jpeg" class="img-rounded" alt="">
                    <span>Trending Goods of the Week</span>
                  </a>
                </li>
              </ul>
 -->        </div>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right hidden-xs">
          <li>
            <a href="javascript:;" class="ripple" data-toggle="dropdown">
              <span>QN</span>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="javascript:;">Create Invoice</a>
              </li>
              <li>
                <a href="javascript:;">Add Client</a>
              </li>
              <li>
                <a href="javascript:;">Client tariffs</a>
              </li>
              <li>
                <a href="javascript:;">Weekly snapshot</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;" class="ripple" data-toggle="dropdown">
              <i class="icon-bell"></i>
            </a>
            <ul class="dropdown-menu notifications">
              <li class="notifications-header">
                <p class="text-muted small">You have 3 new notifications</p>
              </li>
              <li>
                <ul class="notifications-list">
                  <li>
                    <a href="javascript:;">
                      <div class="notification-icon">
                        <div class="circle-icon bg-success text-white">
                          <i class="icon-bulb"></i>
                        </div>
                      </div>
                      <span class="notification-message"><b>7</b> invoices due today</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <div class="notification-icon">
                        <div class="circle-icon bg-danger text-white">
                          <i class="icon-cursor"></i>
                        </div>
                      </div>
                      <span class="notification-message"><b>2</b> Appointments scheduled today</span>
                      <span class="time">4h</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;" class="ripple" data-toggle="dropdown">
              <img src="<?php echo base_url('images/avatar.jpg');?>" class="header-avatar img-circle" alt="user" title="user">
              <span>Wambulwa Ayub</span>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="javascript:;">My account</a>
              </li>
              <li role="separator" class="divider"></li>
              <li>
                <a href="javascript:;">Help</a>
              </li>
              <li>
                <a href="<?php echo base_url('login/logout');?>">Logout</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;" class="ripple" data-toggle="layout-chat-open">
              <i class="icon-user"></i>
            </a>
          </li>
        </ul>
      </div>
      <!-- /top header -->