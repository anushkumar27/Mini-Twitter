<?php
	//error_reporting(E_ERROR);
	// This php is for selecting data from the server
	//Include database connection details
	require_once('connect.php');
	//Sanitize the POST values
	$query = $_POST['q'];

	//$query = "SELECT `tag_id` FROM `hashtags` WHERE `tags`='#PES'";
	//echo $query;
	$a=mysqli_query($bd,$query);
	//echo "mysqli_query : " . $a;
	$res = mysqli_fetch_assoc($a);
		echo($res['tag_id']);
	exit();
 ?>
