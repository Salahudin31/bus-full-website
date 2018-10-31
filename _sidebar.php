<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
<?php 
  if (isset($_SESSION['loginid'])) 
  { 

?>
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="assets/images/faces/face1.jpg" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name"><?php echo $user['nama_user']; ?></p>
            <div>
              <small class="designation text-muted"><?php echo $user['level']; ?></small>
              <span class="status-indicator online"></span>
            </div>
          </div>
        </div>
        <!--<button class="btn btn-success btn-block">New Project
          <i class="mdi mdi-plus"></i>
        </button>-->
      </div>
    </li>
    <?php
      if ($user['level'] == "admin")
      {
    ?>
      <li class="nav-item">
        <a class="nav-link" href="?agenda">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-content-copy"></i>
          <span class="menu-title">Tambah</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="?addTiket">Tambah Tiket</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?addJadwal">Tambah Jadwal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?addSupir">Tambah Supir</a>
            </li>            
            <li class="nav-item">
              <a class="nav-link" href="?addBus">Tambah Bus</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?addUser">Tambah User</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-view" aria-expanded="false" aria-controls="ui-view">
          <i class="menu-icon mdi mdi-content-copy"></i>
          <span class="menu-title">View</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-view">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="?listTiket">View Tiket</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?listJadwal">View Jadwal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?listSupir">View Supir</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?listBus">View Bus</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?listUser">View User</a>
            </li>
          </ul>
        </div>
      </li>      
    <?php
      } elseif ($user['level'] == "pimpinan")
      {
    ?>
      <li class="nav-item">
        <a class="nav-link" href="?agenda">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">Laporan Per - Hari</span>
        </a>
      </li>       
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">Laporan Per - Bulan</span>
        </a>
      </li>       
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">Laporan Per - Tahun</span>
        </a>
      </li>
    <?php
      } elseif ($user['level'] == "agen")
      {
    ?>
      <li class="nav-item">
        <a class="nav-link" href="?agenda">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>       
      <li class="nav-item">
        <a class="nav-link" href="?addTiket">
          <i class="menu-icon mdi mdi-backup-restore"></i>
          <span class="menu-title">Tambah Tiket</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?addStatus">
          <i class="menu-icon mdi mdi-backup-restore"></i>
          <span class="menu-title">Tambah Status</span>
        </a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-view" aria-expanded="false" aria-controls="ui-view">
          <i class="menu-icon mdi mdi-content-copy"></i>
          <span class="menu-title">View</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-view">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="?listLogBus">View Status</a>
            </li>            
            <li class="nav-item">
              <a class="nav-link" href="?listTiket">View Tiket</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?listJadwal">View Jadwal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?listSupir">View Supir</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?listBus">View Bus</a>
            </li>
          </ul>
        </div>
      </li>         
    <?php
      }
    ?>     
  </ul>
</nav>
<?php
  }
?>
