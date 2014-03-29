<?php
	
	include_once('surveyHandler.php');


	$surveyName = trim($_POST['SurveyName']);


	if($_POST['sureyName_submit']){
		
		if (empty($surveyName))
		{	
			echo '<h1>Please enter a survey name</h1>';

		} else {

			session_start();
			$usr = $_SESSION['user_name'];

			$sHandler = new SurveyHandler;
			$sHandler->addNewSurvey($surveyName, $usr);
			header('Location: ../create_survey.php#addQuestions');
		}
	}

	session_start();

	$_SESSION['survey_name'] = $surveyName;
?>