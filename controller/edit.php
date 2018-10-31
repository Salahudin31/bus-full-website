<?php
	require '../core/init.php';
	if (isset($_POST['update_tiket'])) {
		$no_tiket =$_POST['tiket'];
		$nm = $_POST['nama'];
		$tgl = strtotime($_POST['tgl']);
		$bangku = $_POST['bangku'];
		$hrg = $_POST['hrg'];
		$str_awal = $_POST['str_awal'];
		$tujuan = $_POST['tujuan'];
		$jam = strtotime($_POST['jam']);
		$bus = $_POST['bus'];
		$ktp = $_POST['ktp'];

		$pesanan->update_pesanan($no_tiket,$nm,$tgl,$bangku,$hrg,$str_awal,$tujuan,$jam,$bus,$ktp);
		header("location: ../home.php?listTiket");
	} elseif (isset($_POST['update_bus'])) {
		$no_bus = $_POST['bus'];
		$jns = $_POST['jenis'];
		$bangku = $_POST['bangku'];
		$fasilitas = $_POST['fasilitas'];

		$bus->update_bus($no_bus,$jns,$bangku,$fasilitas);
		header("location: ../home.php?listBus");
	} elseif (isset($_POST['update_user'])) {
		$nama = $_POST['nama'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		$po = $_POST['po'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$warna = $_POST['warna'];
		$level = $_POST['level'];
		$status = $_POST['status'];
		$users->update_user($nama,$alamat,$username,$password,$po,$warna,$level,$status,$telp);
		header("location: ../home.php?listUser");
	} elseif (isset($_POST['update_supir'])) {
		$id = $_GET['id'];
		$nm = $_POST['nm'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		$status = $_POST['status'];
		$supir->update_supir($id,$nm,$telp,$alamat,$status);
		header("location: ../home.php?listSupir");
	} elseif (isset($_POST['update_jadwal'])) {
		$id = $_POST['id'];
		$tgl = strtotime($_POST['tgl']);
		$jam = strtotime($_POST['jam']);
		$supir = $_POST['supir'];
		$bus = $_POST['bus'];
		$kosong = $_POST['kosong'];
		$jadwal->update_jadwal($id,$bus,$supir,$tgl,$jam,$kosong);
		header("location: ../home.php?listJadwal");
	} else {
		header("location: index.html");
	}
?>