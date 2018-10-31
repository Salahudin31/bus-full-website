<?php
	if (isset($_SESSION['loginid'])) 
	{
?>	
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">User</h4>
	      <p class="card-description">
	       	Berisikan Infromasi User.
	      </p>
	      <div class="table-responsive h-400">	
					<table id="datatables" class="display table">
						<thead>
							<tr>
								<th>Username</th>
								<th>Nama</th>
								<th>No. Telpon</th>
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
										echo "<td>
												<a href='controller/delete.php?user=".$value['id']."'>Delete</a>
												<a href='?editUser&user=".$value['id']."'>Edit</a>
												<a href='?view&user=".$value['id']."'>View</a>
											  </td>";
									} elseif ($user['level'] == "pimpinan")
									{
											echo "<td>
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