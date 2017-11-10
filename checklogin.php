<?php
	session_start();
	include 'connect.php';
	$username = $_POST['username'];
	$password = $_POST['password'];

	$username = stripslashes($username);
	$password = stripcslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$count = mysql_num_rows($result);
	if($count != 0){
		$_SESSION['fullName'] = $row['fullName'];
		$_SESSION['username'] = $username;
		header("location: BTL.php");
	}
	else{
		header("location: login.php");
	}
?>