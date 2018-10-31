<?php
	/**
	 * 
	 */
	class Agenda
	{
		private $db;
		function __construct($database)
		{
			$this->db = $database;
		}
		function add_agenda($judul,$tgl_mulai,$tgl_selesai){
			$query = $this->db->prepare("INSERT INTO `agenda_bus` (`judul`,`tgl_mulai`,`tgl_selesai`) VALUES (?,?,?)");
			$query->bindValue(1,$judul);
			$query->bindValue(2,$tgl_mulai);
			$query->bindValue(3,$tgl_selesai);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function delete_agenda($id_agenda){
			$query = $this->db->prepare("DELETE FROM `agenda_bus` WHERE `id` = ? ");
			$query->bindValue(1,$id_agenda);
			try {
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function update_agenda($id_agenda,$judul,$tgl_mulai,$tgl_selesai){
			$query = $this->db->prepare("UPDATE `agenda_bus` SET `judul` = ? ,`tgl_mulai` = ?,`tgl_selesai` = ? WHERE `id` = ? ");
			$query->bindValue(4,$id_agenda);
			$query->bindValue(1,$judul);
			$query->bindValue(2,$tgl_mulai);
			$query->bindValue(3,$tgl_selesai);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
	}
?>