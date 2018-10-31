<?php
	if (isset($_SESSION['loginid'])) 
	{
?>
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Histori Pemesanan</h4>
	      <p class="card-description">
	        Berisikan Data Histori Pemesanan Customer & Infromasi Agen yang Menginput.
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
								<th>Kode Tiket</th>
								<th>Nama Penumpang</th>
								<th>Tanggal Pemesanan</th>
								<th>No. Bangku</th>
								<th>Harga Tiket</th>
								<th>Customer ID</th>
								<th>Status Transaksi</th>
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
								$logs_pes = $log_pes->select_idLog($value['kode_tiket']);
								echo "<tr>
										<td>".$value['kode_tiket']."</td>
										<td>".$value['nm_penumpang']."</td>
										<td>".date('d-M-Y',$value['tgl'])."</td>
										<td>".$value['no_bangku']."</td>
										<td>".$value['hrg_tiket']."</td>
										<td>".$value['no_ktp']."</td>";
										if ($logs_pes['status'] == "" || $logs_pes['status'] == 0) {
											echo "<td>Belum Melakukan Pembayaran</td>";
										} else {
											echo "<td>Sudah Melakukan Pembayaran</td>";
										}

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