<?php
function getLatestVersionCodename() {
	return "BETA 8";
}

function getLatestVersionDescription() {
	return "Description";
}

function getLatestVersionDownloadLink() {
	return "http://wamod.ml/";
}

function getLatestVersion() {
	global $wt_conn;

	$sql = "SELECT * FROM releases ORDER BY id DESC";
	$result = mysqli_query($wt_conn, $sql);

	$update = mysqli_fetch_array($result);
	return $update;
}
?>
