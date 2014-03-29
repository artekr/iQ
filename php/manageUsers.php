<?php

	include_once('../php/manageDatabase.php');

	class UserManager{

		protected $db_connection;
		protected $cur_user;

		function __construct(){
			$this->db_connection = new DatabaseConnection;
		}

		//Add user to the database
		function addUser($username, $email, $password){
			$query = "INSERT INTO users (`id`, `username`, `email`, `password`) VALUES (NULL, '$username', '$email', '$password')";
			$this->db_connection->exe_query($query);
		}

		//Validate if user is registered 
		function loginUser($username, $password){
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
			$result = $this->db_connection->exe_query($query);
			return mysql_num_rows($result);
		}

		function setCurUser($cur_user) {
			$this->cur_user = $cur_user;
		}

		function getCurUser() {
			return $this->cur_user;

		}

	}


?>