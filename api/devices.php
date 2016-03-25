<?php
function getNewDeviceID($androidversion, $devicemodel, $wamodversion) {
	global $wt_conn;

	$currentmillis = round(microtime(true) * 1000);
	$deviceid = substr(md5($devicemodel.$currentmillis."code"), 0, 6);

	$sql = "INSERT INTO devices (deviceid, androidversion, model, wamodversion, date_added) VALUES ('$deviceid', '$androidversion', '$devicemodel', '$wamodversion', '$currentmillis')";
	if (mysqli_query($wt_conn, $sql)) return $deviceid;
	else return "";
}

function getLastID() {
	global $wt_conn;

	$sql = "SELECT id FROM devices ORDER BY id DESC LIMIT 1";
	$last = mysqli_fetch_array(mysqli_query($wt_conn, $sql));

	return $last["id"];
}

function checkIfDeviceExists($deviceid) {
	global $wt_conn;

	$result = mysqli_query($wt_conn, "SELECT deviceid FROM devices WHERE deviceid='$deviceid' LIMIT 1");
	if (mysqli_num_rows($result) == 0) return false;
	else return true;
}

function getLinkedUserID($deviceid) {
	global $wt_conn;

	$result = mysqli_fetch_array(mysqli_query($wt_conn, "SELECT userid FROM devices WHERE deviceid='$deviceid'"));
	return $result["userid"];
}

function unlinkDevice($deviceid) {
	global $wt_conn;

	if (checkIfDeviceExists($deviceid)) {
		$sql = "UPDATE devices SET userid=NULL WHERE deviceid='$deviceid'";
		$result = mysqli_query($wt_conn, $sql);
		if ($result) $data["status"] = "done";
		else $data["status"] = "error";
		return json_encode($data);
	}
}

function changeAlias($deviceid, $alias) {
	global $wt_conn;

	if (checkIfDeviceExists($deviceid)) {
		$alias = mysqli_real_escape_string($wt_conn, $alias);
		if (strcmp($alias, "") == 0) $sql = "UPDATE devices SET alias=NULL WHERE deviceid='$deviceid'";
		else $sql = "UPDATE devices SET alias='$alias' WHERE deviceid='$deviceid'";
		$result = mysqli_query($wt_conn, $sql);
		if ($result) $data["status"] = "done";
		else $data["status"] = "error";
		return json_encode($data);
	}
}

function getUserDevice($userID) {
	global $wt_conn;

	$sql = "SELECT * FROM devices WHERE userid='$userID'";
	$query = mysqli_query($wt_conn, $sql);

	for ($i = 0; $i < $query->num_rows; $i++) {
		$userDevice = mysqli_fetch_array($query);
		$device[$i] = (object) array(
								 'deviceid'                                     => $userDevice['deviceid'],
								 'alias'                                        => $userDevice['alias'],
								 'devicemodel'                                  => $userDevice['model'],
								 'androidversion'                               => $userDevice['androidversion'],
								 'wamodversion'                                 => $userDevice['wamodversion'],
								 'general_statusbarcolor'                       => $userDevice['general_statusbarcolor'],
								 'general_toolbarcolor'                         => $userDevice['general_toolbarcolor'],
								 'general_toolbarforeground'                    => $userDevice['general_toolbarforeground'],
								 'general_navbarcolor'                          => $userDevice['general_navbarcolor'],
								 'general_darkmode'                             => $userDevice['general_darkmode'],
								 'general_darkstatusbaricons'                   => $userDevice['general_darkstatusbaricons'],
								 'home_theme'                                   => $userDevice['home_theme'],
								 'conversation_hideprofilephoto'                => $userDevice['conversation_hideprofilephoto'],
								 'conversation_hidetoolbarattach'               => $userDevice['conversation_hidetoolbarattach'],
								 'conversation_proximitysensor'                 => $userDevice['conversation_proximitysensor'],
								 'conversation_rightbubblecolor'                => $userDevice['conversation_rightbubblecolor'],
								 'conversation_rightbubbletextcolor'            => $userDevice['conversation_rightbubbletextcolor'],
								 'conversation_rightbubbledatecolor'            => $userDevice['conversation_rightbubbledatecolor'],
								 'conversation_leftbubblecolor'                 => $userDevice['conversation_leftbubblecolor'],
								 'conversation_leftbubbletextcolor'             => $userDevice['conversation_leftbubbletextcolor'],
								 'conversation_leftbubbledatecolor'             => $userDevice['conversation_leftbubbledatecolor'],
								 'conversation_customparticipantcolorbool'      => $userDevice['conversation_customparticipantcolorbool'],
								 'conversation_customparticipantcolor'          => $userDevice['conversation_customparticipantcolor'],
								 'conversation_style_bubble'                    => $userDevice['conversation_style_bubble'],
								 'conversation_style_tick'                      => $userDevice['conversation_style_tick'],
								 'conversation_theme'                           => $userDevice['conversation_theme'],
								 'privacy_freezelastseen'                       => $userDevice['privacy_freezelastseen'],
								 'privacy_no2ndTick'                            => $userDevice['privacy_no2ndTick'],
								 'privacy_noBlueTick'                           => $userDevice['privacy_noBlueTick'],
								 'privacy_hideTyping'                           => $userDevice['privacy_hideTyping'],
								 'privacy_alwaysOnline'                         => $userDevice['privacy_alwaysOnline'],
								 'theme_wamod_conversation_entry_bgcolor'       => $userDevice['theme_wamod_conversation_entry_bgcolor'],
								 'theme_wamod_conversation_entry_entrybgcolor'  => $userDevice['theme_wamod_conversation_entry_entrybgcolor'],
								 'theme_wamod_conversation_entry_hinttextcolor' => $userDevice['theme_wamod_conversation_entry_hinttextcolor'],
								 'theme_wamod_conversation_entry_textcolor'     => $userDevice['theme_wamod_conversation_entry_textcolor'],
								 'theme_wamod_conversation_entry_emojibtncolor' => $userDevice['theme_wamod_conversation_entry_emojibtncolor'],
								 'theme_wamod_conversation_entry_btncolor'      => $userDevice['theme_wamod_conversation_entry_btncolor'],
								 'theme_wamod_conversation_entry_sendbtncolor'  => $userDevice['theme_wamod_conversation_entry_sendbtncolor'],
								 'theme_hangouts_conversation_entry_bgcolor'    => $userDevice['theme_hangouts_conversation_entry_bgcolor'],
								 'theme_hangouts_conversation_entry_hintcolor'  => $userDevice['theme_hangouts_conversation_entry_hintcolor'],
								 'theme_hangouts_conversation_entry_textcolor'  => $userDevice['theme_hangouts_conversation_entry_textcolor'],
								 'theme_hangouts_conversation_attach_color'     => $userDevice['theme_hangouts_conversation_attach_color'],
								 'theme_hangouts_conversation_mic_bg'           => $userDevice['theme_hangouts_conversation_mic_bg'],
								 'theme_hangouts_conversation_mic_color'        => $userDevice['theme_hangouts_conversation_mic_color'],
								 'theme_hangouts_conversation_send_bg'          => $userDevice['theme_hangouts_conversation_send_bg'],
								 'theme_hangouts_conversation_send_color'       => $userDevice['theme_hangouts_conversation_send_color'],
								 'overview_cardcolor'                           => $userDevice['overview_cardcolor'],
								 'overview_multiplechats'                       => $userDevice['overview_multiplechats'],
								 'conversation_style_entry'                     => $userDevice['conversation_style_entry'],
								 'conversation_style_bubble_layout'             => $userDevice['conversation_style_bubble_layout'],
								 'conversation_custombackcolorbool'             => $userDevice['conversation_custombackcolorbool'],
								 'conversation_custombackcolor'                 => $userDevice['conversation_custombackcolor'],
								 'conversation_style_toolbar'                   => $userDevice['conversation_style_toolbar'],
								 'conversation_toolbarexit'                     => $userDevice['conversation_toolbarexit']);
	}
	return $device;
}
?>
