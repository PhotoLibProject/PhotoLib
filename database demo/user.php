<?php
$userTablename = 'user';

function checkUser($db, $username, $password) {
	global $userTablename;
	return mysqli_query($db, "select * from $userTablename where username='$username' and password='$password'");
}

function insertUser() {

}

function deleteUser($db, $key) {
	global $userTablename;
	return mysqli_query($db, "delete from $userTablename where userId='$key'");
}

?>