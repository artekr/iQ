<?php

	include_once('questionHandler.php');

	$questionType = trim($_POST['questionType']);

	$qHandler = new QuestionHandler;


	session_start();

	switch ($questionType) {
		case 'General':
			$_SESSION['question_type_id'] = 'general';
			$_SESSION['question_type_name'] = 'general';
			break;

		case 'Usability':
			$_SESSION['question_type_id'] = 'PHUE';
			$_SESSION['question_type_name'] = 'Usability';
			break;

		case 'User Interface':
			$_SESSION['question_type_id'] = 'QUIS';
			$_SESSION['question_type_name'] = 'User Interface';
			break;

		case 'User Interaction':
			$_SESSION['question_type_id'] = 'PUTQ';
			$_SESSION['question_type_name'] = 'User Interaction';
			break;

		case 'Usefulness and Ease of Use':
			$_SESSION['question_type_id'] = 'PUEU';
			$_SESSION['question_type_name'] = 'Usefulness and Ease of Use';
			break;

		case 'System Perfomance':
			$_SESSION['question_type_id'] = 'CSUQ';
			$_SESSION['question_type_name'] = 'System Perfomance';
			break;				
		
		default:
			$_SESSION['question_type_id'] = 'general';
			$_SESSION['question_type_name'] = 'general';
			break;
	}

?>