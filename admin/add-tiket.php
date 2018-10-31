<?php
if (isset($_SESSION['loginid'])) 
{
?>

	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	    	<h4 class="card-title text-center">Tambah Tiket</h4>	
				<form method="post" action="controller/add.php">
					<div class="form-group row">
						<label class="col">Nama Penumpang</label>
						<input class="col-sm-10" type="text" name="nm_penumpang">
					</div>
					<div class="form-group row">
						<label class="col">Tanggal Berangkat</label>
						<input class="col-sm-10 datespicker" type="text" autocomplete="off" name="tgl_berangkat">
					</div>
					<div class="form-group row">
						<label class="col">No. Bangku</label>
						<input class="col-sm-10" type="text" name="no_bangku">
					</div>
					<div class="form-group row">
						<label class="col">Harga Per-Tiket</label>
						<input class="col-sm-10" type="text" name="hrg_tiket">
					</div>
					<div class="form-group row">
						<label class="col">Start Awal</label>
						<input class="col-sm-10" type="text" name="str_awal">
					</div>
					<div class="form-group row">
						<label class="col">Tujuan</label>
						<input class="col-sm-10" type="text" name="tujuan">
					</div>					
					<div class="form-group row">
						<label class="col">Jam Berangkat</label>
						<input class="col-sm-10 timespicker" type="text" autocomplete="off" name="jam_berangkat">
					</div>
					<div class="form-group row">
						<label class="col">No. Bus</label>
						<input class="col-sm-10" type="text" name="no_bus">
					</div>
					<div class="form-group row">
						<label class="col">Customer ID</label>
						<input class="col-sm-10" type="text" name="no_ktp">
					</div>
					<input class="btn btn-primary" type="submit" name="addTiket" value="Simpan">				
				</form>
			</div>
		</div>
	</div>
<?php
} else {
	header("location: index.html");
}
?>