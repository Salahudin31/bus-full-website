<?php
if (isset($_SESSION['loginid'])) 
{
?>
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	    	<h4 class="card-title text-center">Tambah Bus</h4>	
				<form method="post" action="controller/add.php">
					<div class="form-group row">
						<label class="col-sm-2">No. Bus</label>
						<input class="col-sm-10" type="text" name="bus">
					</div>
					<div class="form-group row">
						<label class="col-sm-2">Jenis Bus</label>
						<input class="col-sm-10" type="text" name="jenis">
					</div>
					<div class="form-group row">
						<label class="col">Bangku</label>
						<select class="col-sm-10" name="bangku">
							<option>59</option>
							<option>47</option>
						</select>
					</div>				
					<div class="form-group row">
						<label class="col-sm-2">Fasilitas</label>
						<input class="col-sm-10" type="text" name="fasilitas">
					</div>
					<input type="submit" class="btn btn-primary" name="addBus" value="Simpan">
				</form>
			</div>
		</div>
	</div>
<?php
} else {
	header("location: index.html");
}
?>