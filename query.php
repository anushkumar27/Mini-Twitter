<?php
	// This php is to insert data to DB

	//Include database connection details
	require_once('connect.php');
	//Sanitize the POST values
	$query = $_POST['q'];
	//echo $query;
	//$query = "UPDATE `tweetlikes` SET `tweet_likes`=`tweet_likes` + 1 WHERE `tweet_id` = '35'";
	$a=mysqli_query($bd,$query);
	echo $a;
	exit();
 ?>
