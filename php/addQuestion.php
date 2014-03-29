<?php
	
	include_once('questionHandler.php');


	$question = trim($_POST['question']);
	$option = trim($_POST['options']);


	if($_POST['question_submit']){
		
		if (empty($question)||empty($option))
		{	
			echo '<h1>Please fill out the form</h1>';

		} else {

			session_start();
			$surveyName = $_SESSION['survey_name'];

			$qHandler = new questionHandler;
			$qHandler->addNewQuestion($question, $option, $surveyName);
			header('Location: ../create_survey.php#addQuestions');
			
			
			
		}
	}


?>