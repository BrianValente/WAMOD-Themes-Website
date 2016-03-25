<?php
include 'api/mysql_connection.php';
include 'api/devices.php';

if ($_SESSION["id"] != null) {
	$device = getUserDevice($_SESSION["id"]);
	$device = json_encode($device);

	echo "<script>var devices = $device;</script>";
} else {
	echo "<script>var devices = '';</script>";
}

?>

<script>
function getDeviceByID(deviceid) {
	for (var i=0; i<devices.length;i++) {
		if (devices[i].deviceid == deviceid) return devices[i];
	}
}

function getDeviceArrayByID(deviceid) {
	for (var i=0; i<devices.length;i++) {
		if (devices[i].deviceid == deviceid) return i;
	}
}
</script>