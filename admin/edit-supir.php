<?php
if (isset($_SESSION['loginid'])) 
{
	if (isset($_GET['editSupir'])) {
		$idSupir = $_GET['supir'];
		$getSupir = $supir->select_idSupir($idSupir);
	}	
?>

	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	    	<h4 class="card-title text-center">Edit Supir</h4>	
				<form method="post" action="controller/edit.php?id=<?php echo $getSupir['id_supir']; ?>">
					<div class="form-group row">
						<label class="col">Nama Supir</label>
						<input class="col-sm-10" type="text" name="nm" value="<?php echo $getSupir['nm_supir']; ?>">
					</div>
					<div class="form-group row">
						<label class="col">Telpon Supir</label>
						<input class="col-sm-10" type="text" name="telp" value="<?php echo $getSupir['telp_supir']; ?>">
					</div>
					<div class="form-group row">
						<label class="col">Alamat Supir</label>
						<input class="col-sm-10" type="text" name="alamat" value="<?php echo $getSupir['alamat_supir']; ?>">
					</div>
					<div class="form-group row">
						<label class="col">Status Supir</label>
						<input class="col-sm-10" type="text" name="status" value="<?php echo $getSupir['status_supir']; ?>">
					</div>
					<input class="btn btn-primary" type="submit" name="update_supir" value="Simpan">				
				</form>
			</div>
		</div>
	</div>
<?php
} else {
	header("location: index.html");
}
?>