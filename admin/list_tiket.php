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
								<?php
								if ($user['level'] == "admin" || $user['level'] == "agen")
									{
										echo "<th>Akses</th>";
									}								
								?>
							</tr>
						</thead>
						<tbody>
						<?php
							$pesanan_list = $pesanan->select_allPesanan();
							foreach ($pesanan_list as $value) {
								echo "<tr>
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
											echo "<td>
													<a href='controller/delete.php?no_tiket=".$value['kode_tiket']."'>Delete</a>
													<a href='?editTiket&no_tiket=".$value['kode_tiket']."'>Edit</a>
													<a href='?view&no_tiket=".$value['kode_tiket']."'>View</a>
												  </td>";
										} else
										{
											echo "<td><a href='?view&no_tiket=".$value['kode_tiket']."'>View</a></td>";
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