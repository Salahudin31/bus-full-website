<?php
require '../core/init.php';
	if (isset($_POST['addTiket'])) {
		$user = $users->userdata($_SESSION['loginid']);
		$tiket = $pesanan->select_maxTiket();
		$kode = intval(substr($tiket['maxKode'],2,6))+1;
		$tambah = $kode++;
		if ($tambah<10){
			$kodeTiket="BE00000".$tambah;
		}elseif($tambah<100){
			$kodeTiket="BE0000".$tambah;
		}elseif($tambah<1000){
			$kodeTiket="BE000".$tambah;
		}elseif($tambah<10000){
			$kodeTiket="BE00".$tambah;
		}elseif($tambah<100000){
			$kodeTiket="BE0".$tambah;
		}
		$nm = $_POST['nm_penumpang'];
		$tgl = strtotime($_POST['tgl_berangkat']);
		$bangku = $_POST['no_bangku'];
		$hrg = $_POST['hrg_tiket'];
		$str_awal = $_POST['str_awal'];
		$tujuan = $_POST['tujuan'];
		$jam = strtotime($_POST['jam_berangkat']);
		$bus = $_POST['no_bus'];
		$ktp = $_POST['no_ktp'];
		$pesanan->add_Pesanan($kodeTiket,$nm,$tgl,$bangku,$hrg,$str_awal,$tujuan,$jam,$bus,$ktp,$user['kode_warna']);
		header("location: ../home.php?listTiket");
	} elseif (isset($_POST['addBus'])) {
		$no_bus = $_POST['bus'];
		$jns = $_POST['jenis'];
		$bangku = $_POST['bangku'];
		$fasilitas = $_POST['fasilitas'];

		$bus->add_bus($no_bus,$jns,$bangku,$fasilitas);
		header("location: ../home.php?listBus");
	} elseif (isset($_POST['addUser'])) {
		$nama = $_POST['nama'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		$po = $_POST['po'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$warna = $_POST['warna'];
		$level = $_POST['level'];
		$users->add_user($nama,$alamat,$username,$password,$po,$warna,$level,$telp);
		header("location: ../home.php?listUser");
	} elseif (isset($_POST['addJadwal'])) {
		$tgl = strtotime($_POST['tgl']);
		$jam = strtotime($_POST['jam']);
		$supir = $_POST['supir'];
		$bus = $_POST['bus'];
		$jadwal->add_jadwal($bus,$supir,$tgl,$jam,"");
		header("location: ../home.php?listJadwal");
	} elseif (isset($_POST['addSupir'])) {
		$nama = $_POST['nm'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		$status = $_POST['status'];
		$supir->add_supir($nama,$telp,$alamat,$status);
		header("location: ../home.php?listSupir");
	} elseif (isset($_POST['addLogBus'])) {
		if ($_POST['optradio'] == 1) {
			$status = 1;
			$statusValue = "Berangkat";
		} elseif ($_POST['optradio'] == 2) {
			$status = 2;
			$statusValue = "Perjalanan";
		} elseif ($_POST['optradio'] == 3) {
			$status = 3;
			$statusValue = "Tiba";
		}
		$getJadwal= $jadwal->select_busjadwal($_POST['jadwal']);
		$id_jdwl = $getJadwal['id_jdwl'];
		$bus = $getJadwal['no_bus'];
		$supirData = $getJadwal['id_supir'];
		$getSupr = $supir->select_idSupir($supirData);
		$nmSupir = $getSupir['nm_supir'];
		$user = $users->userdata($_SESSION['loginid']);
		$time = strtotime(date("d-M-Y H:i"));
		$log_bus->add_log($id_jdwl,$bus,$supirData,$status,$user['id'],$time,$bus." ".$user['nama_user']." ".$nmSupir." ".$status."".date("d-M-Y H:i"));
		header("location: ../home.php?listLogBus");
	} else {
		header("location: index.html");
	}
	
?>