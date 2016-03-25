<?php
function checkin() {
	global $wt_conn;



	// Get basic device's data
	$androidversion         = mysqli_escape_string($wt_conn, $_REQUEST['androidversion']);
	$devicemodel            = mysqli_escape_string($wt_conn, $_REQUEST['devicemodel']);
	$wamodversion           = mysqli_escape_string($wt_conn, $_REQUEST['wamodversion']);
	$deviceid               = mysqli_escape_string($wt_conn, $_REQUEST['deviceid']);

	if (!isset($androidversion) || !isset($devicemodel) || !isset($wamodversion) || !isset($deviceid)) die;

	if (isset($_REQUEST['general_statusbarcolor']) && $_REQUEST['general_statusbarcolor'] !== "") {
		$themereceived = true;
		// Get sent theme
		$general_statusbarcolor                       = mysqli_escape_string($wt_conn, $_REQUEST['general_statusbarcolor']);
		$general_toolbarcolor                         = mysqli_escape_string($wt_conn, $_REQUEST['general_toolbarcolor']);
		$general_toolbarforeground                    = mysqli_escape_string($wt_conn, $_REQUEST['general_toolbarforeground']);
		$general_navbarcolor                          = mysqli_escape_string($wt_conn, $_REQUEST['general_navbarcolor']);
		$general_darkmode                             = mysqli_escape_string($wt_conn, $_REQUEST['general_darkmode']);
		$general_darkstatusbaricons                   = mysqli_escape_string($wt_conn, $_REQUEST['general_darkstatusbaricons']);
		$home_theme                                   = mysqli_escape_string($wt_conn, $_REQUEST['home_theme']);
		$conversation_hideprofilephoto                = mysqli_escape_string($wt_conn, $_REQUEST['conversation_hideprofilephoto']);
		$conversation_hidetoolbarattach               = mysqli_escape_string($wt_conn, $_REQUEST['conversation_hidetoolbarattach']);
		$conversation_proximitysensor                 = mysqli_escape_string($wt_conn, $_REQUEST['conversation_proximitysensor']);
		$conversation_rightbubblecolor                = mysqli_escape_string($wt_conn, $_REQUEST['conversation_rightbubblecolor']);
		$conversation_rightbubbletextcolor            = mysqli_escape_string($wt_conn, $_REQUEST['conversation_rightbubbletextcolor']);
		$conversation_rightbubbledatecolor            = mysqli_escape_string($wt_conn, $_REQUEST['conversation_rightbubbledatecolor']);
		$conversation_leftbubblecolor                 = mysqli_escape_string($wt_conn, $_REQUEST['conversation_leftbubblecolor']);
		$conversation_leftbubbletextcolor             = mysqli_escape_string($wt_conn, $_REQUEST['conversation_leftbubbletextcolor']);
		$conversation_leftbubbledatecolor             = mysqli_escape_string($wt_conn, $_REQUEST['conversation_leftbubbledatecolor']);
		$conversation_customparticipantcolorbool      = mysqli_escape_string($wt_conn, $_REQUEST['conversation_customparticipantcolorbool']);
		$conversation_customparticipantcolor          = mysqli_escape_string($wt_conn, $_REQUEST['conversation_customparticipantcolor']);
		$conversation_style_bubble                    = mysqli_escape_string($wt_conn, $_REQUEST['conversation_style_bubble']);
		$conversation_style_tick                      = mysqli_escape_string($wt_conn, $_REQUEST['conversation_style_tick']);
		$conversation_theme                           = mysqli_escape_string($wt_conn, $_REQUEST['conversation_theme']);
		$privacy_freezelastseen                       = mysqli_escape_string($wt_conn, $_REQUEST['privacy_freezelastseen']);
		$privacy_no2ndTick                            = mysqli_escape_string($wt_conn, $_REQUEST['privacy_no2ndTick']);
		$privacy_noBlueTick                           = mysqli_escape_string($wt_conn, $_REQUEST['privacy_noBlueTick']);
		$privacy_hideTyping                           = mysqli_escape_string($wt_conn, $_REQUEST['privacy_hideTyping']);
		$privacy_alwaysOnline                         = mysqli_escape_string($wt_conn, $_REQUEST['privacy_alwaysOnline']);
		$theme_wamod_conversation_entry_bgcolor       = mysqli_escape_string($wt_conn, $_REQUEST['theme_wamod_conversation_entry_bgcolor']);
		$theme_wamod_conversation_entry_entrybgcolor  = mysqli_escape_string($wt_conn, $_REQUEST['theme_wamod_conversation_entry_entrybgcolor']);
		$theme_wamod_conversation_entry_hinttextcolor = mysqli_escape_string($wt_conn, $_REQUEST['theme_wamod_conversation_entry_hinttextcolor']);
		$theme_wamod_conversation_entry_textcolor     = mysqli_escape_string($wt_conn, $_REQUEST['theme_wamod_conversation_entry_textcolor']);
		$theme_wamod_conversation_entry_emojibtncolor = mysqli_escape_string($wt_conn, $_REQUEST['theme_wamod_conversation_entry_emojibtncolor']);
		$theme_wamod_conversation_entry_btncolor      = mysqli_escape_string($wt_conn, $_REQUEST['theme_wamod_conversation_entry_btncolor']);
		$theme_wamod_conversation_entry_sendbtncolor  = mysqli_escape_string($wt_conn, $_REQUEST['theme_wamod_conversation_entry_sendbtncolor']);
		$theme_hangouts_conversation_entry_bgcolor    = mysqli_escape_string($wt_conn, $_REQUEST['theme_hangouts_conversation_entry_bgcolor']);
		$theme_hangouts_conversation_entry_hintcolor  = mysqli_escape_string($wt_conn, $_REQUEST['theme_hangouts_conversation_entry_hintcolor']);
		$theme_hangouts_conversation_entry_textcolor  = mysqli_escape_string($wt_conn, $_REQUEST['theme_hangouts_conversation_entry_textcolor']);
		$theme_hangouts_conversation_attach_color     = mysqli_escape_string($wt_conn, $_REQUEST['theme_hangouts_conversation_attach_color']);
		$theme_hangouts_conversation_mic_bg           = mysqli_escape_string($wt_conn, $_REQUEST['theme_hangouts_conversation_mic_bg']);
		$theme_hangouts_conversation_mic_color        = mysqli_escape_string($wt_conn, $_REQUEST['theme_hangouts_conversation_mic_color']);
		$theme_hangouts_conversation_send_bg          = mysqli_escape_string($wt_conn, $_REQUEST['theme_hangouts_conversation_send_bg']);
		$theme_hangouts_conversation_send_color       = mysqli_escape_string($wt_conn, $_REQUEST['theme_hangouts_conversation_send_color']);
		$overview_cardcolor                           = mysqli_escape_string($wt_conn, $_REQUEST['overview_cardcolor']);
		$overview_multiplechats                       = mysqli_escape_string($wt_conn, $_REQUEST['overview_multiplechats']);
		$conversation_style_entry                     = mysqli_escape_string($wt_conn, $_REQUEST['conversation_style_entry']);
		$conversation_style_bubble_layout             = mysqli_escape_string($wt_conn, $_REQUEST['conversation_style_bubble_layout']);
		$conversation_custombackcolorbool             = mysqli_escape_string($wt_conn, $_REQUEST['conversation_custombackcolorbool']);
		$conversation_custombackcolor                 = mysqli_escape_string($wt_conn, $_REQUEST['conversation_custombackcolor']);
		$conversation_style_toolbar                   = mysqli_escape_string($wt_conn, $_REQUEST['conversation_style_toolbar']);
		$conversation_toolbarexit                     = mysqli_escape_string($wt_conn, $_REQUEST['conversation_toolbarexit']);
	} else {
		$themereceived = false;
	}



	// Check if a theme must be sent and add to $data;
	$themecheck = mysqli_fetch_assoc(mysqli_query($wt_conn, "SELECT themeid FROM queue WHERE deviceid='$deviceid' LIMIT 1"));
	if ($themecheck != null) {
		$themeid = $themecheck['themeid'];
		$data = mysqli_fetch_assoc(mysqli_query($wt_conn, "SELECT * FROM themes WHERE id='$themeid' LIMIT 1"));
		mysqli_query($wt_conn, "DELETE FROM queue WHERE deviceid='$deviceid'");
	}


	// Get new device ID if it's not registered
	$id = $_REQUEST['deviceid'];
	//if (!isset($id) || $id === "") && isset($_REQUEST['general_statusbarcolor'])) {
	if ($id === "" && !($wamodversion === "BETA 8" || $wamodversion === "BETA 9" || $wamodversion === "BETA 10")) {
		$deviceid = getNewDeviceID($androidversion, $devicemodel, $wamodversion);
		if ($deviceid === "" || $deviceid === null) die;
		$data["deviceid"] = $deviceid;
		return json_encode($data);
	}



	// Update device's data
	if ($themereceived && isset($general_statusbarcolor)) {
		$currentmillis = round(microtime(true) * 1000);
		$sql = "INSERT INTO devices
SET 
deviceid = '$deviceid',
androidversion = '$androidversion',
model = '$devicemodel',
wamodversion = '$wamodversion',
last_connection = '$currentmillis',
date_added = '$currentmillis',
general_statusbarcolor = '$general_statusbarcolor',
general_toolbarcolor = '$general_toolbarcolor',
general_toolbarforeground = '$general_toolbarforeground',
general_navbarcolor = '$general_navbarcolor',
general_darkmode = '$general_darkmode',
general_darkstatusbaricons = '$general_darkstatusbaricons',
home_theme = '$home_theme',
conversation_hideprofilephoto = '$conversation_hideprofilephoto',
conversation_hidetoolbarattach = '$conversation_hidetoolbarattach',
conversation_proximitysensor = '$conversation_proximitysensor',
conversation_rightbubblecolor = '$conversation_rightbubblecolor',
conversation_rightbubbletextcolor = '$conversation_rightbubbletextcolor',
conversation_rightbubbledatecolor = '$conversation_rightbubbledatecolor',
conversation_leftbubblecolor = '$conversation_leftbubblecolor',
conversation_leftbubbletextcolor = '$conversation_leftbubbletextcolor',
conversation_leftbubbledatecolor = '$conversation_leftbubbledatecolor',
conversation_customparticipantcolorbool = '$conversation_customparticipantcolorbool',
conversation_customparticipantcolor = '$conversation_customparticipantcolor',
conversation_style_bubble = '$conversation_style_bubble',
conversation_style_tick = '$conversation_style_tick',
theme_wamod_conversation_entry_bgcolor = '$theme_wamod_conversation_entry_bgcolor',
theme_wamod_conversation_entry_entrybgcolor = '$theme_wamod_conversation_entry_entrybgcolor',
theme_wamod_conversation_entry_hinttextcolor = '$theme_wamod_conversation_entry_hinttextcolor',
theme_wamod_conversation_entry_textcolor = '$theme_wamod_conversation_entry_textcolor',
theme_wamod_conversation_entry_emojibtncolor = '$theme_wamod_conversation_entry_emojibtncolor',
theme_wamod_conversation_entry_btncolor = '$theme_wamod_conversation_entry_btncolor',
theme_wamod_conversation_entry_sendbtncolor = '$theme_wamod_conversation_entry_sendbtncolor',
theme_hangouts_conversation_entry_bgcolor = '$theme_hangouts_conversation_entry_bgcolor',
theme_hangouts_conversation_entry_hintcolor = '$theme_hangouts_conversation_entry_hintcolor',
theme_hangouts_conversation_entry_textcolor = '$theme_hangouts_conversation_entry_textcolor',
theme_hangouts_conversation_attach_color = '$theme_hangouts_conversation_attach_color',
theme_hangouts_conversation_mic_bg = '$theme_hangouts_conversation_mic_bg',
theme_hangouts_conversation_mic_color = '$theme_hangouts_conversation_mic_color',
theme_hangouts_conversation_send_bg = '$theme_hangouts_conversation_send_bg',
theme_hangouts_conversation_send_color = '$theme_hangouts_conversation_send_color',
overview_cardcolor = '$overview_cardcolor',
overview_multiplechats = '$overview_multiplechats',
conversation_style_entry = '$conversation_style_entry',
conversation_custombackcolorbool = '$conversation_custombackcolorbool',
conversation_custombackcolor = '$conversation_custombackcolor',
conversation_style_toolbar = '$conversation_style_toolbar',
conversation_toolbarexit = '$conversation_toolbarexit'
ON DUPLICATE KEY UPDATE
androidversion = '$androidversion',
model = '$devicemodel',
wamodversion = '$wamodversion',
last_connection = '$currentmillis',
general_statusbarcolor = '$general_statusbarcolor',
general_toolbarcolor = '$general_toolbarcolor',
general_toolbarforeground = '$general_toolbarforeground',
general_navbarcolor = '$general_navbarcolor',
general_darkmode = '$general_darkmode',
general_darkstatusbaricons = '$general_darkstatusbaricons',
home_theme = '$home_theme',
conversation_hideprofilephoto = '$conversation_hideprofilephoto',
conversation_hidetoolbarattach = '$conversation_hidetoolbarattach',
conversation_proximitysensor = '$conversation_proximitysensor',
conversation_rightbubblecolor = '$conversation_rightbubblecolor',
conversation_rightbubbletextcolor = '$conversation_rightbubbletextcolor',
conversation_rightbubbledatecolor = '$conversation_rightbubbledatecolor',
conversation_leftbubblecolor = '$conversation_leftbubblecolor',
conversation_leftbubbletextcolor = '$conversation_leftbubbletextcolor',
conversation_leftbubbledatecolor = '$conversation_leftbubbledatecolor',
conversation_customparticipantcolorbool = '$conversation_customparticipantcolorbool',
conversation_customparticipantcolor = '$conversation_customparticipantcolor',
conversation_style_bubble = '$conversation_style_bubble',
conversation_style_tick = '$conversation_style_tick',
theme_wamod_conversation_entry_bgcolor = '$theme_wamod_conversation_entry_bgcolor',
theme_wamod_conversation_entry_entrybgcolor = '$theme_wamod_conversation_entry_entrybgcolor',
theme_wamod_conversation_entry_hinttextcolor = '$theme_wamod_conversation_entry_hinttextcolor',
theme_wamod_conversation_entry_textcolor = '$theme_wamod_conversation_entry_textcolor',
theme_wamod_conversation_entry_emojibtncolor = '$theme_wamod_conversation_entry_emojibtncolor',
theme_wamod_conversation_entry_btncolor = '$theme_wamod_conversation_entry_btncolor',
theme_wamod_conversation_entry_sendbtncolor = '$theme_wamod_conversation_entry_sendbtncolor',
theme_hangouts_conversation_entry_bgcolor = '$theme_hangouts_conversation_entry_bgcolor',
theme_hangouts_conversation_entry_hintcolor = '$theme_hangouts_conversation_entry_hintcolor',
theme_hangouts_conversation_entry_textcolor = '$theme_hangouts_conversation_entry_textcolor',
theme_hangouts_conversation_attach_color = '$theme_hangouts_conversation_attach_color',
theme_hangouts_conversation_mic_bg = '$theme_hangouts_conversation_mic_bg',
theme_hangouts_conversation_mic_color = '$theme_hangouts_conversation_mic_color',
theme_hangouts_conversation_send_bg = '$theme_hangouts_conversation_send_bg',
theme_hangouts_conversation_send_color = '$theme_hangouts_conversation_send_color',
overview_cardcolor = '$overview_cardcolor',
overview_multiplechats = '$overview_multiplechats',
conversation_style_entry = '$conversation_style_entry',
conversation_custombackcolorbool = '$conversation_custombackcolorbool',
conversation_custombackcolor = '$conversation_custombackcolor',
conversation_style_toolbar = '$conversation_style_toolbar',
conversation_toolbarexit = '$conversation_toolbarexit'";

		mysqli_query($wt_conn, $sql);
	}



	// Send data	
	$update = getLatestVersion();
	if ($update["version"] === null) die;
	$data["latestversion_codename"] = $update["version"];
	$data["latestversion_description"] = $update["changelog"];
	$data["latestversion_description-es"] = $update["changelog-es"];
	$data["latestversion_link"] = $update["link"];

	$data["connectiondelay"] = 60000;
	$data["timeout"] = 20000;

	return json_encode($data);
}
?>