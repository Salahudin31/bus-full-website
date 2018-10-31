<?php
if (isset($_SESSION['loginid'])) 
{
?>
<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	    	<h4 class="card-title text-center">Tambah User</h4>
				<form method="post" action="controller/add.php">
					<div class="form-group row">
						<label class="col">Nama Lengkap</label>
						<input class="col-sm-10" type="text" name="nama">
					</div>
					<div class="form-group row">
						<label class="col">No. Telpon</label>
						<input class="col-sm-10" type="text" name="telp">
					</div>		
					<div class="form-group row">
						<label class="col">Alamat</label>
						<input class="col-sm-10" type="text" name="alamat">
					</div>
					<div class="form-group row">
						<label class="col">Wilayah PO</label>
						<input class="col-sm-10" type="text" name="po">
					</div>
					<div class="form-group row">
						<label class="col">Username</label>
						<input class="col-sm-10" type="text" name="username">
					</div>
					<div class="form-group row">
						<label class="col">Password</label>
						<input class="col-sm-10" type="text" name="password">
					</div>
					<div class="form-group row">
						<label class="col">Kode Warna</label>
						<input class="col-sm-10" type="text" name="warna">
					</div>
					<div class="form-group row">
						<label class="col">Level</label>
						<select class="col-sm-10" name="level">
							<option>Agen</option>
							<option>Pimpinan</option>
							<option>Admin</option>
						</select>
					</div>
					<input class="btn btn-primary" type="submit" name="addUser" value="Simpan">
				</form>
			</div>
		</div>
	</div>
<?php
} else {
	header("location: index.html");
}
?>