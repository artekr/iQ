<!DOCTYPE html> 
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0;"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<title>User profile</title>
<link href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" rel="stylesheet" type="text/css"/>
<script src="http://code.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js" type="text/javascript"></script>

<link href="css/style.css" rel="stylesheet" type="text/css"/>
<?php 

session_start();
$usr = $_SESSION['user_name'];

?>
</head> 
<body> 


<!--User Home Page-->
<div data-role="page" id="userhome">
	<div id="usercover">
    	<div data-role="header" data-position="fixed" class="header" id="homeheader">
    		<!--<a href="indext.php" rel='external' data-corners="false" data-shadow="false" data-role="button" data-transition="pop" data-direction="reverse">Back</a>-->
        	<h1>Welcome Back</h1>
        	<a  href="#confirmDia" class="ui-btn-right" data-role="button" data-transition="pop" data-rel="popup" data-corners="false" data-shadow="false" data-theme="mytheme">Sign out</a>
		</div>
	</div>	
	<div data-role="popup" id="confirmDia" style="width:250px;color:black;background:rgba(255,255,255,0.9);text-align:center;margin-top:30%;margin-right:18px;"> 
		<div data-role="header" style="background: rgba(51,51,51,0.8);">	
			<h1>Sign out?</h1>
		</div>
		<div data-role="content">
			<h3 style="margin-bottom:10%;">Are you sure to sign out?</h3>
			<a id="confirmBtn" href="index.php" rel="external" data-role="button" data-inline="true" data-corners="false" data-mini="true" data-shadow="false" style="width:65px;margin-right:25px;">Yes</a>
			<a id="cancelBtn" data-role="button" data-rel="back" data-inline="true" data-corners="false" data-mini="true" data-shadow="false" style="margin-left:25px;">Cancel</a>
		</div>
	</div>
	<div data-role="content">
		<ul data-role="listview" class="homelist">
			<li data-icon="false"><a href="#newSurvey" data-transition="pop">Create Survey</a></li>
            <li data-icon="false"><a href="#checkSurvey" data-transition="pop">Check Survey</a></li>
            <li data-icon="false"><a href="#checkReport" data-transition="pop">Check Report</a></li>
		</ul>		
	</div>
	<div data-role="footer" class="footer">
		<h7>@Copyright, Team N, SOEN 6461</h7>
	</div>
</div>


<!--User Create new survey-->
<div data-role="page" id="newSurvey">
	<div id="newSurveyCover">
		<div data-role="header" data-position="fixed" class="header">
	    	<a href="#userhome" class="backBtn" data-corners="false" data-shadow="false" data-role="button" data-transition="pop" data-direction="reverse">Back</a>
			<h1>Create Survey</h1>
		</div>
	</div>
	<div data-role="content">	
		<ul data-role="listview" class="homelist">
			<li data-icon="false"><a href="#templateSurvey" data-transition="pop">Select Template</a></li>
            <li data-icon="false"><a href="create_survey.php" rel="external" data-transition="pop">Create New Survey</a></li>
		</ul>
	</div>
	<div data-role="footer" class="footer">
		<h7>@Copyright, Team N, SOEN 6461</h7>
	</div>
</div>


<!--User Select Template Survey-->
<div data-role="page" id="templateSurvey">
		<div data-role="header" data-position="fixed" class="header">
	    	<a href="#newSurvey" class="backBtn" data-corners="false" data-shadow="false" data-role="button" data-transition="pop" data-direction="reverse">Back</a>
			<h1>Template Survey</h1>
		</div>
	<div data-role="content">	
		<ul data-role="listview" class="homelist">
			<script type="text/javascript">
				$(document).ready(function(){
					$(".templateLink").click(function () {
						var link_id = $(this).attr("id");
						var link_name = $(this).attr("name");

						sendInfo(link_id,link_name);
					});
					function sendInfo(link_id,link_name){
						$.ajax ({
							url: "php/managePages.php",
							type:"POST",
							data:{ page_id:link_id, page_name:link_name},
							success: function(data){ 
								window.location.href= 'tempSurvey.php';
							}
						});
					}

				});

			</script>

			<?php 
				include 'php/surveyHandler.php';
				$sHandler = new SurveyHandler; 
				$temName = $sHandler->getTemplateSurveyNames();
				$tem_num = count($temName);

				for ($n=0; $n < $tem_num; $n++) {
					$id = preg_replace('/\s+/', '', $temName[$n]);
					echo "<li data-icon='false'>";
					echo "<a class='templateLink' href='' id='" . $id . "' name='" . $temName[$n] . "' data-transition='pop'>" . $temName[$n] . "</a></li>";
					//tempSurvey.php#" . $id . "
				}
			?>
			
		</ul>
	</div>
	<div data-role="footer" class="footer">
		<h7>@Copyright, Team N, SOEN 6461</h7>
	</div>
</div>



<!--User Check Survey-->
<div data-role="page" id="checkSurvey">
	<div id="checkSurveyCover">
		<div data-role="header" data-position="fixed" class="header">
	    	<a href="#userhome" class="backBtn" data-corners="false" data-shadow="false" data-role="button" data-transition="pop" data-direction="reverse">Back</a>
			<h1>Check Survey</h1>
		</div>
	</div>
	<div data-role="content">
		<ul data-role="listview" class="homelist">
			<script type="text/javascript">
				$(document).ready(function(){
					$(".usrLink").click(function () {
						var link_id = $(this).attr("id");
						var link_name = $(this).attr("name");

						sendInfo(link_id,link_name);
					});
					function sendInfo(link_id,link_name){
						$.ajax ({
							url: "php/managePages.php",
							type:"POST",
							data:{ page_id:link_id, page_name:link_name},
							success: function(data){ 
								window.location.href= 'custSurvey.php';
							}
						});
					}

				});

			</script>

	        <?php 
	        
				$sHandler = new SurveyHandler; 
				$usrSurveyName = $sHandler->getSurveyNamesByUsername($usr);
				$usrSurvey_num = count($usrSurveyName);
				if ($usrSurveyName) {
					for ($n=0; $n < $usrSurvey_num; $n++) {
						$s1 = preg_replace('/\s+/', '', $usr);
						$s2 = preg_replace('/\s+/', '', $usrSurveyName[$n]);
						$id = $s1 . $s2;
						echo "<li data-icon='false'>";
						echo "<a class='usrLink' href='' id='" . $id . "' name='" . $usrSurveyName[$n] . "' data-transition='pop'>" . $usrSurveyName[$n]. "</a></li>";
						//tempSurvey.php#" . $id . "
					}
				}	
			?>
   		</ul>
	</div>
	<div data-role="footer" class="footer">
		<h7>@Copyright, Team N, SOEN 6461</h7>
	</div>
</div>


<!--User Check Report-->
<div data-role="page" id="checkReport">
	<div id="checkReportCover">
		<div data-role="header" data-position="fixed" class="header">
	    	<a href="#userhome" class="backBtn" data-corners="false" data-shadow="false" data-role="button" data-transition="pop" data-direction="reverse">Back</a>
			<h1>Check Report</h1>
		</div>
	</div>
	<div data-role="content">
		<ul data-role="listview" class="homelist">
			<li data-icon="false"><a href="report.php#report1" rel='external' data-transition="pop">User experience Survey</a></li>
	        <li data-icon="false"><a href="report.php#report2" rel='external' data-transition="pop">Perceived Usefulness and Ease of Use</a></li>
	    </ul>
	</div>
	<div data-role="footer" class="footer">
		<h7>@Copyright, Team N, SOEN 6461</h7>
	</div>
</div>

</body>
</html>
