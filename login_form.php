<!DOCTYPE html>
<html>
	<head>
		<title>Login - WAMOD Themes</title>
		<link rel="stylesheet" type="text/css" href="styles/reset.css" />
		<link rel="stylesheet" type="text/css" href="styles/styles.css" />
		<meta charset="UTF-8" />
	</head>
	<body>
		<?php include('header.php'); ?>
		<div class="wrapper">
			<div id="login_container" style="text-align:center;">
				<span id="title">Login</span>
				<form id="login_form" action="login.php#login_send">
					<input id="username" placeholder="E-mail or username" />
					<input id="password" type="password" placeholder="Password" />
					<a class="button login" href="#" onclick="login(); return false;" id="login_send" style="margin-top:10px; margin-bottom:0px;"><img src="images/loading.gif" />Login</a>
					<span id="message" style="color:#D32F2F; display:block; opacity:0; height:14px; margin-top:6px;">test</span>
				</form>
			</div>
		</div>
		<script src="scripts/login.js"></script>
		<script src="scripts/md5.js"></script>
	</body>
</html>
