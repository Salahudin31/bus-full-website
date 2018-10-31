<?php
session_start();
ob_start(); // Added to avoid a common error of 'header already sent'
require_once 'config/db.php';
function my_autoload($class)
{   $filename = 'classes/'.$class.'.php';
	include_once $filename;
}
spl_autoload_register('my_autoload');
try {
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
	$log_pes = new Log_Pes($db);

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>