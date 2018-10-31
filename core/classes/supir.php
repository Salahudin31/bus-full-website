<?php
	/**
	 * 
	 */
	class Supir
	{
		private $db;
		function __construct($database)
		{
			$this->db = $database;
		}
		function add_supir($nm_supir,$telp_supir,$alamat_supir,$status_supir){
			$query = $this->db->prepare("INSERT INTO `supir` (`nm_supir`,`telp_supir`,`alamat_supir`,`status_supir`) VALUES (?,?,?,?)");
			$query->bindValue(1,$nm_supir);
			$query->bindValue(2,$telp_supir);
			$query->bindValue(3,$alamat_supir);
			$query->bindValue(4,$status_supir);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function delete_supir($id_supir){
			$query = $this->db->prepare("DELETE FROM `supir` WHERE `id_supir` = ? ");
			$query->bindValue(1,$id_supir);
			try {
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function update_supir($id_supir,$nm_supir,$telp_supir,$alamat_supir,$status_supir){
			$query = $this->db->prepare("UPDATE `supir` SET `nm_supir` = ?,`telp_supir` = ?,`alamat_supir` = ?,`status_supir` = ? WHERE `id_supir` = ? ");
			$query->bindValue(5,$id_supir);
			$query->bindValue(1,$nm_supir);
			$query->bindValue(2,$telp_supir);
			$query->bindValue(3,$alamat_supir);
			$query->bindValue(4,$status_supir);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function select_allSupir(){
			$query = $this->db->prepare("SELECT * FROM `supir` ORDER BY `nm_supir` ASC ");
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $query->fetchAll();
		}
		function select_idSupir($id_supir){
			$query = $this->db->prepare("SELECT * FROM `supir` WHERE `id_supir` = ?");
			$query->bindValue(1, $id_supir);
			try{
				$query->execute();
				return $query->fetch();
			} catch(PDOException $e){
				die($e->getMessage());
			}
		}
	}
?>