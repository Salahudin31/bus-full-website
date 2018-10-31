<?php
	/**
	 * 
	 */
	class Jadwal
	{
		private $db;
		function __construct($database)
		{
			$this->db = $database;
		}
		function add_jadwal($no_bus,$id_supir,$tgl_bus,$jam_bus,$bangku_kosong){
			$query = $this->db->prepare("INSERT INTO `jdwl_bus` (`no_bus`,`id_supir`,`tgl_bus`,`jam_bus`,`bangku_kosong`) VALUES (?,?,?,?,?)");
			$query->bindValue(1,$no_bus);
			$query->bindValue(2,$id_supir);
			$query->bindValue(3,$tgl_bus);
			$query->bindValue(4,$jam_bus);
			$query->bindValue(5,$bangku_kosong);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function delete_jadwal($id_jdwl){
			$query = $this->db->prepare("DELETE FROM `jdwl_bus` WHERE `id_jdwl` = ? ");
			$query->bindValue(1,$id_jdwl);
			try {
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function update_jadwal($id_jdwl,$no_bus,$id_supir,$tgl_bus,$jam_bus,$bangku_kosong){
			$query = $this->db->prepare("UPDATE `jdwl_bus` SET `no_bus` = ?,`id_supir` = ?,`tgl_bus` = ?,`jam_bus` = ?,`bangku_kosong` = ? WHERE `id_jdwl` = ? ");
			$query->bindValue(6,$id_jdwl);
			$query->bindValue(1,$no_bus);
			$query->bindValue(2,$id_supir);
			$query->bindValue(3,$tgl_bus);
			$query->bindValue(4,$jam_bus);
			$query->bindValue(5,$bangku_kosong);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function select_allJadwal(){
			$query = $this->db->prepare("SELECT * FROM `jdwl_bus` ORDER BY `id_jdwl` DESC ");
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $query->fetchAll();
		}
		function select_idjadwal($id_jdwl){
			$query = $this->db->prepare("SELECT * FROM `jdwl_bus` WHERE `id_jdwl` = ?");
			$query->bindValue(1, $id_jdwl);
			try{
				$query->execute();
				return $query->fetch();
			} catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function select_busjadwal($no_bus){
			$query = $this->db->prepare("SELECT * FROM `jdwl_bus` WHERE `no_bus` = ?");
			$query->bindValue(1, $no_bus);
			try{
				$query->execute();
				return $query->fetch();
			} catch(PDOException $e){
				die($e->getMessage());
			}
		}		
	}
?>