<html>
	<?php session_start();
		$u=	$_SESSION['username'];
		require_once('connect.php');
	?>
	<head>
		<title>pesConnect</title>
		<link rel="icon" href="favicon.png" sizes="16x16" type="image/png">
		<script type="text/javascript">
		function tweet()
		{
			var s= document.getElementById("tweet").value;
			<?php 
			$qry1="INSERT INTO tweet(uid,) VALUES ('$username','$password')";
			mysqli_query($bd,$qry1);  ?>
		}
		</script>
		<style>
		#fol {
		position: fixed;
		bottom:325px;
		} 
		#tweet
		{
			position: fixed;
			top:200px;
			left:650px;
			border:solid;
		}
		#h
		{
			position: fixed;
			top:130px;
			left:650px
		}
		textarea { font-size: 18px; }
		#b
		{
			position: fixed;
			bottom:400px;
			left:655px
		}
		</style>
	</head>
	
	<body bgcolor="rgb(14,35,45)">
		<h1 style="color:orange" align="center">Welcome To PesConnect</h1>
		</br>
		<h1 style="color:blue;font-size:50px" align="left">@<?php echo $u; ?></h1>
		<img align="left" src="profilepicture.png" alt="profile picture" style="width:304px;height:304px;">
		<h1 align="bottom-left" style="color:green" id="fol">Followers : <?php
		$qry="SELECT count(uid) FROM userlogin u,Followers f WHERE u.username='$u' and u.uid=f.uid";
		$result=mysqli_query($bd,$qry);
		echo  $result;
		?>
	    </h1>
		<h1 style="color:green"  id="h" align="center">Enter your tweet here</h1>
		<textarea id="tweet" align="left" rows="13" cols="60"  placeholder="Tweet here:)"></textarea>
		<input id="b" type="button" value="post" onclick="tweet()" style="height:20px; width:75px">
	</body>
	
</html>