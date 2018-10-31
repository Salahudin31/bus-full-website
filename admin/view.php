<?php
	if (isset($_SESSION['loginid'])) 
	{
?>
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Pesanan Tiket</h4>	
	<?php
		if (isset($_GET["no_tiket"])) {
			$tampil_tiket = $pesanan->select_idPesanan($_GET['no_tiket']);
			?>
			<h4 class="card-title">Detail</h4>
	      <p class="card-description">
					Keterangan Agen :
	        <?php
	        	$userAgen = $users->select_levelUser("agen");
	        	foreach ($userAgen as $value) {
	        ?>
	        	 <code style="color: <?php echo $value['kode_warna']; ?>">
	        	 	<?php echo $value['kode_warna']; ?> = 
	        	 	<span>
	        	 		<?php echo $value['nama_user']; ?>		
	        	 	</span>
	        	 </code>
	        <?php
	        	}
	        ?>	       	
	      </p>
	      <div class="table-responsive h-400">	
					<table  class="table">
						<tbody>
							<tr>
								<th>Kode Tiket</th>
								<td><?php echo $tampil_tiket['kode_tiket']; ?></td>
							</tr>
							<tr>
								<th>Nama Pemesanan</th>
								<td><?php echo $tampil_tiket['nm_penumpang']; ?></td>
							</tr>
							<tr>
								<th>Tanggal Berangkat</th>
								<td><?php echo $tampil_tiket['tgl_berangkat']; ?></td>
							</tr>	
							<tr>
								<th>No. Bangku</th>
								<td><?php echo $tampil_tiket['no_bangku']; ?></td>
							</tr>
							<tr>
								<th>Harga Tiket</th>
								<td><?php echo $tampil_tiket['hrg_tiket']; ?></td>
							</tr>
							<tr>
								<th>Start Awal</th>
								<td><?php echo $tampil_tiket['str_awal']; ?></td>
							</tr>								
							<tr>
								<th>Tujuan</th>
								<td><?php echo $tampil_tiket['tujuan']; ?></td>
							</tr>	
							<tr>
								<th>Jam Berangkat</th>
								<td><?php echo $tampil_tiket['jam_berangkat']; ?></td>
							</tr>	
							<tr>
								<th>No. Bus</th>
								<td><?php echo $tampil_tiket['no_bus']; ?></td>
							</tr>
							<tr>
								<th>Customer ID</th>
								<td><?php echo $tampil_tiket['no_ktp']; ?></td>
							</tr>	
							<tr>
								<th>Agen Color</th>
								<td><span class="<?php echo $tampil_tiket['bg_color']; ?> pl-5 pr-5"> </span></td>
							</tr>																			

						</tbody>
					</table>
				</div>		
	<?php
		} elseif (isset($_GET["user"])) {
			$tampil_user = $users->userdata($_GET['user']);
	?>
				<h4 class="card-title">Detail</h4>
	      <p class="card-description">
	      </p>
				<div class="table-responsive h-400">	
					<table  class="table">
						<tbody>
							<tr>
								<th>Nama User</th>
								<td><?php echo $tampil_user['nama_user']; ?></td>
							</tr>
							<tr>
								<th>Username</th>
								<td><?php echo $tampil_user['username']; ?></td>
							</tr>
							<tr>
								<th>Level</th>
								<td><?php echo $tampil_user['level']; ?></td>
							</tr>	
							<tr>
								<th>Telepon</th>
								<td><?php echo $tampil_user['telp']; ?></td>
							</tr>
							<tr>
								<th>Alamat</th>
								<td><?php echo $tampil_user['alamat']; ?></td>
							</tr>	
							<tr>
								<th>Wilayah PO</th>
								<td>
								<?php
									if ($tampil_user['po'] === "") {
										echo "-<br>";
									} else {
										echo $tampil_user['po']."<br>";
									}									
								?>		
								</td>
							</tr>	
							<tr>
								<th>Status</th>
								<td>
								<?php
									if ($tampil_user['status'] === "1") {
										echo "Aktif<br>";
									} else {
										echo "Tidak Aktif<br>";
									}									
								?>
								</td>
							</tr>	
							<tr>
								<th>Kode Warna</th>
								<td><?php echo $tampil_user['kode_warna']; ?></td>
							</tr>
							<tr>
								<th>IP</th>
								<td><?php echo $tampil_user['ip']; ?></td>
							</tr>
						</tbody>
					</table>
				</div>			      		
	<?php
		} elseif (isset($_GET["bus"])) {
			$tampil_bus = $bus->select_idBus($_GET['bus']);
	?>
				<h4 class="card-title">Detail</h4>
	      <p class="card-description">
	      </p>
				<div class="table-responsive h-400">	
					<table class="table">
						<tbody>
							<tr>
								<th>No. Bus</th>
								<td><?php echo $tampil_bus['no_bus']; ?></td>
							</tr>
							<tr>
								<th>Jenis Bus</th>
								<td><?php echo $tampil_bus['jns_bus']; ?></td>
							</tr>
							<tr>
								<th>Bangku</th>
								<td><a class="btn btn-primary filter-button btn-sm" data-filter="d-22"><?php echo $tampil_bus['bangku']; ?><a class="btn btn-primary filter-button btn-sm active" data-filter="d-23">59</a></td>
							</tr>							
							<tr>
								<th>Fasilitas</th>
								<td><?php echo $tampil_bus['fasilitas']; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
<!-- STATUS BANGKU -->
		    <div class="card-body">
					<div class="border border-primary rounded-right filter d-23">
						<div class="row no-gutters p-1">
							<div id="atas" class="col-12 row no-gutters">
								<?php
									$k=0;
									$l=26;
									for ($i=$k; $i < 12 ; $i++) { 
								?>
											<div class="col-1">
								<?php
										if ($i < 1) {
											for ($j=3; $j > 0; $j--) { 
												$l-=1;
												for ($m=0; $m < 1; $m++) {
													if ($l==25) {
								?>
														<div><a class="btn btn-primary p-05" data-toggle="modal" data-target="#modal"><i class="icon fa fa-square-o"></i><?php echo "A 23"; ?></a></div>
								<?php
													} elseif ($l==24) {
								?>
														<div><a class="btn btn-primary p-05" data-toggle="modal" data-target="#modal"><i class="icon fa fa-square-o"></i><?php echo "A 22"; ?></a></div>
								<?php
													} elseif ($l==23) {
								?>
														<div><a class="btn btn-primary p-05" data-toggle="modal" data-target="#modal"><i class="icon fa fa-square-o"></i><?php echo "A 21"; ?></a></div>
								<?php
													}else{
								?>
														<div><a class="btn btn-primary p-05" data-toggle="modal" data-target="#modal"><i class="icon fa fa-square-o"></i><?php echo "A ".$l; ?></a></div>
								<?php
													}
												}
											}
										}else{
											for ($j=2; $j > 0; $j--) { 
												$l-=1;
												for ($m=0; $m < 1; $m++) {
													if ($l==21) {}
													elseif ($l==22) {}
													else{
								?>
													<div><a class="btn btn-primary p-05" data-toggle="modal" data-target="#modal"><i class="icon fa fa-square-o"></i><?php echo "A ".$l; ?></a></div>
								<?php
													}
												}	
											}									
										}
								?>
											</div>
								<?php
									}															
								?>
							</div>
							<div id="bawah" class="col-12 row no-gutters">
								<?php
									$k=0;
									$l=37;
									for ($i=$k; $i < 12 ; $i++) { 
								?>
										<div class="col">
								<?php
										for ($j=3; $j > 0; $j--) { 
											$l-=1;
											for ($m=0; $m < 1; $m++) {
												if ($l==51) {}
												elseif ($l==52) {}
												else{
								?>
													<div><a class="btn btn-primary p-05" data-toggle="modal" data-target="#modal"><i class="icon fa fa-square-o"></i><?php echo "B ".$l; ?></a></div>
								<?php
												}
											}	
										}
								?>
										</div>
								<?php
									}															
								?>							
							</div>	
						</div>
					</div>
					<div class="border border-primary rounded-right filter d-22">
						<div class="row no-gutters p-1">
							<div id="atas" class="col-12 row no-gutters">
								<?php
									$k=0;
									$l=26;
									for ($i=$k; $i < 12 ; $i++) { 
								?>
											<div class="col-1">
								<?php
										if ($i < 1) {
											for ($j=3; $j > 0; $j--) { 
												$l-=1;
												for ($m=0; $m < 1; $m++) {
													if ($l==25) {
								?>
														<div><a class="btn btn-primary p-05" data-toggle="modal" data-target="#modal"><i class="icon fa fa-square-o"></i><?php echo "A 23"; ?></a></div>
								<?php
													} elseif ($l==24) {
								?>
														<div><a class="btn btn-primary p-05" data-toggle="modal" data-target="#modal"><i class="icon fa fa-square-o"></i><?php echo "A 22"; ?></a></div>
								<?php
													} elseif ($l==23) {
								?>
														<div><a class="btn btn-primary p-05" data-toggle="modal" data-target="#modal"><i class="icon fa fa-square-o"></i><?php echo "A 21"; ?></a></div>
								<?php
													}else{
								?>
														<div><a class="btn btn-primary p-05" data-toggle="modal" data-target="#modal"><i class="icon fa fa-square-o"></i><?php echo "A ".$l; ?></a></div>
								<?php
													}
												}
											}
										}else{
											for ($j=2; $j > 0; $j--) { 
												$l-=1;
												for ($m=0; $m < 1; $m++) {
													if ($l==21) {}
													elseif ($l==22) {}
													else{
								?>
													<div><a class="btn btn-primary p-05" data-toggle="modal" data-target="#modal"><i class="icon fa fa-square-o"></i><?php echo "A ".$l; ?></a></div>
								<?php
													}
												}	
											}									
										}
								?>
											</div>
								<?php
									}															
								?>
							</div>
							<div id="atas" class="col-12 row no-gutters">
								<?php
									$k=0;
									$l=25;
									for ($i=$k; $i < 12 ; $i++) { 
								?>
											<div class="col-1">
								<?php
										for ($j=2; $j > 0; $j--) { 
											$l-=1;
											for ($m=0; $m < 1; $m++) {
							?>
												<div><a class="btn btn-primary p-05" data-toggle="modal" data-target="#modal"><i class="icon fa fa-square-o"></i><?php echo "B ".$l; ?></a></div>
							<?php
											}	
										}									
									
								?>
											</div>
								<?php
									}															
								?>
							</div>	
						</div>
					</div>					    	
		    </div>
<!-- STATUS BANGKU -->
<!-- MODAL -->
				<div class="modal fade" id="modal" role="dialog">
				  <div class="modal-dialog modal-info" role="document">
				    <!--Content-->
				    <div class="modal-content">
				      <!--Header-->
				      <div class="modal-header">
				        <p class="heading">Status Bangku -- 
				        </p>

				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true" class="white-text">&times;</span>
				        </button>
				      </div>

				      <!--Body-->
				      <div class="modal-body">
		            <table  class="table">
									<tbody>
										<tr>
											<th>Kode Tiket</th>
											<td class="red">BE7789</td>
										</tr>
										<tr>
											<th>Nama Pemesanan</th>
											<td>Aldi</td>
										</tr>
										<tr>
											<th>Tanggal Berangkat</th>
											<td>24-mai-2019</td>
										</tr>	
										<tr>
											<th>No. Bangku</th>
											<td>--</td>
										</tr>
										<tr>
											<th>Harga Tiket</th>
											<td>450000</td>
										</tr>
										<tr>
											<th>Start Awal</th>
											<td>Bekasi</td>
										</tr>								
										<tr>
											<th>Tujuan</th>
											<td>Pekan Baru</td>
										</tr>	
										<tr>
											<th>Jam Berangkat</th>
											<td>09:00</td>
										</tr>	
										<tr>
											<th>No. Bus</th>
											<td>B 9898 TKJ</td>
										</tr>
									</tbody>
								</table>
				      </div>

				      <!--Footer-->
				      <div class="modal-footer justify-content-center">
				        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBus">Lihat Bus</a>
				        <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Ok</a>
				      </div>
				    </div>
				    <!--/.Content-->
				  </div>
				</div>
				

				<div class="modal fade" id="modalBus" role="dialog">
				  <div class="modal-dialog modal-info" role="document">
				    <!--Content-->
				    <div class="modal-content">
				      <!--Header-->
				      <div class="modal-header">
				        <p class="heading">Status Bus -- 
				        </p>

				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true" class="white-text">&times;</span>
				        </button>
				      </div>

				      <!--Body-->
				      <div class="modal-body">
				      	<img src="assets/images/bus.jpg" class="img-fluid" alt="Bus">
				      </div>
				    </div>
				    <!--/.Content-->
				  </div>
				</div>				      
<!-- MODAL -->
	<?php
		}
	?>
			</div>
		</div>
	</div>

<?php
	} else {
		header("location: index.html");
	}
?>