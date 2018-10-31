<?php
if (isset($_SESSION['loginid'])) 
{
	$selectBus = $bus->select_allBus();
	$selectSupir = $supir->select_allSupir();
?>
<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	    	<h4 class="card-title text-center">Tambah Jadwal</h4>
				<form method="post" action="controller/add.php">
					<div class="form-group row">
						<label class="col">Pilih Tanggal</label>
						<input class="col-sm-10 datespicker" autocomplete="off" type="text" name="tgl">
					</div>
					<div class="form-group row">
						<label class="col">Pilih Jam</label>
						<input class="col-sm-10 timespicker" autocomplete="off" type="text" name="jam">
					</div>
					<div class="form-group row">
						<label class="col">Pilih Supir</label>
						<select class="col-sm-10" name="supir">
							<?php
								foreach ($selectSupir as $value) {
									?>
										<option value="<?php echo $value['id_supir']; ?>"><?php echo $value['nm_supir']; ?></option>
									<?php
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
											<option><?php echo $value['no_bus']; ?></option>
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
					<input class="btn btn-primary" type="submit" name="addJadwal" value="Simpan">
				</form>
			</div>
		</div>
	</div>
<?php
} else {
	header("location: index.html");
}
?>