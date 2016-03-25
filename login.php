<?php
session_start();
if (isset($_SESSION['username'])) {
	header("Location: index.php");
	die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$servername = "127.0.0.1";
	$username = "root";
	$password = "mysql123";
	$dbname = "wamod_themes";

	$conn = new mysqli($servername, $username, $password, $dbname);

	$username = mysqli_escape_string($conn, $_REQUEST['username']);
	$password = mysqli_escape_string($conn, $_REQUEST['password']);

	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$username' AND password = '$password'");

	$rows = mysqli_num_rows($result);

	if ($rows == 1) {
		$user = mysqli_fetch_array($result);
		$_SESSION["username"] = $user['username'];
		$_SESSION["moderator"] = $user['moderator'];
		$_SESSION["id"] = $user['id'];
		$data["status"] = "done";
	} else {
		$data["status"] = "error";
	}
	
	echo json_encode($data);
} else {
	include('login_form.php');
}
?>
