<?php
	
	include_once('surveyHandler.php');

	$pubSurvey_name = trim($_POST['pubSurvey_name']);


	echo $pubSurvey_name; 
	
	session_start();
	$usr = $_SESSION['user_name'];

	$sHandler = new SurveyHandler;
	$sHandler->publishSurvey($pubSurvey_name,$usr);

?>