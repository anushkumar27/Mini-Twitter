<?php
	//Include database connection details
	require_once('connect.php');
	session_start();
	//Array to store validation errors
	$errmsg_arr = array();
 
	//Validation error flag
	$errflag = false;
 
	//Sanitize the POST values
	$username = $_POST['username'];
	$password = $_POST['password'];
 
	//Input Validations
	if($username == '') {
		$errmsg_arr[] = 'Username missing';
		echo ("<script>
					alert('username missing');
				</script>");
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		echo ("<script>
					alert('password missing');
				</script>");
		$errflag = true;
	}
 
	//Create query
	$qry="SELECT * FROM userlogin WHERE username='$username' AND password='$password'";
	$result=mysqli_query($bd,$qry);
 
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			$member = mysqli_fetch_assoc($result);
			$_SESSION['username'] = $username; 
			
			header("location: dashboard.php");
			exit();
		}else {
			//Login failed
			$errmsg_arr[] = 'user name and password not found';
			$errflag = true;
			if($errflag) {
				header("location: index.html");
				exit();
			}
		}
	}else {
		die("Query failed");
	}
?>
