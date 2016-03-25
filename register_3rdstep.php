<?php 
session_start();

if ($_SESSION["id"] == null) {
	header("Location: http://wamod.ml/login.php");
	die();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Register - WAMOD Themes</title>
		<link rel="stylesheet" type="text/css" href="styles/reset.css" />
		<link rel="stylesheet" type="text/css" href="styles/styles.css" />
		<link rel="stylesheet" type="text/css" href="styles/register.css" />
		<meta charset="UTF-8" />
	</head>
	<body>
		<?php include('header.php'); ?>
		<div class="wrapper">
			<div id="steps_container">
				<div id="step_1" class="step">
					<span class="number">1</span>
					<span class="description">Your basic info</span>
				</div>
				<div id="step_2" class="step">
					<span class="number">2</span>
					<span class="description">Verify your account</span>
				</div>
				<div id="step_3" class="step active">
					<span class="number">3</span>
					<span class="description">Link your device</span>
				</div>
			</div>
			<div id="pages_container">
				<div id="page_3" class="page">
					<span class="title">Link your device</span>
					<div style="text-align:center; font-size:12px; line-height: 16px; padding:0 20px;">
						We need your device ID to connect to your device. Go to WAMOD Settings -> Device ID.
						<br />
						<img src="images/deviceid.png" width="500px" height="250px" style="margin:15px 0;" />
						<br />
						After checking it, insert your identifier here:
						<br />
						<div style="position:relative; display:inline-block; margin-top:10px;">
							<input id="idinput" type="text" style="font-size:24px; height:30px; margin-top:15px; text-align:center; margin-bottom:10px;" maxlength="6" />
							<img src="images/loading_505050.gif" style="position:absolute; top:22px; right:-25px; display:none;" id="spinner" />
						</div>
						<span id="message" style="color:#D32F2F; display:block; opacity:0; height:14px;">test</span>
					</div>
				</div>
		</div>
		<script src="scripts/script.js"></script>
		<script src="scripts/md5.js"></script>
		<script src="scripts/register_3rdstep.js"></script>
	</body>
</html>
