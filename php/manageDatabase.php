<?php
	
	//Handle the database connection
	class DatabaseConnection{
		
		/*
		protected $db_conn;
		protected $db_host = 'mysql.serversfree.com';
		protected $db_name = 'u211760130_teamn';
		protected $db_user = 'u211760130_teamn';
		protected $db_pass = 'soen6461';
		*/
		
		protected $db_conn;
		protected $db_host = 'localhost';
		protected $db_name = 'iqdb';
		protected $db_user = 'root';
		protected $db_pass = '';
		

		//connect to the database
		function connect_db(){
			$connection = mysql_connect($this->db_host, $this->db_user, $this->db_pass);
			if (!$connection) {
				die('Could not connect: ' . mysql_error());
				exit;
			}
			//select the database
			if (!mysql_select_db($this->db_name,$connection)){
				echo 'Could not connect to the database $this->db_name';
				echo '<B>Mysql message: </B>' . mysql_error($connection);
				exit;
			}
			return $connection;
		}
		

		function deconnect($connection){
			$deconn = mysql_close($connection);
			return $deconn;
		}

		function exe_query($query){
			$connection = $this->connect_db();
			$result = mysql_query($query, $connection);
			if(!$result){
				$message = 'Invalid query: ' . mysql_error() . "\n";
				$message .='Whole query: ' . $query;
				echo $message;
				$this->deconnect($connection);
				die($message);
			} else {
				$this->deconnect($connection);
				return $result;
			}

		}
	}

?>