<?php 
ob_start(); // Added to avoid a common error of 'header already sent'
session_start();
//database
require_once 'connect/db.php';
//objek
require_once 'classes/general.php';
require_once 'classes/user.php';
require_once 'classes/agenda.php';
require_once 'classes/pesanan.php';
require_once 'classes/bus.php';
require_once 'classes/loguser.php';
require_once 'classes/bangku.php';
require_once 'classes/jadwal.php';
require_once 'classes/supir.php';
require_once 'classes/status_pembayaran.php';
require_once 'classes/customer.php';
require_once 'classes/log_bus.php';
require_once 'classes/log_pes.php';

	$general = new General();
	$agenda = new Agenda($db);
	$pesanan = new Pesanan($db);
	$users = new User($db);
	$bus = new Bus($db);
	$logUsers = new LogUser($db);
	$bangku = new Bangku($db);
	$jadwal = new Jadwal($db);
	$supir = new Supir($db);
	$status_pembayaran = new Status_Pembayaran($db);
	$customer = new Customer($db);
	$log_bus = new Log_Bus($db);
	$log_bus = new Log_Pes($db);
	
$errors = array();
?>