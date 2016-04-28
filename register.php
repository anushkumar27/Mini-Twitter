<?php
	//Include database connection details
	require_once('connect.php');
	//Sanitize the POST values
	
	$username = $_POST['rusername'];
	$password = $_POST['rpassword'];
	$alluservalues="SELECT * FROM userlogin Where username='$username' ";
	$a=mysqli_query($bd,$alluservalues);
	//echo $a;
	if($a)
	{
		if(mysqli_num_rows($a) == 0)
		{
			//Create query
			$qry1="INSERT INTO userlogin(username,password) VALUES ('$username','$password')";
			mysqli_query($bd,$qry1);
			header("location: index.html");
		}
		else
		{
			echo("<script> alert('this username already exists')</script>");
			header("location: register1.php");
		}
	}
	exit();
 ?>
