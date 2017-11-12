<?php
	session_start();
	if(isset($_SESSION['fullName']) && isset($_SESSION['username']) && isset($_SESSION['userId'])){
		unset($_SESSION['fullName']);
		unset($_SESSION['username']);
		unset($_SESSION['userId']);
	}
	header("location: ../btl.php");
?>