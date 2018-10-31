<?php
	/**
	 * 
	 */
	class Status_Pembayaran
	{
		private $db;
		function __construct($database)
		{
			$this->db = $database;
		}
		function add_statusPembayaran($kode_tiket,$jmlh_bayar,$no_pembayaran,$status_pembayaran,$status_berangkat){
			$query = $this->db->prepare("INSERT INTO `stts_pembayaran` (`kode_tiket`,`jmlh_bayar`,`no_pembayaran`,`status_pembayaran`,`status_berangkat`) VALUES (?,?,?,?,?)");
			$query->bindValue(1,$kode_tiket);
			$query->bindValue(2,$jmlh_bayar);
			$query->bindValue(3,$no_pembayaran);
			$query->bindValue(4,$status_pembayaran);
			$query->bindValue(5,$status_berangkat);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function delete_statusPembayaran($kode_tiket){
			$query = $this->db->prepare("DELETE FROM `stts_pembayaran` WHERE `kode_tiket` = ? ");
			$query->bindValue(1,$kode_tiket);
			try {
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function update_statusPembayaran($kode_tiket,$jmlh_bayar,$no_pembayaran,$status_pembayaran,$status_berangkat){
			$query = $this->db->prepare("UPDATE `stts_pembayaran` SET `jmlh_bayar` = ?,`kode_tiket` = ?,`status_pembayaran` = ?,`status_berangkat` = ? WHERE `no_pembayaran` = ? ");
			$query->bindValue(5,$no_pembayaran);
			$query->bindValue(1,$jmlh_bayar);
			$query->bindValue(2,$kode_tiket);
			$query->bindValue(3,$status_pembayaran);
			$query->bindValue(4,$status_berangkat);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function update_statusPembayaranCustomer($no_pembayaran,$img_pemabayaran){
			$query = $this->db->prepare("UPDATE `stts_pembayaran` SET `img_pemabayaran` = ?,`status_pembayaran` = ? WHERE `no_pembayaran` = ? ");
			$query->bindValue(3,$no_pembayaran);
			$query->bindValue(1,$img_pemabayaran);
			$query->bindValue(2,1);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}	
		function update_statusPembayaranUser($no_pembayaran,$jmlh_bayar,$status_pembayaran){
			$query = $this->db->prepare("UPDATE `stts_pembayaran` SET `jmlh_bayar` = ?,`status_pembayaran` = ? WHERE `no_pembayaran` = ? ");
			$query->bindValue(3,$no_pembayaran);
			$query->bindValue(1,$jmlh_bayar);
			$query->bindValue(2,$status_pembayaran);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}				
		function select_allStatusPembayaran(){
			$query = $this->db->prepare("SELECT * FROM `stts_pembayaran` ORDER BY `kode_tiket` DESC ");
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $query->fetchAll();
		}
		function select_idPesanan($kode_tiket){
			$query = $this->db->prepare("SELECT * FROM `stts_pembayaran` WHERE `kode_tiket` = ?");
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