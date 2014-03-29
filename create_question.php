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



<div data-role="page" id="createNewQuestion">

		<div data-role="header" data-position="fixed" class="header">

	    	<a href="#discardQuestionDia" data-role="button" data-transition="pop" data-rel="popup" data-mini="true" data-corners="false" data-shadow="false" style="text-shadow:none;background:#c0362c;margin-top:1%;margin-left:1%;width:20%;color:white;">Cancel</a>

			<h1>New Question</h1>

		</div>

		<div data-role="popup" id="discardQuestionDia" style="width:250px;color:black;background:rgba(255,255,255,0.9);text-align:center;margin-top:30%;margin-left:8%;"> 

			<div data-role="header" style="background: rgba(51,51,51,0.8);">	

				<p>Cancel?</p>

			</div>

			<div data-role="content">

				<h3 style="margin-bottom:10%;">You may lose all the data.<br>Are you sure to cancel?</h3>

				<a id="confirmBtn" href="create_survey.php#addQuestions" rel="external" data-role="button" data-inline="true" data-corners="false" data-mini="true" data-shadow="false" style="width:65px;margin-right:25px;">Yes</a>

				<a id="cancelBtn" data-role="button" data-rel="back" data-inline="true" data-corners="false" data-mini="true" data-shadow="false" style="border:1px solid grey;color:white;background:#c0362c;width:65px;margin-left:25px;">No</a>

			</div>

		</div>

	<div data-role="content">	

		<h1>Add new questions</h1>	


    	<form action="php/addQuestion.php" method="post" id="create_question_form" data-ajax="false">

        	<div class="createquestion-form">

            	

            	<div id="questionDiv">

            		<p>Question:</p> 
            		<input type="text" name="question" id="question" value="" placeholder="question" data-mini="true" class="required"/>

            	</div>

            	<div id="optionDiv">

            		<p>Options(Please use comma to seperate your options):</p>
            		<input type="text" name="options" id="options" value="" placeholder="option" data-mini="true"/>

                </div>

               	<div id="AddBtnDiv" data-role="fieldcontain">

                	<input type="submit" name="question_submit" id="question_submit" value="Add" data-corners="false" data-shadow="false"/>

               	</div>

				

			</div><!-- //.singn-form -->

			

		</form>

	</div>

	<div data-role="footer" class="footer">

		<h7>@Copyright, Team N, SOEN 6461</h7>

	</div>

</div>



<script>

</script>



</body>

</html>

