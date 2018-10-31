<?php
	/**
	 * 
	 */
	class Log_Bus
	{
		private $db;
		function __construct($database)
		{
			$this->db = $database;
		}
		function add_log($id_jdwl,$no_bus,$id_supir,$status,$user_id,$time,$keyword){
			$query = $this->db->prepare("INSERT INTO `log_bus` (`id_jdwl`,`no_bus`,`id_supir`,`status`,`user_id`,`time`,`keyword`) VALUES (?,?,?,?,?,?,?)");
			$query->bindValue(1,$id_supir);
			$query->bindValue(2,$no_bus);
			$query->bindValue(3,$id_supir);
			$query->bindValue(4,$status);
			$query->bindValue(5,$user_id);
			$query->bindValue(6,$time);
			$query->bindValue(7,$keyword);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}			
		}
		function delete_log($id_jdwl){
			$query = $this->db->prepare("DELETE FROM `log_bus` WHERE `id_jdwl` = ? ");
			$query->bindValue(1,$id_jdwl);
			try {
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}		
		function update_log($id_jdwl,$no_bus,$id_supir,$status,$user_id,$time,$keyword){
			$query = $this->db->prepare("UPDATE `log_bus` SET `no_bus` = ?,`id_supir` = ?,`status` = ?,`user_id` = ?,`time` = ?,`keyword` = ? WHERE `id_jdwl` = ? ");
			$query->bindValue(7,$id_jdwl);
			$query->bindValue(1,$no_bus);
			$query->bindValue(2,$id_supir);
			$query->bindValue(3,$status);
			$query->bindValue(4,$user_id);
			$query->bindValue(5,$time);
			$query->bindValue(5,$keyword);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}			
		}		
		function select_allLog(){
			$query = $this->db->prepare("SELECT * FROM `log_bus` ORDER BY `id_logbus` DESC ");
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $query->fetchAll();
		}
		function select_idLog($id_logbus){
			$query = $this->db->prepare("SELECT * FROM `log_bus` WHERE `id` = ?");
			$query->bindValue(1, $id_logbus);
			try{
				$query->execute();
				return $query->fetch();
			} catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function select_userId($user_id){
			$query = $this->db->prepare("SELECT * FROM `log_bus` WHERE `user_id` = ?");
			$query->bindValue(1, $user_id);
			try{
				$query->execute();
				return $query->fetch();
			} catch(PDOException $e){
				die($e->getMessage());
			}
		}		
	}
?>