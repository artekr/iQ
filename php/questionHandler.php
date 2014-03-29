<?php
	
	include_once('manageDatabase.php');
	
	class QuestionHandler{

		protected $db_connection;
		protected $question;
		protected $description;
		protected $options;
		protected $question_id;

		function __construct(){
			$this->db_connection = new DatabaseConnection;
		}


		function getAllQuestion(){
			$query = "SELECT * FROM question";
			$this->question = $this->db_connection->exe_query($query);

			while ($result = mysql_fetch_assoc($this->question)) {
				$this->description[] = $result['description'];
				$this->options[] = $result['options'];
			}
			
			$this->setDescription($this->description);
			$this->setAnswers($this->options);
		}

		function setDescription($description){
			
			return $this->description = $description;
		}

		function setAnswers($options){
			
			return $this->options = $options;
		}

		function getDescription(){
			
			return $this->description;
		}

		function getAnswers(){

			return $this->options;
		}

		function getQuestionId(){

			return $this->question_id;
		}

		function addNewQuestion($question, $option,$surveyName){
			
			$query = "INSERT INTO question (`id`, `type`, `template`,`username`,`description`,`options`) VALUES (NULL, 'self', 'false',' ','$question','$option')";
			$this->db_connection->exe_query($query);


			$query = "SELECT id FROM question WHERE description='$question'";
			$questionId = $this->db_connection->exe_query($query);

			while ($result = mysql_fetch_array($questionId)) {
				$Q_id = $result['id'];
			}


			$query = "SELECT id FROM survey WHERE name='$surveyName'";
			$surveyId = $this->db_connection->exe_query($query);

			while ($result = mysql_fetch_array($surveyId)) {
				$survey_id = $result['id'];
			}

			$query = "INSERT INTO map_survey_question (`id`, `survey_fk`, `question_fk`) VALUES (NULL, '$survey_id', '$Q_id')"; 

			$this->db_connection->exe_query($query);
			
		}

		function getQuestionByType($type){
			$query = "SELECT * FROM question WHERE type='$type'";
			$this->question = $this->db_connection->exe_query($query);

			while ($result = mysql_fetch_assoc($this->question)) {
				$this->question_id[] = $result['id'];
				$this->description[] = $result['description'];
				$this->options[] = $result['options'];
			}
			
			return $this->question;
		}

		function getQuestionsBySurveyName($surveyName){
			
			$query = "SELECT id FROM survey WHERE name='$surveyName'";	
			$rawData = $this->db_connection->exe_query($query);

			while ($result = mysql_fetch_array($rawData)) {
				$survey_id = $result['id'];
			}
			
			$query = "SELECT question_fk FROM map_survey_question WHERE survey_fk='$survey_id'";	
			$rawData = $this->db_connection->exe_query($query);
			
			while ($result = mysql_fetch_assoc($rawData)) {
				$question_id[] = $result['question_fk'];
			}

			if (empty($question_id)){
			
				return false;

			} else {

				$query = 'SELECT * FROM question WHERE id IN ("' . implode('","', $question_id) . '")';
				$this->question = $this->db_connection->exe_query($query);

				while ($result = mysql_fetch_assoc($this->question)) {
					$this->description[] = $result['description'];
					$this->options[] = $result['options'];
				}

				$this->setDescription($this->description);
				$this->setAnswers($this->options);

				return true;	
			}
			
		}


	}

?>
