<?php
	
	include_once('surveyHandler.php');


	$surveyName = trim($_POST['temSurvey_name']);


	echo $surveyName; 
	
	session_start();
	$usr = $_SESSION['user_name'];

	$sHandler = new SurveyHandler;
	$sHandler->addTemSurvey($surveyName, $usr);

?>