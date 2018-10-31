<?php
class General
{	function logged_in(){
		return (isset($_SESSION['loginid'])) ? true : false;
	}
	function logged_in_protect(){
		if($this->logged_in() === true){
			header('Location:../admin/login.php');
			echo $errors;
			exit();
		}
	}
	public function logged_out_protect() {
		if ($this->logged_in() === false) {
			
		    echo $_SESSION['loginid'];
			header('Location:../home.php');
			exit();
		}
	}
}
?>