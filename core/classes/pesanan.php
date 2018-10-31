<?php
	/**
	 * 
	 */
	class Pesanan
	{
		private $db;
		function __construct($database)
		{
			$this->db = $database;
		}
		function add_Pesanan($kode_tiket,$nm_penumpang,$tgl_berangkat,$no_bangku,$hrg_tiket,$str_awal,$tujuan,$jam_berangkat,$no_bus,$no_ktp,$bg_color){
			$tgl = strtotime(date("d-M-Y"));
			$query = $this->db->prepare("INSERT INTO `pes_bus` (`kode_tiket`,`nm_penumpang`,`tgl_berangkat`,`no_bangku`,`hrg_tiket`,`str_awal`,`tujuan`,`jam_berangkat`,`no_bus`,`no_ktp`,`tgl`,`bg_color`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
			$query->bindValue(1,$kode_tiket);
			$query->bindValue(2,$nm_penumpang);
			$query->bindValue(3,$tgl_berangkat);
			$query->bindValue(4,$no_bangku);
			$query->bindValue(5,$hrg_tiket);
			$query->bindValue(6,$str_awal);
			$query->bindValue(7,$tujuan);
			$query->bindValue(8,$jam_berangkat);
			$query->bindValue(9,$no_bus);
			$query->bindValue(10,$no_ktp);
			$query->bindValue(11,$tgl);
			$query->bindValue(12,$bg_color);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function delete_pesanan($kode_tiket){
			$query = $this->db->prepare("DELETE FROM `pes_bus` WHERE `kode_tiket` = ? ");
			$query->bindValue(1,$kode_tiket);
			try {
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}

		}
		function update_pesanan($kode_tiket,$nm_penumpang,$tgl_berangkat,$no_bangku,$hrg_tiket,$str_awal,$tujuan,$jam_berangkat,$no_bus,$no_ktp){
			$tgl_update = strtotime(date("d-m-Y"));
			$query = $this->db->prepare("UPDATE `pes_bus` SET `nm_penumpang` = ? , `tgl_berangkat` = ? , `no_bangku` = ? , `hrg_tiket` = ? , `str_awal` = ? , `tujuan` = ? ,`jam_berangkat` = ? , `no_bus` = ? , `no_ktp` = ?, `tgl` = ? WHERE `kode_tiket` = ? ");
			$query->bindValue(11,$kode_tiket);
			$query->bindValue(1,$nm_penumpang);
			$query->bindValue(2,$tgl_berangkat);
			$query->bindValue(3,$no_bangku);
			$query->bindValue(4,$hrg_tiket);
			$query->bindValue(5,$str_awal);
			$query->bindValue(6,$tujuan);
			$query->bindValue(7,$jam_berangkat);
			$query->bindValue(8,$no_bangku);
			$query->bindValue(9,$no_ktp);
			$query->bindValue(10,$tgl_update);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}

		}
		function select_allPesanan(){
			$query = $this->db->prepare("SELECT * FROM `pes_bus` ORDER BY `id` DESC ");
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $query->fetchAll();
		}
		function select_maxTiket(){
			$query = $this->db->prepare("SELECT MAX(`kode_tiket`) AS maxKode FROM `pes_bus`");
			try{
				$query->execute();
				return $query->fetch();
			} catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function select_idPesanan($kode_tiket){
			$query = $this->db->prepare("SELECT * FROM `pes_bus` WHERE `kode_tiket` = ?");
			$query->bindValue(1, $kode_tiket);
			try{
				$query->execute();
				return $query->fetch();
			} catch(PDOException $e){
				die($e->getMessage());
			}
		}
	}
?>