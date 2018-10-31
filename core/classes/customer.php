<?php 
class Customer{
	private $db;
	public function __construct($database)
	{   $this->db = $database; }	
	public function customer_exists($nm_customer) 
	{	$query = $this->db->prepare("SELECT COUNT(`id`) FROM `customer` WHERE `nm_customer`= ?");
		$query->bindValue(1, $nm_customer);
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

	public function email_exists($e_customer)
	{	$query = $this->db->prepare("SELECT COUNT(`id`) FROM `customer` WHERE `e_customer`= ?");
		$query->bindValue(1, $e_customer);
		try{
			$query->execute();
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
	public function add_customer($nm_customer,$a_customer,$telp_customer,$e_customer,$jns_kelamin)
	{
		$ip 		= $_SERVER['REMOTE_ADDR'];
	 	$query 	= $this->db->prepare("INSERT INTO `customer` (`nm_customer`, `a_customer`, `telp_customer`, `e_customer`, `jns_kelamin`, `ip_customer`) VALUES (?, ?, ?, ?, ?, ?)");
		$query->bindValue(1, $nm_customer);
		$query->bindValue(2, $a_customer);
		$query->bindValue(3, $telp_customer);
		$query->bindValue(4, $e_customer);
		$query->bindValue(5, $jns_kelamin);
		$query->bindValue(6, $ip);
	 	try{
			$query->execute();
	 	}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function update_customer($idcustomer,$nm_customer,$a_customer,$telp_customer,$e_customer,$jns_kelamin)
	{
		$ip 		= $_SERVER['REMOTE_ADDR'];
	 	$query 	= $this->db->prepare("UPDATE `customer` SET `nm_customer` = ? , `a_customer` = ? , `telp_customer` = ? , `e_customer` = ? , `jns_kelamin` = ? , `ip_customer` = ? WHERE `id` = ?");
		$query->bindValue(1, $nm_customer);
		$query->bindValue(2, $a_customer);
		$query->bindValue(3, $telp_customer);
		$query->bindValue(4, $e_customer);
		$query->bindValue(5, $jns_kelamin);
		$query->bindValue(6, $ip);
		$query->bindValue(7, $idcustomer);
	 	try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function delete($idcustomer){
		$sql="DELETE FROM `customers` WHERE `id` = ?";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $idcustomer);
		try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}	
	
	public function activate($e_customer, $p_customer)
	{	$query = $this->db->prepare("SELECT COUNT(`id`) FROM `customer` WHERE `e_customer` = ? AND `p_customer` = ? AND `confirmed` = ?");
		$query->bindValue(1, $e_customer);
		$query->bindValue(2, $p_customer);
		$query->bindValue(3, 0);
		try{
			$query->execute();
			$rows = $query->fetchColumn();
			if($rows == 1){
				$query_2 = $this->db->prepare("UPDATE `customer` SET `confirmed` = ? WHERE `e_customer` = ?");
				$query_2->bindValue(1, 1);
				$query_2->bindValue(2, $e_customer);				
				$query_2->execute();
				return true;
			}else{
				return false;
			}
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function email_confirmed($username)
	{	$query = $this->db->prepare("SELECT COUNT(`id`) FROM `customer` WHERE `username`= ? AND `confirmed` = ?");
		$query->bindValue(1, $username);
		$query->bindValue(2, 1);
		try{
			$query->execute();
			$rows = $query->fetchColumn();
			if($rows == 1){
				return true;
			}else{
				return false;
			}
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function login_customer($username, $password)
	{	$query = $this->db->prepare("SELECT `e_customer`, `id` FROM `customer` WHERE `e_customer` = ?");
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
	public function customer_data($idcustomer)
	{	$query = $this->db->prepare("SELECT * FROM `customer` WHERE `id`= ?");
		$query->bindValue(1, $idcustomer);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	} 
	public function get_customers()
	{	$query = $this->db->prepare("SELECT * FROM `customer` ORDER BY `nm_customer` ASC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}	
}