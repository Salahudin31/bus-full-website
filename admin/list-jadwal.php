<?php
	if (isset($_SESSION['loginid'])) 
	{
?>
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Supir</h4>
	      <p class="card-description">
	        Bersikian Informasi Supir.
	      </p>
	      <div class="table-responsive h-400">	
					<table id="datatables" class="display table">
						<thead>
							<tr>
								<th>ID Jadwal</th>
								<th>No. Bus</th>
								<th>Nama Supir</th>
								<th>Tanggal Berangkat</th>
								<th>Jam Berangkat</th>
								<th>Bangku Kosong</th>
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
								$selectJadwal = $jadwal->select_allJadwal();
								foreach ($selectJadwal as $value) {
									$selectSupir = $supir->select_idSupir($value['id_supir']);
									echo "<tr>
											<td>".$value['id_jdwl']."</td>
											<td>".$value['no_bus']."</td>
											<td>".$selectSupir['nm_supir']."</td>
											<td>".date('d-M-Y',$value['tgl_bus'])."</td>
											<td>".date('H:i',intval($value['jam_bus']))."</td>
											<td>".$value['bangku_kosong']."</td>";

									if ($user['level'] == "admin")
									{
										echo "<td>
												<a href='controller/delete.php?jadwal=".$value['id_jdwl']."'>Delete</a>
												<a href='?editJadwal&jadwal=".$value['id_jdwl']."'>Edit</a>
												<a href='?view&jadwal=".$value['id_jdwl']."'>View</a>
											  </td>";
									} elseif ($user['level'] == "pimpinan" || $user['level'] == "agen")
									{
											echo "<td>
												<a href='?view&jadwal=".$value['id_jdwl']."'>View</a>
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