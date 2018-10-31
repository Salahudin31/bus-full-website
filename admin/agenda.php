<?php
	if (isset($_SESSION['loginid'])) 
	{
?>
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Pesanan Tiket</h4>
	      <p class="card-description">
	        Berisikan Data Pemesanan Customer & Infromasi Agen yang Menginput.
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
					<table id="datatables" class="display table">
						<thead>
							<tr>
								<th>Color Agen</th>
								<th>Kode Tiket</th>
								<th>Nama Penumpang</th>
								<th>Tanggal Pemesanan</th>
								<th>Tanggal Berangkat</th>
								<th>No. Bangku</th>
								<th>Harga Tiket</th>
								<th>Start Awal</th>
								<th>Tujuan</th>
								<th>Jam Berangkat</th>
								<th>No Bus</th>
								<th>Customer ID</th>
								<th>Akses</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$pesanan_list = $pesanan->select_allPesanan();
							foreach ($pesanan_list as $value) {
								echo "<tr class='".$value['bg_color']."'>
										<td><span class='".$value['bg_color']." pl-5 pr-5'></<span></td>
										<td>".$value['kode_tiket']."</td>
										<td>".$value['nm_penumpang']."</td>
										<td>".date('d-M-Y',$value['tgl'])."</td>
										<td>".date('d-M-Y',$value['tgl_berangkat'])."</td>
										<td>".$value['no_bangku']."</td>
										<td>".$value['hrg_tiket']."</td>
										<td>".$value['str_awal']."</td>
										<td>".$value['tujuan']."</td>
										<td>".date('H:i',$value['jam_berangkat'])."</td>
										<td>".$value['no_bus']."</td>
										<td>".$value['no_ktp']."</td>";

										if ($user['level'] == "admin")
										{
											echo "<td class='white'>
													<a href='controller/delete.php?no_tiket=".$value['kode_tiket']."'>Delete</a>
													<a href='?editTiket&no_tiket=".$value['kode_tiket']."'>Edit</a>
													<a href='?view&no_tiket=".$value['kode_tiket']."'>View</a>
												  </td>";
										} else
										{
											echo "<td class='white'><a href='?view&no_tiket=".$value['kode_tiket']."'>View</a></td>";
										}
								echo "</tr>";
							}
						?>
						</tbody>						
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-6 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Jadwal</h4>
	      <p class="card-description">
	        Bersikian Informasi Jadwal.
	      </p>
	      <div class="table-responsive h-400">	
					<table id="datatables1" class="display table">
						<thead>
							<tr>
								<th>ID Jadwal</th>
								<th>No. Bus</th>
								<th>Nama Supir</th>
								<th>Tanggal Berangkat</th>
								<th>Jam Berangkat</th>
								<th>Bangku Kosong</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$selectJadwal = $jadwal->select_allJadwal();
								foreach ($selectJadwal as $value) {
									$selectSupir = $supir->select_idSupir($value['id_supir']);
									echo "<tr>
											<td>".$value['id_jdwl']."</td>
											<td>".$value['no_bus']."</td>
											<td>".$selectSupir['nm_supir']."</td>
											<td>".$value['tgl_bus']."</td>
											<td>".$value['jam_bus']."</td>
											<td>".$value['bangku_kosong']."</td>";

									if ($user['level'] == "admin")
									{
										echo "<td class='white'>
												<a href='controller/delete.php?jadwal=".$value['id_supir']."'>Delete</a>
												<a href='?editJadwal&jadwal=".$value['id_supir']."'>Edit</a>
												<a href='?view&jadwal=".$value['id_supir']."'>View</a>
											  </td>";
									} elseif ($user['level'] == "pimpinan")
									{
											echo "<td class='white'>
												<a href='?view&jadwal=".$value['id_supir']."'>View</a>
											  </td>";
									}
									
									echo "</tr>";

								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>	

	<div class="col-lg-6 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Supir</h4>
	      <p class="card-description">
	        Bersikian Informasi Supir.
	      </p>
	      <div class="table-responsive h-400">	
					<table id="datatables2" class="display table">
						<thead>
							<tr>
								<th>ID Supir</th>
								<th>Nama Supir</th>
								<th>Telepon Supir</th>
								<th>Alamat</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$selectSupir = $supir->select_allSupir();
								foreach ($selectSupir as $value) {
									echo "<tr>
											<td>".$value['id_supir']."</td>
											<td>".$value['nm_supir']."</td>
											<td>".$value['telp_supir']."</td>
											<td>".$value['alamat_supir']."</td>
											<td>".$value['status_supir']."</td>";

									if ($user['level'] == "admin")
									{
										echo "<td class='white'>
												<a href='controller/delete.php?supir=".$value['id_supir']."'>Delete</a>
												<a href='?editSupir&supir=".$value['id_supir']."'>Edit</a>
												<a href='?view&supir=".$value['id_supir']."'>View</a>
											  </td>";
									} elseif ($user['level'] == "pimpinan")
									{
											echo "<td class='white'>
												<a href='?view&supir=".$value['id_supir']."'>View</a>
											  </td>";
									}
									
									echo "</tr>";

								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>	

	<div class="col-lg-6 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Bus</h4>
	      <p class="card-description">
	        Bersikian Informasi Bus.
	      </p>
	      <div class="table-responsive h-400">	
					<table id="datatables3" class="display table">
						<thead>
							<tr>
								<th>No. Bus</th>
								<th>Jenis Bus</th>
								<th>Bangku</th>
								<th>Fasilitas</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$bus_list = $bus->select_allBus();
								foreach ($bus_list as $value) {
									echo "<tr>
											<td>".$value['no_bus']."</td>
											<td>".$value['jns_bus']."</td>
											<td>".$value['bangku']."</td>
											<td>".$value['fasilitas']."</td>";

									if ($user['level'] == "admin")
									{
										echo "<td class='white'>
												<a href='controller/delete.php?bus=".$value['no_bus']."'>Delete</a>
												<a href='?editBus&bus=".$value['no_bus']."'>Edit</a>
												<a href='?view&bus=".$value['no_bus']."'>View</a>
											  </td>";
									} elseif ($user['level'] == "pimpinan")
									{
											echo "<td class='white'>
												<a href='?view&bus=".$value['no_bus']."'>View</a>
											  </td>";
									}
									
									echo "</tr>";

								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">User</h4>
	      <p class="card-description">
	       	Berisikan Infromasi User.
	      </p>
	      <div class="table-responsive h-400">	
					<table id="datatables4" class="display table">
						<thead>
							<tr>
								<th>Username</th>
								<th>Nama</th>
								<th>Telepon</th>
								<th>Level</th>
								<th>Alamat</th>
								<th>Wilayah PO</th>
								<th>Status</th>
								<th>Warna Agen</th>
								<th>IP</th>
								<?php
								if ($user['level'] == "admin" || $user['level'] == "pimpinan")
									{
										echo "<th>Akses</th>";
									}								
								?>
							</tr>
						</thead>
						<tbody>
							<?php

								$Agen = $users->select_user();
								foreach ($Agen as $value) {
									echo "<tr>
											<td>".strip_tags(addslashes(trim($value['username'])))."</td>
											<td>".$value['nama_user']."</td>
											<td>".$value['telp']."</td>
											<td>".$value['level']."</td>
											<td>".$value['alamat']."</td>";
									if ($value['po'] === "") {
										echo "<td>-</td>";
									} else {
										echo "<td>".$value['po']."</td>";
									}
									if ($value['status'] === "1") {
										echo "<td>Aktif</td>";
									} else {
										echo "<td>Tidak Aktif</td>";
									}
										echo "<td><label class='p-05 ".$value['kode_warna']."'></label></td>";
										echo "<td>".$value['ip']."</td>";
									if ($user['level'] == "admin")
									{
										echo "<td class='white'>
												<a href='controller/delete.php?user=".$value['id']."'>Delete</a>
												<a href='?editUser&user=".$value['id']."'>Edit</a>
												<a href='?view&user=".$value['id']."'>View</a>
											  </td>";
									} elseif ($user['level'] == "pimpinan")
									{
											echo "<td class='white'>
												<a href='?view&user=".$value['id']."'>View</a>
											  </td>";
									}
									
									echo "</tr>";

								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<?php
} else {
	header("location: index.html");
}
?>