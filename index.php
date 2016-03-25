<?php
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "mysql123";
$dbname = "wamod_themes";

$conn = new mysqli($servername, $username, $password, $dbname);

//echo json_encode(mysqli_fetch_array($devices));
//echo $devices;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>WAMOD Themes</title>
		<link rel="stylesheet" type="text/css" href="styles/reset.css" />
		<link rel="stylesheet" type="text/css" href="styles/styles.css" />
		
		<meta charset="UTF-8" />
		<?php
		include 'load_devices.php';
		include 'user_info.php';
		?>
	</head>
	<body>
		<?php include('header.php'); ?>
		<?php include('modules/install/module.php'); ?>
		<div class="wrapper home">
			<?php
			$result = mysqli_query($conn, "SELECT * FROM themes ORDER BY date DESC");

			while ($row = mysqli_fetch_assoc($result)) {
				$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id='".$row['theme_creatorid']."'"));
				echo '<div class="themecard">';
			    echo '<img class="themecard_photo" src="http://wamod.ml/images/themes/'.$row['id'].'.png" />';
			    echo '<span class="themecard_name">'.$row['theme_name'].'</span>';
				echo '<span class="themecard_by">By <a href="#">'.$user['username'].'</a></span>';
			    echo '<span class="themecard_description">'.$row['theme_description'].'</span>';
			    echo '<div class="themecard_installcontainer">';
				echo '<a class="themecard_install" href="#" onclick="install(\''.$row['id'].'\'); return false;">Install</a>';
				echo '</div>';
			    echo '</div>';
			}
			?>
		</div>
	</body>
</html>
