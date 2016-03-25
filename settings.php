<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("Location: login.php");
	die();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Settings - WAMOD Themes</title>
		<link rel="stylesheet" type="text/css" href="styles/reset.css" />
		<link rel="stylesheet" type="text/css" href="styles/styles.css" />
		<link rel="stylesheet" type="text/css" href="styles/settings.css" />
		<?php include 'load_devices.php'; ?>
		<meta charset="UTF-8" />
	</head>
	<body>
		<?php include('header.php'); ?>
		<?php include('modules/dialog/module.php'); ?>
		<?php include('modules/toast/module.php'); ?>
		<div class="wrapper">
			
			<h1 class="pagetitle">Settings</h1>
			<div id="settings">
				<nav id="settings_nav">
					<span data-page="personal-info">Personal info.</span>
					<span data-page="devices" class="active">My devices</span>
					<span data-page="change-password">Change password</span>
				</nav>
				<div id="settings_pages">
					<div id="settings_page_1" data-page="personal-info">
						<!--First name <input class="input" placeholder="First name" />
						<br />
						Last name <input class="input" placeholder="Last name" />
						<br />
						Username <input class="input" placeholder="Username" readonly value="brianvalente" />
						</div>-->
					</div>
					<div id="settings_page_2" class="active" data-page="devices">
						<h2>My devices</h2>
						<div id="devices_container"><span style="display:inline-block; padding-left:20px;">You have no devices :(</span></div>
						<span id="devices_addnew">Add a new device</span>
					</div>
					<div id="settings_page_3" data-page="change-password">
						Change password page
					</div>
				</div>
			</div>
		</div>
		<script src="scripts/settings.js"></script>
	</body>
</html>
