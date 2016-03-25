<?php
session_start();

include 'api/mysql_connection.php';
include 'api/devices.php';
include 'api/users.php';

function error() {
	echo "error";
	exit();
}

function done() {
	echo "done";
	exit();
}

// For registration
$firstname = mysqli_escape_string($wt_conn, $_REQUEST['firstname']);
$lastname  = mysqli_escape_string($wt_conn, $_REQUEST['lastname']);
$username  = mysqli_escape_string($wt_conn, $_REQUEST['username']);
$email     = mysqli_escape_string($wt_conn, $_REQUEST['email']);
$password  = mysqli_escape_string($wt_conn, $_REQUEST['password']);

// For email verification
$verification_code = mysqli_escape_string($wt_conn, $_REQUEST['code']);

// For device linking
$deviceid  = mysqli_escape_string($wt_conn, $_REQUEST['deviceid']);

// Check if a user is registering
if ($firstname != null) {
	if (strcmp($lastname, "") != 0 && strcmp($username, "") != 0 && strcmp($email, "") != 0) {

		// Verify is the data is correct
		// Check if the username is valid
		if (!preg_match('/^[a-zA-Z0-9_]+$/',$username)) error();

		//Check if the email is valid
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) error();

		// Check if the username or email exists
		$usernamecheck = mysqli_query($wt_conn, "SELECT * FROM users WHERE username='$username'");
		$emailcheck    = mysqli_query($wt_conn, "SELECT * FROM users WHERE email='$email'");
		if ($usernamecheck->num_rows != 0 || $emailcheck->num_rows != 0) return;

		// Create a verification code
		$verification_code = substr(md5($username.$timeinmillis."code"), 0, 12);

		// Verification finished

		// Avoid problems with encoding
		$firstname_sql         = $wt_conn->real_escape_string($firstname);
		$lastname_sql          = $wt_conn->real_escape_string($lastname);
		$username_sql          = $wt_conn->real_escape_string($username);
		$email_sql             = $wt_conn->real_escape_string($email);
		$password_sql          = $wt_conn->real_escape_string($password);
		$verification_code_sql = $wt_conn->real_escape_string($verification_code);
		$timeinmillis = round(microtime(true) * 1000);

		// Used for testing
		/*echo "Firstname: ".$firstname."\n".
			 "    SQL: ".$firstname_sql
		     ."\n".
		     "Lastname: ".$lastname."\n".
		     "    SQL: ".$lastname_sql
		     ."\n".
		     "User name: ".$username."\n".
		     "    SQL: ".$username_sql
		     ."\n".
		     "Email: ".$email."\n".
		     "    SQL: ".$email_sql
		     ."\n".
		     "Password: ".$password."\n".
		     "    SQL: ".$password_sql
		     ."\n".
		     "Verification code: ".$verification_code."\n".
		     "    SQL: ".$verification_code_sql
		     ."\n".
		     "Time: ".$timeinmillis
		     ."\n";*/

		// Save data into the database
		$query = "INSERT INTO users (firstname, lastname, username, email, password, date_registered, email_verification_code) VALUES ('$firstname_sql', '$lastname_sql', '$username_sql', '$email_sql', '$password_sql', '$timeinmillis', '$verification_code_sql')";
		mysqli_query($wt_conn, $query);
		//if (!mysqli_query($wt_conn, $query)) error();

		// Send the verification code
		$to      = $_REQUEST['email'];
		$subject = 'WAMOD Themes - Verify your email';
		$message = 'http://wamod.ml/register.php?code=' . $verification_code;
		$headers = 'From: noreply@wamod.ml' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		mail($to, $subject, $message, $headers);

		done();
	} else error();
} 

// Check if a user is validating his email
else if ($verification_code != null) {

	// Login //
	$user = mysqli_query($wt_conn, "SELECT * FROM users WHERE email_verification_code='$verification_code'");
	$user = mysqli_fetch_array($user);
	$_SESSION["username"] = $user['username'];
	$_SESSION["moderator"] = $user['moderator'];
	$_SESSION["id"] = $user['id'];

	// Activate the account and show the 3rd step
	$query = "UPDATE users SET email_verification_code='' WHERE email_verification_code='$verification_code'";
	if (mysqli_query($wt_conn, $query)) include('register_3rdstep.php');
	else error();

}

else if ($deviceid != null) {
	// Check if device exists

	if (!checkIfDeviceExists($deviceid)) {
		$data["status"] = "invalid";
		echo json_encode($data);
		exit();
	}

	$userid = getUserID($_SESSION["username"]);

	$linkeduserid = getLinkedUserID($deviceid);
	if (strcmp($linkeduserid, $userid) == 0) {
		$data["status"] = "alreadylinkedtoyou";
		echo json_encode($data);
		exit();
	} else if (strcmp($linkeduserid, "") != 0) {
		$data["status"] = "alreadylinked";
		echo json_encode($data);
		exit();
	}

	$sql = "UPDATE devices SET userid='$userid' WHERE deviceid='$deviceid'";

	$result = mysqli_query($wt_conn, $sql);

	if ($result) {
		$data["status"] = "done";
		echo json_encode($data);
		exit();
	} else {
		$data["status"] = "error";
		echo json_encode($data);
		exit();
	}
}

// Load the registration form
else {
	include('register.html');
}
?>
