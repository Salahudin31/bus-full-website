<?php
if (isset($_SESSION['loginid'])) 
{
	$selectBus = $bus->select_allBus();
	$selectSupir = $supir->select_allSupir();
	if (isset($_GET['jadwal'])) {
		$id_jdwl = $_GET['jadwal'];
		$getJadwal = $jadwal->select_idjadwal($id_jdwl);

	}
?>
<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	    	<h4 class="card-title text-center">Tambah Jadwal</h4>
				<form method="post" action="controller/edit.php">
					<div class="form-group row">
						<label class="col">ID Jadwal</label>
						<input class="col-sm-10" type="text" name="id" disabled value="<?php  echo $getJadwal['id_jdwl']; ?>">
					</div>					
					<div class="form-group row">
						<label class="col">Pilih Tanggal</label>
						<input class="col-sm-10 datespicker" type="text" name="tgl" autocomplete="off" value="<?php echo date('d-M-Y',$getJadwal['tgl_bus']); ?>">
					</div>
					<div class="form-group row">
						<label class="col">Pilih Jam</label>
						<input class="col-sm-10 timespicker" type="text" autocomplete="off" name="jam" value="<?php echo date('h:i',intval($getJadwal['jam_bus'])); ?>">
					</div>
					<div class="form-group row">
						<label class="col">Pilih Supir</label>
						<select class="col-sm-10" name="supir">
							<?php
								foreach ($selectSupir as $value) {
									if ($getJadwal['id_supir'] == $value['id_supir']) {
										?>
										<option value="<?php echo $value['id_supir']; ?>" selected><?php echo $value['nm_supir']; ?></option>
										<?php
									}else {
										?>
										<option value="<?php echo $value['id_supir']; ?>"><?php echo $value['nm_supir']; ?></option>
									<?php
									}
								}
							?>
						</select>
					</div>
					<div class="form-group row">
						<label class="col">Pilih Bus</label>
						<select class="col-sm-10" name="bus">
							<option disabled> -- List Bus -- </option>
							<?php
								foreach ($selectBus as $value) {
									$selectJadwal = $jadwal->select_busjadwal($value['no_bus']);
									if ($value['no_bus'] == $selectJadwal['no_bus']) {
										?>
											<option selected><?php echo $value['no_bus']; ?></option>
										<?php
									}else{
									?>
										<option><?php echo $value['no_bus']; ?></option>
									<?php
									}
								}
							?>
						</select>
					</div>
					<div class="form-group row">
						<label class="col">Bangku Kosong</label>
						<input class="col-sm-10" type="text" name="kosong" value="<?php echo $getJadwal['bangku_kosong']; ?>">
					</div>					
					<input class="btn btn-primary" type="submit" name="update_jadwal" value="Simpan">
				</form>
			</div>
		</div>
	</div>
<?php
} else {
	header("location: index.html");
}
?>