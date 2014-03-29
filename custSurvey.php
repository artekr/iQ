<!DOCTYPE html> 
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0;"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<title>Survey Template</title>
<link href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" rel="stylesheet" type="text/css"/>
<script src="http://code.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js" type="text/javascript"></script>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/jquery.touchSlider.js"></script>


<?php
	session_start();

	include 'php/questionHandler.php';
	include 'php/surveyHandler.php';

	$sHandler = new SurveyHandler; 
	
	$sHandler->setSurveyLinkID($_SESSION['page_id']);
	$sHandler->setSurveyLinkName($_SESSION['page_name']);

	$usrSurveyId   = $sHandler->getSurveyLinkID();
	$usrSurveyName = $sHandler->getSurveyLinkName();

?>

<script type="text/javascript">
$(document).ready(function(){

	var usrSurveyName = <?php echo json_encode($usrSurveyName); ?>;
	var usrSurveyId  = <?php echo json_encode($usrSurveyId); ?>;

	$('#gallery'+usrSurveyId).touchSlider({
		mode: 'index',
		prevLink: 'a.prev',
		nextLink: 'a.next',
		onChange: function(prev, curr) {
			$('#counter'+usrSurveyId).html((curr+1)+'/'+ $('#gallery'+usrSurveyId).get(0).getCount());
		},
		onStart: function(){
			$('#counter'+usrSurveyId).html('1/' + $('#gallery'+usrSurveyId).get(0).getCount());
		}
	});
	
});
</script>

</head> 
<body> 


<!--Template-->
<?php echo "<div data-role='page' name='tempSurvey' id='". $usrSurveyId ."'>"; ?>
			<div data-role='header' data-position='fixed' class='header'>
	    			<a href='user.php#checkSurvey' rel='external' class='backBtn' data-corners='false' data-shadow='false' data-role='button' data-transition='pop' data-direction='reverse'>Back</a>
	    		
	    	<?php	echo "<h1>" . $usrSurveyName . "</h1>"; ?>
	    		<a  href='#confirmDia' class='ui-btn-right' data-role='button' data-transition='pop' data-rel='popup' data-corners='false' data-shadow='false' style='background:#c0362c;'>Publish</a>
				</div>
				<div data-role='popup' id='confirmDia' style='width:250px;color:black;background:rgba(255,255,255,0.9);text-align:center;margin-top:30%;margin-right:18px;'> 
					<div data-role='header' style='background: rgba(51,51,51,0.8);'>	
						<h1>Confirm</h1>
					</div>
					<div data-role='content'>
						<h3 style='margin-bottom:10%;'>Confirm publish ?</h3>
						<a id='confirmBtn' href='' rel='external' data-role='button' data-inline='true' data-corners='false' data-mini='true' data-shadow='false' style='width:65px;margin-right:25px;'>Yes</a>
						<a id='cancelBtn' data-role='button' data-rel='back' data-inline='true' data-corners='false' data-mini='true' data-shadow='false' style='margin-left:25px;'>Cancel</a>
					</div>
				</div>
				<script type="text/javascript">
					$(document).ready(function(){
						$("#confirmBtn").click(function () {
							var survey_name = <?php echo json_encode($usrSurveyName); ?>;
							sendInfo(survey_name);
						});
						function sendInfo(survey_name){
							$.ajax ({
								url: "php/publishSurvey.php",
								type:"POST",
								data:{ pubSurvey_name: survey_name},
								success: function(data){
									window.location.href= 'user.php';
								}
							});
						}

					});
				</script>

				<div data-role='content' class='survey' >
					<form action='' method='post' id='' data-ajax='false'>
						<div >
							<?php echo "<h3 style='text-align:center;text-shadow:none;color:black'>" . $usrSurveyName . "</h3>"; ?>
						</div>
					<div class='gallery_holder'>
<?php					
					echo "<div class='gallery' name='tempSurvey'  id='gallery" . $usrSurveyId . "'>
							<div class='holder'>
								<div class='list'>";
									$qHandler = new QuestionHandler;
									if($qHandler->getQuestionsBySurveyName($usrSurveyName)){
										$descriptions = $qHandler->getDescription();
										$options = $qHandler->getAnswers();
										$des_num = count($descriptions);

										for($n = 0; $n < $des_num; $n++)
										{
											echo "<div class='item'>
													<div class='question_box'>
														<div class='description'>";
													echo "<h3>" . $descriptions[$n] . "</h3>";
													echo "</div>
													<div class='option'>
														<fieldset data-role='controlgroup' data-mini='true'>
											    			<ul data-role='listview' data-inset='true' class='option'>";
												     			
												     			$opt_items = explode(",", $options[$n]);
												     			$item_num = count($opt_items);
												     			$radio_id = uniqid();
												     			for($m = 0; $m < $item_num; $m++)
																{	
																	$opt_id = uniqid();
																	echo "<li>
												     						<input type='radio' name='radio" . $radio_id . "' id=" . $opt_id . " data-role='none'/>";
												     				echo 	"<label for=" . $opt_id . ">" . $opt_items[$m] . "</label>";
																	echo "</li>";
																}

												    echo "</ul>
														</fieldset>
													</div>
													</div>
												</div>";
										}

									

									echo "</div> <!--end list-->
									</div> <!--end holder-->
									<div data-role='fieldcontain' class='direction' >
										<a  href='#' class='prev' data-role='none' data-transition='slide' data-inline='true' data-corners='false' data-shadow='false'></a>
										<a  href='#' class='next' data-role='none' data-transition='slide' data-inline='true' data-corners='false' data-shadow='false'></a>
										<span class='counter' name='tempSurvey' id='counter" . $usrSurveyId . "'></span>
									</div>
								</div> <!--end gallery-->
							</div> <!--end gallery_holder-->
							</form> <!--end form-->
						</div>

						<div data-role='footer' class='footer'>
							<h7>@Copyright, Team N, SOEN 6461</h7>
						</div>
					</div>";
					
									} else {
										echo "
											<div data-role='popup' id='popupBasic'>
												<div data-role='header' style='background: rgba(51,51,51,0.8);''>	
													<h1>Oooups!</h1>
												</div>
												<div data-role='content'>
													<h3 style='margin-bottom:10%;''>No question in this survey!</h3>
													<a id='confirmBtn' href='user.php#checkSurvey' rel='external' data-role='button' data-corners='false' data-mini='true' data-shadow='false' style='width:65px;margin-left:auto;margin-right:auto;'>OK</a>
												</div>
											</div>
											<script> $(document).on({ 
													'pageshow': function () {
					    							$('#popupBasic').popup('open');
													}
												}, '#" . $usrSurveyId . "'); 
											</script>";

									}

?>

</body>
</html>




