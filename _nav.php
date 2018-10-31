  <!-- partial:partials/_navbar.html -->
  <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
      <a class="navbar-brand brand-logo" href="index.html">
        <img src="assets/images/logo.svg" alt="logo" />
      </a>
      <a class="navbar-brand brand-logo-mini" href="index.html">
        <img src="assets/images/logo-mini.svg" alt="logo" />
      </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
      <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
        <?php
          if ($user['level'] == "pimpinan")
          {
        ?>
            <li class="nav-item active">
              <a href="#" class="nav-link">
                <i class="mdi mdi-elevation-rise"></i>Reports</a>
            </li>          
        <?php
          } elseif ($user['level'] == "admin") 
          {
        ?>
            <li class="nav-item">
              <a href="home.php" class="nav-link">Home
                <span class="badge badge-primary ml-1">New</span>
              </a>
            </li>
            <li class="nav-item active">
              <a href="?listLogBus" class="nav-link">
                <i class="fab fa-gg"></i>Status History Bus</a>
            </li>
            <li class="nav-item active">
              <a href="?listLogPes" class="nav-link">
                <i class="fab fa-gg"></i>Status History Pemesanan</a>
            </li>            
        <?php
          } elseif($user['level'] == "agen")
          {
        ?>
          <li class="nav-item">
            <a href="home.php" class="nav-link">Home
              <span class="badge badge-primary ml-1">New</span>
            </a>
          </li>
          <li class="nav-item active">
            <a href="?listLogPes" class="nav-link">
              <i class="fab fa-gg"></i>Status History Pemesanan</a>
          </li>             
        <?php
          }
        ?>
        <!--
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="mdi mdi-bookmark-plus-outline"></i>Score</a>
        </li>
        -->
      </ul>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <i class="mdi mdi-file-document-box"></i>
            <span class="count">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
            <div class="dropdown-item">
              <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
              </p>
              <span class="badge badge-info badge-pill float-right">View all</span>
            </div>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="assets/images/faces/face4.jpg" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content flex-grow">
                <h6 class="preview-subject ellipsis font-weight-medium text-dark">David Grey
                  <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                </h6>
                <p class="font-weight-light small-text">
                  The meeting is cancelled
                </p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="assets/images/faces/face2.jpg" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content flex-grow">
                <h6 class="preview-subject ellipsis font-weight-medium text-dark">Tim Cook
                  <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                </h6>
                <p class="font-weight-light small-text">
                  New product launch
                </p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="assets/images/faces/face3.jpg" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content flex-grow">
                <h6 class="preview-subject ellipsis font-weight-medium text-dark"> Johnson
                  <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                </h6>
                <p class="font-weight-light small-text">
                  Upcoming board meeting
                </p>
              </div>
            </a>
          </div>
        </li>
        <li class="nav-item dropdown d-none d-xl-inline-block">
          <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <span class="profile-text">Hello, <?php echo $user['nama_user'];?> !</span>
            <img class="img-xs rounded-circle" src="assets/images/faces/face1.jpg" alt="Profile image">
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <a class="dropdown-item p-0">
              <div class="d-flex border-bottom">
                <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                  <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                </div>
                <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                  <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                </div>
                <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                  <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                </div>
              </div>
            </a>
            <a href="?logUser" class="dropdown-item">
              Check Log User
            </a>
            <?php 
              if (isset($_SESSION['loginid'])) 
              {
            ?>
                <a href='controller/logout.php' class="dropdown-item">
                  Sign Out
                </a>
            <?php
              }
            ?>              
            
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
      </button>
    </div>
  </nav>
  <!-- partial -->