<!DOCTYPE html> 
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0;" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>iQ</title>
<link type="text/css" rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css"/>
<link type="text/css" rel="stylesheet" href="css/style.css"/>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js" ></script>

<script type="text/javascript" src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
</head> 
<body> 

<div data-role="page" id="home">
	<div id="homecover">
		<div data-role="header" data-position="fixed" class="header" id="homeheader">
			<h1>Welcome To iQ</h1>
			<a href="#signup" class="ui-btn-right" data-role="button" data-transition="pop" data-corners="false" data-shadow="false" data-theme="mytheme">Sign up</a>
		</div>
    </div>
	<div data-role="content">
		<ul data-role="listview" class="homelist">
			<li data-icon="false"><a href="#about" data-transition="pop">About</a></li>
			<li data-icon="false"><a href="#start" data-transition="pop">Start a survey</a></li>
            <li data-icon="false"><a href="#signin" data-transition="pop">Sign in</a></li>
            <li data-icon="false"><a href="#contact" data-transition="pop">Contact</a></li>
		</ul>		
	</div>
	<div data-role="footer" class="footer">
		<h7>@Copyright, Team N, SOEN 6461</h7>
	</div>
</div>

<div data-role="page" id="about">
	<div data-role="header" data-position="fixed" class="header">
    	<a href="#home" class="backBtn" data-corners="false" data-shadow="false" data-role="button" data-transition="pop" data-direction="reverse">Back</a>
		<h1>About</h1>
	</div>
	<div data-role="content">	
		<p>IQ system aims to help you to create your own survey online.You can send the link to your surveyee, and let them answer the survey. </p>
		<p>We provide template survey and some predefined questions, you can choose to use it if it corresponded with your actual needs so than you can save much time.</p>
		<p>The report will help you to analyze your survey.</p>
		<p>This is SOEN 6461 project of Team N, we appreciate the guidance of Dr.Pankaj Kamthan</p>
	</div>
	<div data-role="footer" class="footer">
		<h7>@Copyright, Team N, SOEN 6461</h7>
	</div>
</div>

<div data-role="page" id="signin">
	<div data-role="header" data-position="fixed" class="header">
    	<a href="#home" class="backBtn" data-corners="false" data-shadow="false" data-role="button" data-transition="pop" data-direction="reverse">Cancel</a>
		<h1>Sign in</h1>
	</div>
	<div data-role="content" class="signin">
		<div class="logo"></div>
        <p>Sign in with your iQ Account</p>	
    	<form action="php/auth.php" method="post" id="signin_form" data-ajax="false">
        	<div class="signin-form">
            	<div class="account"></div>
            	<div id="usernameDiv">
            		<input type="text" name="username" id="username" value="" placeholder="Username" data-mini="true" class="required"/>
            	</div>
            	<div id="passwordDiv">
            		<input type="password" name="password" id="password" value="" placeholder="Password" data-mini="true"/>
                </div>
               	<div id="signinBtnDiv" data-role="fieldcontain">
                	<input type="submit" name="signin_submit" id="signin_submit" value="Sign in" data-corners="false" data-shadow="false"/>
               	</div>
			</div><!-- //.singn-form -->
			<a href="#signup" data-transition="pop" id="newuser">Create an account</a>
		</form>
    </div>
	<div data-role="footer" class="footer">
		<h7>@Copyright, Team N, SOEN 6461</h7>
	</div>
</div>

<div data-role="page" id="contact">
	<div data-role="header" data-position="fixed" class="header">
    	<a href="#home" class="backBtn" data-corners="false" data-shadow="false" data-role="button" data-transition="pop" data-direction="reverse">Back</a>
		<h1>Contact</h1>
	</div>
	<div data-role="content">	
		<p>teamn@soen6461.com</p>
		<p>Welcome to contact us if you have any questions.</p>	
	</div>
	<div data-role="footer" class="footer">
		<h7>@Copyright, Team N, SOEN 6461</h7>
	</div>
</div>

<div data-role="page" id="signup">
	<div data-role="header" data-position="fixed" class="header">
    	<a href="#home" class="backBtn" data-corners="false" data-shadow="false" data-role="button" data-transition="pop" data-direction="reverse">Cancel</a>
		<h1>Sign up</h1>
	</div>
	<div data-role="content">	
		<div class="logo"></div>
		<div class="line-separator" style="margin-top:10px;border-bottom:thin solid #d1d1d1;"></div>
		<div data-role="fieldcontain">
			<form action="php/signup.php" method="post" id="signup_form" data-ajax="false">
			    <div style="margin-bottom:10px;">
			        <label for="signup_username">Username<span class="red">*</span></label>
			        <input type="text" name="signup_username" id="signup_username" value="" placeholder="Username" data-mini="true"/>
			    </div>
			    <div style="margin-bottom:10px;">
			        <label for="signup_email">Email<span class="red">*</span></label>
			        <input type="text" name="signup_email" id="signup_email" value="" data-mini="true"/>
			    </div>
			    <div>
			        <label for="signup_psw">Password <span class="red">*</span></label>
			        <input type="password" name="signup_psw" id="signup_psw" value="" data-mini="true"/>
			    </div>
			    <div data-role="fieldcontain">
					<label for="signup_conf_psw">Confirm Password <span class="red">*</span></label>
					<input type="password" name="signup_conf_psw" id="signup_conf_psw" value="" data-mini="true">
				</div>
				<div data-role="fieldcontain">
				    <input type="submit" name="signup_submit" id="signup_submit" value="Create account" data-corners="false" data-shadow="false" />
			    </div>
			</form>
		</div>
	</div>
	<div data-role="footer" class="footer">
		<h7>@Copyright, Team N, SOEN 6461</h7>
	</div>
</div>


<div data-role="page" id="start">
	<div id="startSurveyCover">
		<div data-role="header" data-position="fixed" class="header">
    		<a href="#home" class="backBtn" data-corners="false" data-shadow="false" data-role="button" data-transition="pop" data-direction="reverse">Back</a>
			<h1>Start</h1>
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
								window.location.href= 'publishedSurvey.php';
							}
						});
					}

				});

			</script>

	        <?php 
	        	include 'php/surveyHandler.php';
				$sHandler = new SurveyHandler; 
				$pubSurveyName = $sHandler->getPublishedSurveyNames();
				$pubSurvey_num = count($pubSurveyName);
				if($pubSurveyName){
					for ($n=0; $n < $pubSurvey_num; $n++) {
						$s1 = 'published';
						$s2 = preg_replace('/\s+/', '', $pubSurveyName[$n]);
						$id = $s1 . $s2;
						echo "<li data-icon='false'>";
						echo "<a class='usrLink' href='' id='" . $id . "' name='" . $pubSurveyName[$n] . "' data-transition='pop'>" . $pubSurveyName[$n]. "</a></li>";
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


</body>
</html>
