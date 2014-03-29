<?php

	include_once('manageDatabase.php');

	class SurveyHandler{

		protected $db_connection;
		protected $templateSurvey;
		protected $usrSurvey;
		protected $pubSurvey;
		
		protected $tSurveyName;
		protected $usrSurveyName;
		protected $pubSurveyName;

		protected $link_id;
		protected $link_name;


		function __construct(){
			$this->db_connection = new DatabaseConnection;
		}


		function getTemplateSurveyNames(){

			$query = "SELECT * FROM survey WHERE template=true";
			$this->templateSurvey = $this->db_connection->exe_query($query);

			while($result = mysql_fetch_assoc($this->templateSurvey)) {
				$this->tSurveyName[] = $result['name'];
			}
			return $this->tSurveyName;
		}

		function addTemSurvey($surveyName, $username){
			
			$query = "SELECT id FROM survey WHERE name='$surveyName'";
			$surveyId = $this->db_connection->exe_query($query);

			while ($result = mysql_fetch_array($surveyId)) {
				$survey_id = $result['id'];
			}	

			$query = "SELECT id FROM users WHERE username='$username'";
			$usrId = $this->db_connection->exe_query($query);

			while ($result = mysql_fetch_array($usrId)) {
				$user_id = $result['id'];
			}

			$query = "INSERT INTO map_user_survey (`survey_fk`, `id`, `user_fk`) VALUES ('$survey_id', NULL, '$user_id')"; 

			$this->db_connection->exe_query($query);

		}

		function addNewSurvey($surveyName, $username){
			
			$query = "INSERT INTO survey (`id`, `name`, `template`) VALUES (NULL, '$surveyName', 'false')";
			$this->db_connection->exe_query($query);


			$query = "SELECT id FROM users WHERE username='$username'";
			$usrId = $this->db_connection->exe_query($query);

			while ($result = mysql_fetch_array($usrId)) {
				$user_id = $result['id'];
			}


			$query = "SELECT id FROM survey WHERE name='$surveyName'";
			$surveyId = $this->db_connection->exe_query($query);

			while ($result = mysql_fetch_array($surveyId)) {
				$survey_id = $result['id'];
			}

			$query = "INSERT INTO map_user_survey (`survey_fk`, `id`, `user_fk`) VALUES ('$survey_id', NULL, '$user_id')"; 

			$this->db_connection->exe_query($query);

		}


		function getSurveyNamesByUsername($usr) {


			$query1 = "SELECT id FROM users WHERE username='$usr'";
			$usrId = $this->db_connection->exe_query($query1);

			while ($result = mysql_fetch_array($usrId)) {
				$user_id = $result['id'];
			}

			$query2 = "SELECT survey_fk FROM map_user_survey WHERE user_fk='$user_id'";	
			$rawData = $this->db_connection->exe_query($query2);
			
			while ($result = mysql_fetch_assoc($rawData)) {
				$survey_id[] = $result['survey_fk'];
			}

			if (empty($survey_id)){

				return false;

			} else {

				$query3 = 'SELECT * FROM survey WHERE id IN ("' . implode('","', $survey_id) . '")';
				$survey = $this->db_connection->exe_query($query3);

				while ($result = mysql_fetch_assoc($survey)) {
					$this->usrSurveyName[] = $result['name'];
				}

				return $this->usrSurveyName;	
			}


		}


		function publishSurvey($survey_name, $usrname){

			$query = "SELECT id FROM users WHERE username='$usrname'";
			$usrId = $this->db_connection->exe_query($query);
			while ($result = mysql_fetch_array($usrId)) {
				$user_id = $result['id'];
			}

			$query = "SELECT id FROM survey WHERE name='$survey_name'";
			$surveyId = $this->db_connection->exe_query($query);
			while ($result = mysql_fetch_array($surveyId)) {
				$survey_id = $result['id'];
			}


			$query = "UPDATE map_user_survey SET published=true WHERE user_fk='$user_id' AND survey_fk='$survey_id'";
			$this->db_connection->exe_query($query);

		}



		function getPublishedSurveyNames() {

			$query = "SELECT survey_fk FROM map_user_survey WHERE published=true";
			$pubSurvey = $this->db_connection->exe_query($query);
			while($result = mysql_fetch_assoc($pubSurvey)) {
				$surveyID[] = $result['survey_fk'];
			}

			if (empty($surveyID)){

				return false;
			} else {

				$query = 'SELECT * FROM survey WHERE id IN  ("' . implode('","', $surveyID) . '")';
				$pubSurveys = $this->db_connection->exe_query($query);
				while($result = mysql_fetch_assoc($pubSurveys)) {
					$this->pubSurveyName[] = $result['name'];
				}
				
				return $this->pubSurveyName;
			}
		}


		function setSurveyLinkID($link_id){
			
			$this->link_id = $link_id;
			return $this->link_id;
		}

		function setSurveyLinkName($link_name){
			
			$this->link_name = $link_name;
			return $this->link_name;
		}

		function getSurveyLinkID(){

			return $this->link_id;
		}

		function getSurveyLinkName(){

			return $this->link_name;
		}

	}


?>
