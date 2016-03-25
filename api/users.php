<?php
function getUserID($username) {
	global $wt_conn;

	$sql = "SELECT id FROM users WHERE username='$username'";
	$result = mysqli_fetch_array(mysqli_query($wt_conn, $sql));

	return $result["id"];
}
?>
