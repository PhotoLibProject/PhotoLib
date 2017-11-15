<?php
$commentTablename = 'comment';

function selectCommentByPhoto($db, $photoId) {
	global $commentTablename;
	return mysqli_query($db, "select content from $commentTablename where photoId='$photoId'");
}

function insertComment($db, $photoId, $userId) {
	global $commentTablename;
	return mysqli_query($db, "insert into $comentTablename (photoId, userId, content) values ('$photoId', '$userId', '$content')");
}

function deleteComment($db, $key) {
	global $commentTablename;
	return mysqli_query($db, "delete from $commentTablename where commentId='$key'");
}

?>