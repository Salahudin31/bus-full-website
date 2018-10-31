<?php
	if (isset($_SESSION['loginid'])) 
	{
?>
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Bus</h4>
	      <p class="card-description">
	        Bersikian Informasi Bus.
	      </p>
	      <div class="table-responsive h-400">	
					<table id="datatables" class="display table">
						<thead>
							<tr>
								<th>No. Bus</th>
								<th>Jenis Bus</th>
								<th>Bangku</th>
								<th>Fasilitas</th>
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
								$bus_list = $bus->select_allBus();
								foreach ($bus_list as $value) {
									echo "<tr>
											<td>".$value['no_bus']."</td>
											<td>".$value['jns_bus']."</td>
											<td>".$value['bangku']."</td>
											<td>".$value['fasilitas']."</td>";

									if ($user['level'] == "admin")
									{
										echo "<td>
												<a href='controller/delete.php?bus=".$value['no_bus']."'>Delete</a>
												<a href='?editBus&bus=".$value['no_bus']."'>Edit</a>
												<a href='?view&bus=".$value['no_bus']."'>View</a>
											  </td>";
									} elseif ($user['level'] == "pimpinan" || $user['level'] == "agen")
									{
											echo "<td>
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
		
<?php
} else {
	header("location: index.html");
}
?>