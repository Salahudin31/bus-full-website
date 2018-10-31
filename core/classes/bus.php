<?php
	/**
	 * 
	 */
	class Bus
	{
		private $db;
		function __construct($database)
		{
			$this->db = $database;
		}
		function add_bus($no_bus,$jns_bus,$bangku,$fasilitas){
			$query = $this->db->prepare("INSERT INTO `bus` (`no_bus`,`jns_bus`,`bangku`,`fasilitas`) VALUES (?,?,?,?)");
			$query->bindValue(1,$no_bus);
			$query->bindValue(2,$jns_bus);
			$query->bindValue(3,$bangku);
			$query->bindValue(4,$fasilitas);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function delete_bus($no_bus){
			$query = $this->db->prepare("DELETE FROM `bus` WHERE `no_bus` = ? ");
			$query->bindValue(1,$no_bus);
			try {
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function update_bus($no_bus,$jns_bus,$bangku,$fasilitas){
			$query = $this->db->prepare("UPDATE `bus` SET `jns_bus` = ?,`bangku` = ?,`fasilitas` = ? WHERE `no_bus` = ? ");
			$query->bindValue(4,$no_bus);
			$query->bindValue(1,$jns_bus);
			$query->bindValue(2,$bangku);
			$query->bindValue(3,$fasilitas);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function select_allBus(){
			$query = $this->db->prepare("SELECT * FROM `bus` ORDER BY `id` DESC ");
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $query->fetchAll();
		}
		function select_idBus($no_bus){
			$query = $this->db->prepare("SELECT * FROM `bus` WHERE `no_bus` = ?");
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