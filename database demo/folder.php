<?php
$folderTablename = 'folder';

function insertFolder($db, $id, $name) {
	global $folderTablename;
	return mysqli_query($db, "insert into $folderTablename (folderId, folderName) values ('$id', '$name') ");
}

function deleteFolder($db, $key) {
	global $folderTablename;
	return mysqli_query($db, "delete from $folderTablename where folderId='$key'");
}

?>