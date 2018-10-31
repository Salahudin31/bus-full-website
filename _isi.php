<div class="content-wrapper">
  <div class="row">

<?php 
	if (isset($_SESSION['loginid'])) 
	{
		if (isset($_GET['addTiket'])) {
			include("admin/add-tiket.php");
		} elseif (isset($_GET['editTiket'])) {
			include("admin/edit-tiket.php");
		} elseif (isset($_GET['addBus'])) {
			include("admin/add-bus.php");
		} elseif (isset($_GET['addJadwal'])) {
			include("admin/add-jadwal.php");
		} elseif (isset($_GET['addSupir'])) {
			include("admin/add-supir.php");
		} elseif (isset($_GET['addStatus'])) {
			include("admin/add-logBus.php");
		} elseif (isset($_GET['editBus'])) {
			include("admin/edit-bus.php");
		} elseif (isset($_GET['addUser'])) {
			include("admin/add-user.php");
		} elseif (isset($_GET['editUser'])) {
			include("admin/edit-user.php");
		} elseif (isset($_GET['editSupir'])) {
			include("admin/edit-supir.php");
		} elseif (isset($_GET['editJadwal'])) {
			include("admin/edit-jadwal.php");
		} elseif (isset($_GET['logUser'])) {
			include("admin/logUser.php");
		} elseif (isset($_GET['listUser'])) {
			include("admin/list_user.php");
		} elseif (isset($_GET['listTiket'])) {
			include("admin/list_tiket.php");
		} elseif (isset($_GET['listBus'])) {
			include("admin/list_bus.php");
		} elseif (isset($_GET['listSupir'])) {
			include("admin/list-supir.php");
		} elseif (isset($_GET['listJadwal'])) {
			include("admin/list-jadwal.php");
		} elseif (isset($_GET['listLogBus'])) {
			include("admin/status-bus.php");
		} elseif (isset($_GET['listLogPes'])) {
			include("admin/listLog_pes.php");
		} elseif (isset($_GET['agenda'])) {
			include("admin/agenda.php");	
		} elseif (isset($_GET['view'])) {
			include("admin/view.php");	
		} else {
			include("admin/admin.php");	
		}
	}
?>


	</div>
</div>

