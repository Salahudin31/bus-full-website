<?php
if (isset($_SESSION['loginid'])) 
{
	$selectJadwal = $jadwal->select_allJadwal();
?>
<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	    	<h4 class="card-title text-center">Tambah Jadwal</h4>
				<form method="post" action="controller/add.php">
					<div class="form-group row">
						<label class="col">Status Bus</label>
						<label class="col-3"><input type="radio" name="optradio" value="1"> Berangkat</label>
						<label class="col-3"><input type="radio" name="optradio" value="2"> Perjalanan</label>
						<label class="col-3"><input type="radio" name="optradio" value="3"> Tiba</label>
					</div>					
					<div class="form-group row">
						<label class="col">Pilih Supir</label>
						<select class="col-sm-10" name="jadwal">
							<?php
								foreach ($selectJadwal as $value) {
									?>
										<option value="<?php echo $value['no_bus']; ?>"><?php echo $value['no_bus']; ?></option>
									<?php
								}
							?>
						</select>
					</div>
					
					<input class="btn btn-primary" type="submit" name="addLogBus" value="Simpan">
				</form>
			</div>
		</div>
	</div>
<?php
} else {
	header("location: index.html");
}
?>