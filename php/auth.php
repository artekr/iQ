<?php

	include_once('../php/manageUsers.php');

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);


	if($_POST['signin_submit']){

		if (empty($username) || empty($password))
		{	
			echo 'All fields are required';

		} else {

			$password = md5($password);
		
			$user_manager = new UserManager;
			$login = $user_manager->loginUser($username, $password);

			if($login == 1){
				$user_manager->setCurUser($username);
				header('Location: ../user.php');
			} else {
				echo "No such a user exit!";
			}

		}
	}

	session_start();

	$_SESSION['user_name'] = $username;

?>