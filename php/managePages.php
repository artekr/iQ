
<?php


if( $_POST["page_id"] && $_POST["page_name"])
{
	$page_id = $_POST['page_id'];
	$page_name = $_POST['page_name'];
}
echo $_POST["page_id"];

session_start();

$_SESSION['page_id'] = $page_id;
$_SESSION['page_name'] = $page_name;


?>
