<?php
if (isset($_SESSION['loginid'])) 
	{
		$user 		= $users->userdata($_SESSION['loginid']);
		$nama_user 	= ucwords(strtolower($user['nama_user']));
		if ($user['level'] == "admin")
		{
?>
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body text-center">
						<h1 class="card-title">Welcome to control website - admin</h1>
						<p class="card-description">
							Ini adalah control website
						</p>
					</div>
				</div>
			</div>
		<?php
		} elseif ($user['level'] == "pimpinan")
		{
		?>
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body text-center">
						<h1 class="card-title">Welcome to control website - admin</h1>
						<p class="card-description">
							Ini adalah control website
						</p>
					</div>
				</div>
			</div>
		<?php
		} elseif ($user['level'] == "agen")
		{
		?>
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body text-center">
						<h1 class="card-title">Welcome to control website - admin</h1>
						<p class="card-description">
							Ini adalah control website
						</p>
					</div>
				</div>
			</div>
<?php
		}
?>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-cube text-danger icon-md"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Total Pendapatan</p>
                <div class="fluid-container">
                	<?php
                		$tiket = $pesanan->select_allPesanan();
                		$tiket_count = count($tiket);
                		$hrg = 0 ;
                			foreach ($tiket as $value) {
	                			$hrg += $value['hrg_tiket'];
	                		}
                		
                	?>
                  <h4 class="font-weight-medium text-right mb-0">Rp. <?php echo $hrg; ?>,00-</h4>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Keseluruhan
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-receipt text-warning icon-md"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Pesanan</p>
                <div class="fluid-container">
                	<?php
                		$jmlh = 0 ;
                		$jmlh_agen = 0;
                		$jmlh_admin = 0;
										foreach ($tiket as $value) {
											$jmlh += 1;
	                		if ($value['bg_color'] == "")
	                		{
                				$jmlh_admin += 1;
                			} elseif ($value['bg_color'] != "")
                			{
          							$jmlh_agen += 1;
                			}
                		}

                		if ($user['level'] == "admin")
                		{
                	?>
                			<h4 class="font-weight-medium text-right mb-0"><?php echo $jmlh_admin; ?></h4>
                	<?php
                		} elseif($user['level'] == "agen")
                		{
                	?>
                			<h4 class="font-weight-medium text-right mb-0"><?php echo $jmlh_agen; ?></h4>
                	<?php
                		} elseif ($user['level'] == "pimpinan")
              			{
									?>
                			<h4 class="font-weight-medium text-right mb-0"><?php echo $jmlh; ?></h4>
                	<?php              				
              			}
                	?>
                </div>
              </div>
            </div>
            <?php
							if ($user['level'] == "admin")
              {
            ?>
								<p class="text-muted mt-3 mb-0">
		              <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Penjualan Admin, <?php echo $jmlh_agen; ?> Penjualan Agen 
		            </p>            		
            <?php
              } elseif($user['level'] == "agen")
              {
           	?>
								<p class="text-muted mt-3 mb-0">
		              <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Penjualan Agen, <?php echo $jmlh_admin; ?> Penjualan Admin
		            </p>           			
           	<?php
              } elseif ($user['level'] == "pimpinan")
              {
            ?>
								<p class="text-muted mt-3 mb-0">
		              <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i><?php echo $jmlh_admin; ?> Penjualan Admin, <?php echo $jmlh_agen; ?> Penjualan Agen
		            </p>            		
            <?php
              }    	
            ?>
            
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-poll-box text-success icon-md"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Penjualan</p>
                <div class="fluid-container">
                  <h4 class="font-weight-medium text-right mb-0"><?php echo $tiket_count; ?></h4>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Total Terjual
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-account-location text-info icon-md"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Karyawan</p>
                <div class="fluid-container">
                	<?php
                		$userData = $users->select_user();
                		$user_count = count($userData);
                	?>
                  <h4 class="font-weight-medium text-right mb-0"><?php echo $user_count-1; ?></h4>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-reload mr-1" aria-hidden="true"></i><?php echo $user_count-1; ?> Karyawan + 1 Manager = <?php echo $user_count; ?>
            </p>
          </div>
        </div>
      </div>
    <?php
      if ($user['level'] == "admin" || $user['level'] == "agen")
      {      
    ?>
<!-- MAPS -->
			<div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
          	<div id="map-container-2" class="z-depth-1" style="height: 400px"></div>
          </div>
        </div>
      </div>
<!-- END MAPS -->
    <?php
      }
    ?>
		
    <!--	
			<div class="col-lg-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
						<h2 class="card-title text-primary mb-5">Performance History</h2>
            <div class="wrapper d-flex justify-content-between">
              <div class="side-left">
                <p class="mb-2">The best performance</p>
                <p class="display-3 mb-4 font-weight-light">+45.2%</p>
              </div>
              <div class="side-right">
                <small class="text-muted">2017</small>
              </div>
            </div>
            <div class="wrapper d-flex justify-content-between">
              <div class="side-left">
                <p class="mb-2">Worst performance</p>
                <p class="display-3 mb-5 font-weight-light">-35.3%</p>
              </div>
              <div class="side-right">
                <small class="text-muted">2015</small>
              </div>
            </div>
            <div class="wrapper">
              <div class="d-flex justify-content-between">
                <p class="mb-2">Sales</p>
                <p class="mb-2 text-primary">88%</p>
              </div>
              <div class="progress">
                <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 88%" aria-valuenow="88"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="wrapper mt-4">
              <div class="d-flex justify-content-between">
                <p class="mb-2">Visits</p>
                <p class="mb-2 text-success">56%</p>
              </div>
              <div class="progress">
                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 56%" aria-valuenow="56"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>          	
          </div>
        </div>
      </div>
    -->

<?php 
	}  else {
			header('location: admin/login.php');
	} 
?>