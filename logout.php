<?php
$cookieParams = session_get_cookie_params();
setcookie(session_name(), '', 0, $cookieParams['path'], $cookieParams['domain'], $cookieParams['secure'], $cookieParams['httponly']);
$_SESSION = array();
session_destroy();

header("Location: index.php");
die();
?>