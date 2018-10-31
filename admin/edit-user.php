<?php
if (isset($_SESSION['loginid'])) 
{
	if (isset($_GET['editUser'])) {
		$id_user = $_GET['user'];
		$data_user = $users->userdata($id_user);
	}
?>
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	    	<h4 class="card-title text-center">Edit User</h4>
				<form method="post" action="controller/edit.php">
					<div class="form-group row">
						<label class="col">Nama Lengkap</label>
						<input class="col-sm-10" type="text" name="nama" value="<?php echo $data_user['nama_user']; ?>">
					</div>
					<div class="form-group row">
						<label class="col">No. Telp</label>
						<input class="col-sm-10" type="text" name="telp" value="<?php echo $data_user['telp']; ?>">
					</div>		
					<div class="form-group row">
						<label class="col">Alamat</label>
						<input class="col-sm-10" type="text" name="alamat" value="<?php echo $data_user['alamat']; ?>">
					</div>
					<div class="form-group row">
						<label class="col">Wilayah PO</label>
						<input class="col-sm-10" type="text" name="po" value="<?php echo $data_user['po']; ?>">
					</div>
					<div class="form-group row">
						<label class="col">Username</label>
						<input class="col-sm-10" type="text" name="username" value="<?php echo $data_user['username']; ?>">
					</div>
					<div class="form-group row">
						<label class="col">Password</label>
						<input class="col-sm-10" type="password" name="password" value="<?php echo $data_user['password']; ?>">
					</div>
					<div class="form-group row">
						<label class="col">Kode Warna</label>
						<input class="col-sm-10" type="text" name="warna" value="<?php echo $data_user['kode_warna']; ?>">
					</div>
					<div class="form-group row">
						<label class="col">Level</label>
						<select class="col-sm-10"  name="level" value="<?php echo $data_user['level']; ?>">
							<option>Agen</option>
							<option>Pimpinan</option>
							<option>Admin</option>
						</select>
					</div>
					<div class="form-group row">
						<label class="col">Status</label>
						<input class="col-sm-10" type="text" name="status" value="<?php echo $data_user['status']; ?>">
					</div>
					<input class="btn btn-primary" type="submit" name="update_user" value="Simpan">

				</form>
			</div>
		</div>
	</div>
<?php
} else {
	header("location: index.html");
}
?>