<!DOCTYPE html> 
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0;" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>Create Survey</title>
<link href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" rel="stylesheet" type="text/css"/>
<script src="http://code.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js" type="text/javascript"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />


</head> 
<body> 

<div data-role="page" id="createNewSurvey">
		<div data-role="header" data-position="fixed" class="header">
	    	<a href="#discardSurveyDia" data-role="button" data-transition="pop" data-rel="popup" data-mini="true" data-corners="false" data-shadow="false" style="text-shadow:none;background:#c0362c;margin-top:1%;margin-left:1%;width:20%;color:white;">Cancel</a>
			<h1>New Survey</h1>
		</div>
		<div data-role="popup" id="discardSurveyDia" style="width:250px;color:black;background:rgba(255,255,255,0.9);text-align:center;margin-top:30%;margin-left:8%;"> 
			<div data-role="header" style="background: rgba(51,51,51,0.8);">	
				<p>Cancel Survey?</p>
			</div>
			<div data-role="content">
				<h3 style="margin-bottom:10%;">You may lose all the data.<br>Are you sure to cancel?</h3>
				<a id="confirmBtn" href="user.php#newSurvey" rel="external" data-role="button" data-inline="true" data-corners="false" data-mini="true" data-shadow="false" style="width:65px;margin-right:25px;">Yes</a>
				<a id="cancelBtn" data-role="button" data-rel="back" data-inline="true" data-corners="false" data-mini="true" data-shadow="false" style="border:1px solid grey;color:white;background:#c0362c;width:65px;margin-left:25px;">No</a>
			</div>
		</div>
	<div data-role="content">	

		<form action="php/addSurvey.php" method="post" id="create_survey_form" data-ajax="false">
        	<div class="createsurvey-form">
            	
            	<div id="surveyDiv">
            		<h2>Survey Name:</h2>
					<input type="text" name="SurveyName" id="SurveyName" value="" placeholder="Survey"  class="required"/>
					<div data-role="fieldcontain" id="AddSurveyNameBtnDiv">
						</br>
						<input type="submit" name="sureyName_submit" id="sureyName_submit" value="Add" data-mini="true" data-corners="false" data-shadow="false"/>
					</div>
            	</div>

			</div>
		</form>

	</div>
	<div data-role="footer" class="footer">
		<h7>@Copyright, Team N, SOEN 6461</h7>
	</div>
</div>



<!--Select questions from question bank-->
<div data-role="page" id="addQuestions">
	<div id="addQuestionCover">
		<div data-role="header" data-position="fixed" class="header">
	    	<a href="#discardSelectionDia" data-role="button" data-transition="pop" data-rel="popup" data-mini="true" data-corners="false" data-shadow="false" style="text-shadow:none;background:#c0362c;margin-top:1%;margin-left:1%;width:20%;color:white;">Done</a>
			<h1>Add questions</h1>
		</div>
	</div>
		<div data-role="popup" id="discardSelectionDia" style="width:250px;color:black;background:rgba(255,255,255,0.9);text-align:center;margin-top:30%;margin-left:8%;"> 
			<div data-role="header" style="background: rgba(51,51,51,0.8);">	
				<p>Congratulations</p>
			</div>
			<div data-role="content">
				<h3 style="margin-bottom:10%;">You created a new survey!<br>You can check it in the </strong>Check Survey</strong> section!</h3>
				<a id="confirmBtn" href="user.php" rel="external" data-role="button" data-inline="true" data-corners="false" data-mini="true" data-shadow="false" style="width:65px;margin-left:auto;margin-right:auto;">Got it!</a>
			</div>
		</div>
	<div data-role="content">	
    	<ul data-role="listview" class="homelist">
			<li data-icon="false"><a href="create_question.php" data-transition="pop">Create new question</a></li>
			<li data-icon="false"><a href="#selectQuestion" data-transition="pop">Select from question bank</a></li>
		</ul>
	</div>
	<div data-role="footer" class="footer">
		<h7>@Copyright, Team N, SOEN 6461</h7>
	</div>
</div>






<!--Select questions from question bank-->
<div data-role="page" id="selectQuestion">
	<div id="selectQuestionCover">
		<div data-role="header" data-position="fixed" class="header">
	    	<a href="#addQuestions" rel='external' data-role="button" data-transition="pop" data-rel="popup" data-mini="true" data-corners="false" data-shadow="false" style="text-shadow:none;margin-top:1%;margin-left:1%;width:20%;color:white;">Back</a>
			<h1>Select questions</h1>
		</div>
	</div>	
		<div data-role="popup" id="discardSelectionDia" style="width:250px;color:black;background:rgba(255,255,255,0.9);text-align:center;margin-top:30%;margin-left:8%;"> 
			<div data-role="header" style="background: rgba(51,51,51,0.8);">	
				<p>Fin?</p>
			</div>
			<div data-role="content">
				<h3 style="margin-bottom:10%;">You may lose all the data.<br>Are you sure to cancel?</h3>
				<a id="confirmBtn" href="user.php" rel="external" data-role="button" data-inline="true" data-corners="false" data-mini="true" data-shadow="false" style="width:65px;margin-right:25px;">Yes</a>
				<a id="cancelBtn" data-role="button" data-rel="back" data-inline="true" data-corners="false" data-mini="true" data-shadow="false" style="border:1px solid grey;color:white;background:#c0362c;width:65px;margin-left:25px;">No</a>
			</div>
		</div>
	<div data-role="content">	
		<p>Please select the question type:</p>
		<select data-mini="true" id="questionTypeOptions">
			<option value = "1">General</option>
			<option value = "2">Usability</option>
			<option value = "3">User Interface</option>
			<option value = "4">User Interaction</option>
			<option value = "5">Usefulness and Ease of Use</option>
			<option value = "6">System Perfomance</option>
		</select>
		<div data-role='fieldcontain'>
			<input type="submit" onclick='checkSelectQuestionType()' name="sureyName_submit" id="sureyName_submit" value="Continue" data-mini="true" data-corners="false" data-shadow="false"/>
		</div>
		<script>
			function checkSelectQuestionType(){
				var e = document.getElementById("questionTypeOptions");
				var questionType = e.options[e.selectedIndex].text;
				$.ajax ({
							url: "php/manageQuestionType.php",
							type:"POST",
							data:{ questionType:questionType},
							success: function(data){ 
								window.location.href= 'questionBank.php';
							}
						});
			}
		</script>
	</div>
	<div data-role="footer" class="footer">
		<h7>@Copyright, Team N, SOEN 6461</h7>
	</div>
</div>



</body>
</html>
