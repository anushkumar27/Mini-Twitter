<?php
	// This php is for selecting data from the server
	//Include database connection details
	require_once('connect.php');
	//Sanitize the POST values
	$query = $_POST['q'];
	$a=mysqli_query($bd,$query);
	//echo $a;
	//echo('[');
	//Output data of each row
	while ($row = mysqli_fetch_assoc($a)) {
		//print_r(json_encode($row).",");
		echo $row['tags'] . "$";
		//print_r($row);
	}
	//echo("{}]");
	exit();
 ?>
