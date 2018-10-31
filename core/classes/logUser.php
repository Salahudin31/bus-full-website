<?php
	/**
	 * 
	 */
	class LogUser
	{
		private $db;
		function __construct($database)
		{
			$this->db = $database;
		}
		function select_allLog(){
			$query = $this->db->prepare("SELECT * FROM `log_user` ORDER BY `time` DESC ");
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $query->fetchAll();
		}
		function select_idLog($kode_tiket){
			$query = $this->db->prepare("SELECT * FROM `log_user` WHERE `id` = ?");
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