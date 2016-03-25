<?php
function installTheme($deviceid, $themeid) {
	global $wt_conn;

	$sql = "INSERT INTO queue (deviceid, themeid) VALUES ('$deviceid', '$themeid')";
	$result = mysqli_query($wt_conn, $sql);

	if ($result) $data["status"] = "done";
	else $data["status"] = "error";
	return json_encode($data);
}
?>
