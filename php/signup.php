<?php
	
	include_once('../php/manageUsers.php');
	$username = $_POST['signup_username'];
	$email = $_POST['signup_email'];
	$password = $_POST['signup_psw'];
	$conf_password = $_POST['signup_conf_psw'];
	
if(isset($_POST['signup_submit'])){

	if (empty($username) || empty($email) || empty($password) || empty($conf_password))
	{	
		echo 'All fields are required';

	} else if ($password != $conf_password) {
		echo 'confirm password does not match your password';
		exit;

	} else {
		$password = md5($password);
		$user_manager = new UserManager;
		$signup = $user_manager->addUser($username, $email, $password);
		header('Location: ../user.php');
	}
	
}

?>
