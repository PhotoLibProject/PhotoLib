<?php
$photoTablename = 'photo';

function selectOnePhoto() {

}

function selectPhotoByFolder($db, $folderId) {
	global $photoTablename;
	return mysqli_query($db, "select * from $photoTablename where folderId='$folderId'");
}

function insertPhoto() {

}

function deletePhoto() {

}

?>