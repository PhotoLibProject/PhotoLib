<?php
	include 'connect.php';
	$username = $_POST['username'];
	$password = $_POST['password'];

	$username = stripslashes($username);
	$password = stripcslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	$sql = "SELECT * FROM user WHERE username = '$username' AND password ='$password'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_assoc($result)){
		$mid = $row['userid']; 
	}
	$count = mysql_num_rows($result);
	if($count == 1){
		header("location: BTL.php?id=$mid");
	}
	else{
		header("location: login.php");
	}
?>