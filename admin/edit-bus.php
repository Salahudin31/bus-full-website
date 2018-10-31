<?php
if (isset($_SESSION['loginid'])) 
{
	if (isset($_GET['editBus'])) {
		$no_bus = $_GET['bus'];
		$data_bus = $bus->select_idBus($no_bus);
	}
?>

	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	    	<h4 class="card-title text-center">Edit User</h4>
				<form method="post" action="controller/edit.php">
					<div class="form-group row">
						<label class="col">No. Bus</label>
						<input class="col-sm-10" type="text" name="bus" value="<?php echo $data_bus['no_bus']; ?>">
					</div>
					<div class="form-group row">
						<label class="col">Jenis Bus</label>
						<input class="col-sm-10" type="text" name="jenis" value="<?php echo $data_bus['jns_bus']; ?>">
					</div>
					<div class="form-group row">
						<label class="col">Bangku</label>
						<select class="col-sm-10" name="bangku">
							<option><?php echo $data_bus['bangku']; ?></option>
							<option>59</option>
							<option>47</option>
						</select>
					</div>
					<div class="form-group row">
						<label class="col">Fasilitas</label>
						<input class="col-sm-10" type="text" name="fasilitas" value="<?php echo $data_bus['fasilitas']; ?>">
					</div>
					<input class="btn btn-primary" type="submit" name="update_bus" value="Simpan">

				</form>
			</div>
		</div>
	</div>
<?php
} else {
	header("location: index.html");
}
?>