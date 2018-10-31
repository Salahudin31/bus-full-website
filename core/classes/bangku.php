<?php
/**
 * 
 */
class Bangku
{
	private $db;
	function __construct($database)
	{
		$this->db = $database;
	}
	function add_bangku($no_bus,$no_bangku){
		$query = $this->db->prepare("INSERT INTO `bangku_bus` (`no_bus`,`no_bangku`,`stat_bangku`) VALUES (?,?,?)");
		$query->bindValue(1,$no_bus);
		$query->bindValue(2,$no_bangku);
		$query->bindValue(3,0);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	function update_bangku($no_bus,$no_bangku,$stat_bangku,$nm_penumpang){
		$query = $this->db->prepare("UPDATE `bangku_bus` SET `no_bangku` = ?,`stat_bangku` = ?,`nm_penumpang` = ? WHERE `no_bus` = ? ");
		$query->bindValue(4,$no_bus);
		$query->bindValue(1,$no_bangku);
		$query->bindValue(2,$stat_bangku);
		$query->bindValue(3,$nm_penumpang);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	function delete_bus($no_bus){
		$query = $this->db->prepare("DELETE FROM `bangku_bus` WHERE `no_bus` = ? ");
		$query->bindValue(1,$no_bus);
		try {
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	function select_Bangku(){
		$query = $this->db->prepare("SELECT * FROM `bangku_bus` ORDER BY `no_bangku` DESC ");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}				
}
?>