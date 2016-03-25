<?php
// Send the verification code

error_reporting(E_ALL);
ini_set('display_errors', 1);
		
$to = 'electrocrookers@gmail.com';
$subject = 'WAMOD Themes - Verify your email';
$message = 'hello';

$headers = 'From: noreply@wamod.ml' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
$result = mail($to, $subject, $message, $headers);
?>