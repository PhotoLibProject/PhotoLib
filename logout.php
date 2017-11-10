<?php
	session_start();
	if(isset($_SESSION['fullName']) && isset($_SESSION['username'])){
		unset($_SESSION['fullName']);
		unset($_SESSION['username']);
	}
	header("location: btl.php");
?>