<?php
	if (isset($_SESSION['loginid'])) 
	{
		$select_logBus = $log_bus->select_allLog();

		if ($user['level'] == "agen") {
?>
		<div class="col-lg-12 grid-margin stretch-card">
		  <div class="card">
		    <div class="card-body">
		      <h4 class="card-title">Status Bus Di PO </h4>
		      <p class="card-description">
		        Bersikian Informasi Trek Status Bus yang ada.
		      </p>
		      <div class="table-responsive h-400">	
						<table id="datatablesB" class="display table">
							<thead>
								<tr>
									<th>No. Bus</th>
									<th>Nama Supir</th>
									<th>Status Bangku Kosong</th>
									<th>Waktu Berangkat Dari PO</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($select_logBus as $value) {
										$tG = date('H:i',strtotime('+45 minutes',$value['time']));
										$getBKosong = $jadwal->select_busjadwal($value['no_bus']); 
										if ($value['user_id'] == $user['id'] && $value['status'] == 3) {
											$dataSupir = $supir->select_idSupir($value['id_supir']);
									?>
											<tr>
												<td><?php echo $value['no_bus']; ?></td>
												<td><?php echo $dataSupir['nm_supir']; ?></td>
												<td><?php echo $getBKosong['bangku_kosong']; ?></td>
												<td><?php echo "Sampai ".date('d M Y H:i',$value['time'])." - Berangkat ".$tG; ?></td>
											</tr>
									<?php
										}
										
									}
								?>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	<?php
		}
	?>
			<div class="col-lg-12 grid-margin stretch-card">
			  <div class="card">
			    <div class="card-body">
			      <h4 class="card-title">Log History Bus</h4>
			      <p class="card-description">
			        Bersikian Informasi Trek Status Bus (Tiba, Perjalanan, Berangkat).
			      </p>
			      <div class="table-responsive h-400">	
							<table id="datatablesS" class="display table">
								<thead>
									<tr>
										<th>Status</th>
										<th>No. Bus</th>
										<th>Nama Supir</th>
										<th>Waktu</th>
									</tr>
								</thead>
								<tbody>
									<?php
												
									foreach ($select_logBus as $value) {
										$getUser = $users->userdata($value['user_id']);
										?>
										<tr>
										<?php
											if ($value['status'] == 1) {
											?>
												<td>Berangkat - <?php echo $getUser['po']; ?></td>
											<?php
											} elseif ($value['status'] == 2){
											?>
												<td>Perjalanan - <?php echo $getUser['po']; ?></td>
											<?php									
											} elseif ($value['status'] == 3){
											?>
												<td>Tiba - <?php echo $getUser['po']; ?></td>
											<?php
											}
										$getSupir = $supir->select_idSupir($value['id_supir']);
									?>
											<td><?php echo $value['no_bus']; ?></td>
											<td><?php echo $getSupir['nm_supir']; ?></td>
											<td><?php echo date('d M Y H:i',$value['time']); ?></td>
										</tr>
									<?php
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