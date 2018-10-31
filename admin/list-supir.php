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
								<th>ID Supir</th>
								<th>Nama Supir</th>
								<th>Telepon Supir</th>
								<th>Alamat</th>
								<th>Status</th>
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
										echo "<td>
												<a href='controller/delete.php?supir=".$value['id_supir']."'>Delete</a>
												<a href='?editSupir&supir=".$value['id_supir']."'>Edit</a>
												<a href='?view&supir=".$value['id_supir']."'>View</a>
											  </td>";
									} elseif ($user['level'] == "pimpinan" || $user['level'] == "agen")
									{
											echo "<td>
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
		
<?php
} else {
	header("location: index.html");
}
?>