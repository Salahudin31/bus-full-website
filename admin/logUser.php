<?php
	if (isset($_SESSION['loginid'])) 
	{

?>	
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Pesanan Tiket</h4>
	      <p class="card-description">
	        Berisikan Data Log User yang Akses Website Admin.
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
	        	$user_count = count($users->select_user());
	        	echo "Jumlah User : <a href='?listUser'>".$user_count."</a>";
	        ?>	        
				</p>
	      <div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nama Penumpang</th>
								<th>Level</th>
								<th>Tanggal/Waktu</th>
								<th>IP</th>
								<th>Browser</th>
								<th>Log</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$logUser = $logUsers->select_allLog();
								foreach ($logUser as $value) {
									$user = $users->userdata($value['id']);
							?>
								<tr class="<?php echo $user['kode_warna']; ?>">
									<td><?php echo $value['id']; ?></td>
									<td><?php echo $user['nama_user']; ?></td>
									<td><?php echo $user['level']; ?></td>
									<td><?php echo $value['time']; ?></td>
									<td><?php echo $value['ip']; ?></td>
									<td><?php echo $value['browser']; ?></td>
									<td><?php echo $value['log']; ?></td>
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