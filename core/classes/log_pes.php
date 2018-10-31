<?php
	/**
	 * 
	 */
	class Log_Pes
	{
		private $db;
		function __construct($database)
		{
			$this->db = $database;
		}
		function add_log($no_tiket,$status){
			$query = $this->db->prepare("INSERT INTO `log_pesanan` (`no_tiket`,`status`) VALUES (?,?)");
			$query->bindValue(1,$no_tiket);
			$query->bindValue(2,0);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}			
		}
		function delete_log($no_tiket){
			$query = $this->db->prepare("DELETE FROM `log_pesanan` WHERE `no_tiket` = ? ");
			$query->bindValue(1,$no_tiket);
			try {
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}		
		function update_log($no_tiket,$no_bus){
			$query = $this->db->prepare("UPDATE `log_pesanan` SET `status` = ? WHERE `no_tiket` = ? ");
			$query->bindValue(2,$no_tiket);
			$query->bindValue(1,$status);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}			
		}		
		function select_idLog($no_tiket){
			$query = $this->db->prepare("SELECT * FROM `log_pesanan` WHERE `no_tiket` = ?");
			$query->bindValue(1, $no_tiket);
			try{
				$query->execute();
				return $query->fetch();
			} catch(PDOException $e){
				die($e->getMessage());
			}
		}
	}
?>