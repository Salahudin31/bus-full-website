<?php
if (isset($_SESSION['loginid'])) 
{
	if (isset($_GET['editTiket'])) {
		$no_tiket = $_GET['no_tiket'];
		$tiket = $pesanan->select_idPesanan($no_tiket);
	}
?>
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	    	<h4 class="card-title text-center">Edit Pesanan</h4>
				<form method="post" action="controller/edit.php">
					<div class="form-group row">
						<label class="col <?php  echo $tiket['bg_color']; ?>">No. Tiket</label>
						<input class="col-sm-10" type="text" name="tiket" value="<?php echo $tiket['kode_tiket']; ?>">
					</div>
					<div class="form-group row">
						<label class="col">Nama Penumpang</label>
						<input class="col-sm-10" type="text" name="nama" value="<?php echo $tiket['nm_penumpang']; ?>">
					</div>
					<div class="form-group row">
						<label class="col">Tanggal Berangkat</label>
						<input class="col-sm-10 datespicker" type="text" name="tgl" value="<?php echo date('d-M-Y',$tiket['tgl_berangkat']); ?>">
					</div>
					<div class="form-group row">
						<label class="col">No. Bangku</label>
						<input class="col-sm-10" type="text" name="bangku" value="<?php echo $tiket['no_bangku']; ?>">
					</div>
					<div class="form-group row">
						<label class="col">Harga Per-Tiket</label>
						<input class="col-sm-10" type="text" name="hrg" value="<?php echo $tiket['hrg_tiket']; ?>">
					</div>
					<div class="form-group row">
						<label class="col">Start Awal</label>
						<input class="col-sm-10" type="text" name="str_awal" value="<?php echo $tiket['str_awal']; ?>">
					</div>
					<div class="form-group row">
						<label class="col">Tujuan</label>
						<input class="col-sm-10" type="text" name="tujuan" value="<?php echo $tiket['tujuan']; ?>">
					</div>
					<div class="form-group row">
						<label class="col">Jam Berangkat</label>
						<input class="col-sm-10 timespicker" type="text" name="jam" value="<?php echo date('H:i:s',$tiket['jam_berangkat']); ?>">
					</div>
					<div class="form-group row">
						<label class="col">No. Bus</label>
						<input class="col-sm-10" type="text" name="bus" value="<?php echo $tiket['no_bus']; ?>">
					</div>
					<div class="form-group row">
						<label class="col">Cutomer ID</label>
						<input class="col-sm-10" type="text" name="ktp" value="<?php echo $tiket['no_ktp']; ?>">
					</div>
					<input class="btn btn-primary" type="submit" name="update_tiket" value="Simpan">
				</form>
			</div>
		</div>
	</div>
<?php
} else {
	header("location: index.html");
}
?>