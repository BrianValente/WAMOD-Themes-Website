<!DOCTYPE html>
<html>
	<head>
		<title>WAMOD Download</title>
		<style>
		html,
		body {
			width:100%;
			height:100%;
			margin:0;
			padding:0;
		}
		span {
			font-size: 72px;
			color:black;
			display:block;
			margin:auto;
			top:50%;
			left:50%;
			-webkit-transform:translateX(-50%) translateY(-50%);
			-moz-transform:translateX(-50%) translateY(-50%);
			transform:translateX(-50%) translateY(-50%);
			position: absolute;
			width:100%;
			text-align: center;
		}
		</style>
	</head>
	<body>
<?php
$servername = "localhost";
$username = "root";
$password = "mysql123";
$dbname = "wamod_themes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$result = mysqli_query($conn, "SELECT * FROM releases ORDER BY id DESC LIMIT 1");
$row = mysqli_fetch_array($result);
$link = $row["link"];
$version = $row["version"];
echo '<span>'.$version.' download is starting</span>';
echo '<script>window.location = "'.$link.'";</script>';
?>
	</body>
</html>