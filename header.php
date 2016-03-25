<div id="header">
	<div class="wrapper">
		<a href="index.php"><img class="icon" src="icon_horizontal.png"/></a>
		<nav>
			<?php
			session_start();
			//(basename($_SERVER["SCRIPT_FILENAME"], ".php") != login)
			if ($_SESSION["username"] == null) {
				echo '<a href="login.php"><span>Login</span></a>
					  <a href="register.php"><span>Register</span></a>';
			} else {
				if ($_SESSION["moderator"] == "1") echo '<a href="login.php"><span>Moderate themes</span></a>';
				echo '<a href="upload.php"><span>Theme maker</span></a>
					  <a href="profile.php?user='.$_SESSION["username"].'"><span>'.$_SESSION["username"].'</span></a>
					  <a href="settings.php"><span>Settings</span></a>
					  <a href="logout.php"><span>Log out</span></a>';
			}

			?>
		</nav>
	</div>
</div>