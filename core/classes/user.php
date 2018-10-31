<?php
	/**
	 * 
	 */
	class User
	{
		private $db;
		function __construct($database)
		{
			$this->db=$database;
		}
		public function user_exists($username) 
		{	$query = $this->db->prepare("SELECT COUNT(`id`) FROM `user` WHERE `username`= ?");
			$query->bindValue(1, $username);
			try
			{	$query->execute();
				$rows = $query->fetchColumn();
				if($rows == 1){
					return true;
				}else{
					return false;
				}
			} catch (PDOException $e){
				die($e->getMessage());
			}
		}
		function add_user($nama,$alamat,$username,$password,$po,$warna,$level,$telp){
			$ip	= $_SERVER['REMOTE_ADDR'];
			$password   = sha1($password);
			$query = $this->db->prepare("INSERT INTO `user` (`username`,`password`,`level`,`kode_warna`,`nama_user`,`telp`,`alamat`,`po`,`status`,`ip`) VALUES (?,?,?,?,?,?,?,?,?)");
			$query->bindValue(1, $username);
			$query->bindValue(2, $password);
			$query->bindValue(3,$level);
			$query->bindValue(4,$warna);
			$query->bindValue(5,$nama);
			$query->bindValue(6,$telp);
			$query->bindValue(7,$alamat);
			$query->bindValue(8,$po);
			$query->bindValue(9,1);
			$query->bindValue(10,$ip);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function delete_user($id){
			$query = $this->db->prepare("DELETE FROM `user` WHERE `id` = ? ");
			$query->bindValue(1,$id);
			try {
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function update_user($nama,$alamat,$username,$password,$po,$warna,$level,$status,$telp){
			$query = $this->db->prepare("UPDATE `user` SET `password` = ?, `level` = ?, `kode_warna` = ?, `nama_user` = ?, `telp` = ?, `alamat` = ?, `po` = ?, `status` = ? WHERE `username` = ?");
			$query->bindValue(9,$username);
			$query->bindValue(1,$password);
			$query->bindValue(2,$level);
			$query->bindValue(3,$warna);
			$query->bindValue(4,$nama);
			$query->bindValue(5,$telp);
			$query->bindValue(6,$alamat);
			$query->bindValue(7,$po);
			$query->bindValue(8,$status);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		public function login_user($username, $password)
		{	$query = $this->db->prepare("SELECT `password`, `id` FROM `user` WHERE `username` = ?");
			$query->bindValue(1, $username);
			try{
				$query->execute();
				$data 				= $query->fetch();
				$stored_password 	= $data['password'];
				$id   				= $data['id'];
				if($stored_password === sha1($password)){
					return $id;	
				}else{
					return false;	
				}
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		public function log_users($id,$log)
		{	$time 		= time();
			$ip 		= $_SERVER['REMOTE_ADDR'];
			$browser	= $_SERVER['HTTP_USER_AGENT'];
		 	$query 	= $this->db->prepare("INSERT INTO `log_user` (`id`,`time`,`ip`,`browser`,`log`) VALUES (?, ?, ?, ?, ?)");
		 	$query->bindValue(1, $id);
			$query->bindValue(2, $time);
			$query->bindValue(3, $ip);
			$query->bindValue(4, $browser);
			$query->bindValue(5, $log);
		 	try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}
		function select_user(){
			$query = $this->db->prepare("SELECT * FROM `user` ");
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $query->fetchAll();
		}
		public function userdata($id)
		{	$query = $this->db->prepare("SELECT * FROM `user` WHERE `id`= ?");
			$query->bindValue(1, $id);
			try{
				$query->execute();
				return $query->fetch();
			} catch(PDOException $e){
				die($e->getMessage());
			}
		} 
		public function select_levelUser($level)
		{	$query = $this->db->prepare("SELECT * FROM `user` WHERE `level`= ?");
			$query->bindValue(1, $level);
			try{
				$query->execute();
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $query->fetchAll();
		} 
	}
?>