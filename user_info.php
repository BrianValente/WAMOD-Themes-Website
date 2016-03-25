<?php
include 'api/mysql_connection.php';

if ($_SESSION["id"] != null) {
	$id = $_SESSION["id"];
	$sql = "SELECT * FROM users WHERE id='$id'";
	$user = mysqli_fetch_array(mysqli_query($wt_conn, $sql));
	unset($user["password"]);
	unset($user["id"]);
	$user = json_encode($user);
	echo "<script>var user = JSON.parse('$user');</script>";
} else {
	echo "<script>var user = '';</script>";
}
?>