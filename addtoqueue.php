<?php
$servername = "127.0.0.1";
$username = "root";
$password = "mysql123";
$dbname = "wamod_themes";

$conn = new mysqli($servername, $username, $password, $dbname);

$mac = $_REQUEST['mac'];
$themeid = $_REQUEST['themeid'];

$sql = "INSERT INTO queue (mac, themeid) VALUES ('$mac', '$themeid')";

if (mysqli_query($conn, $sql)) {
	echo 'done';
} else {
	$result = mysqli_query($conn, "SELECT * FROM queue WHERE mac='$mac'");
	$row = mysqli_fetch_array($result);
	mysqli_query($conn, "DELETE FROM queue WHERE mac='$mac'");
	mysqli_query($conn, "INSERT INTO queue (mac, themeid) VALUES ('$mac', '$themeid')");
	echo 'done';
}
?>
