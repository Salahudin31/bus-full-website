<?php
if (isset($_SESSION['loginid'])) 
{
?>

	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	    	<h4 class="card-title text-center">Tambah Supir</h4>	
				<form method="post" action="controller/add.php">
					<div class="form-group row">
						<label class="col">Nama Supir</label>
						<input class="col-sm-10" type="text" name="nm">
					</div>
					<div class="form-group row">
						<label class="col">Telpon Supir</label>
						<input class="col-sm-10" type="text" name="telp">
					</div>
					<div class="form-group row">
						<label class="col">Alamat Supir</label>
						<input class="col-sm-10" type="text" name="alamat">
					</div>
					<div class="form-group row">
						<label class="col">Status Supir</label>
						<input class="col-sm-10" type="text" name="status">
					</div>
					<input class="btn btn-primary" type="submit" name="addSupir" value="Simpan">				
				</form>
			</div>
		</div>
	</div>
<?php
} else {
	header("location: index.html");
}
?>