<?php
require '../core/init.php';

	if (isset($_GET['no_tiket'])) {
		$kode_tiket = $_GET['no_tiket'];
		$pesanan->delete_pesanan($kode_tiket);
		header("location: ../home.php?listTiket");
	} elseif (isset($_GET['bus'])) {
		$no_bus = $_GET['bus'];
		$bus->delete_bus($no_bus);
		header("location: ../home.php?listBus");
	} elseif (isset($_GET['user'])) {
		$user_id = $_GET['user'];
		$users->delete_user($user_id);
		header("location: ../home.php?listUser");
	} elseif (isset($_GET['supir'])) {
		$id = $_GET['supir'];
		$supir->delete_supir($id);
		header("location: ../home.php?listSupir");
	} elseif (isset($_GET['jadwal'])) {
		$id = $_GET['jadwal'];
		$jadwal->delete_jadwal($id);
		header("location: ../home.php?listJadwal");
	}
	
?>