<?php 
require '../core/init.php';
$general->logged_in_protect();
if (empty($_POST) === false)
{	$username = strip_tags(addslashes(trim($_POST['username']))); 
	$password = strip_tags(addslashes(trim($_POST['password']))); 
	if (empty($username) === true || empty($password) === true) {
		header('location: ../admin/login.php');
		$errors[] = 'Sorry, but we need your username and password.';
	} else if ($users->user_exists($username) === false) {
		header('location: ../admin/login.php');
		$errors[] = 'Sorry, that username doesn\'t exists. Please try again.';
	} 
	else
	{	$login = $users->login_user($username, $password);
		if ($login === false) {
			header('location: ../admin/login.php');
			$errors[] = 'Sorry, that username/password is invalid. Please try again.';
		}else {
			$_SESSION['loginid'] =  $login;
			$users->log_users($login,'Login to Bus System');
			$general->logged_out_protect();
			header('location: ../home.php');
			exit();
		}
	}
} 
?>