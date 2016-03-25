<?php

//if (strcmp($_SERVER['REMOTE_ADDR'], "181.44.200.161") != 0) die;

//if (strcmp($_REQUEST['wamodversion'], "BETA 9") == 0) die;

//if (strcmp($_REQUEST['wamodversion'], "BETA 9") == 0 || strcmp($_REQUEST['wamodversion'], "BETA 10") == 0) die;

//die;

header('Content-Type: application/json');
header('Connection: close');

include 'includes.php';

$action = $_REQUEST['action'];

switch ($action) {
	case "checkin":
		$data = checkin();
		break;
	case "lastid":
		$data = getLastID();
		break;
	case "checkifdeviceexists":
		$data = checkIfDeviceExists($_REQUEST['deviceid']);
		if ($data) $data = "true";
		else $data = "false";
		break;
	case "installtheme":
		$data = installTheme($_REQUEST['deviceid'], $_REQUEST['themeid']);
		break;
	case "unlinkdevice":
		$data = unlinkDevice($_REQUEST['deviceid']);
		break;
	case "changealias":
		$data = changeAlias($_REQUEST['deviceid'], $_REQUEST['alias']);
		break;
	case "test":
		$json = '[{"0":"1","id":"1","1":"WAMOD Stock","theme_name":"WAMOD Stock","2":"The stock theme of WAMOD","theme_description":"The stock theme of WAMOD","3":"14","theme_creatorid":"14","4":"1c2529","general_statusbarcolor":"1c2529","5":"212b30","general_toolbarcolor":"212b30","6":"ffffff","general_toolbarforeground":"ffffff","7":"404040","general_navbarcolor":"404040","8":"1","general_darkmode":"1","9":"0","general_darkstatusbaricons":"0","10":"1","home_theme":"1","11":"1","conversation_hideprofilephoto":"1","12":"1","conversation_hidetoolbarattach":"1","13":"1","conversation_proximitysensor":"1","14":"8e0f0f","conversation_rightbubblecolor":"8e0f0f","15":"ffffff","conversation_rightbubbletextcolor":"ffffff","16":"a4a4a4","conversation_rightbubbledatecolor":"a4a4a4","17":"ffffff","conversation_leftbubblecolor":"ffffff","18":"000000","conversation_leftbubbletextcolor":"000000","19":"a4a4a4","conversation_leftbubbledatecolor":"a4a4a4","20":"0","conversation_customparticipantcolorbool":"0","21":"a4a4a4","conversation_customparticipantcolor":"a4a4a4","22":"2","conversation_style_bubble":"2","23":"1","conversation_style_tick":"1","24":"404040","theme_wamod_conversation_entry_bgcolor":"404040","25":"545454","theme_wamod_conversation_entry_entrybgcolor":"545454","26":"a2a2a2","theme_wamod_conversation_entry_hinttextcolor":"a2a2a2","27":"d2d2d2","theme_wamod_conversation_entry_textcolor":"d2d2d2","28":"ffffff","theme_wamod_conversation_entry_emojibtncolor":"ffffff","29":"ffffff","theme_wamod_conversation_entry_btncolor":"ffffff","30":"b01818","theme_wamod_conversation_entry_sendbtncolor":"b01818","31":"404040","theme_hangouts_conversation_entry_bgcolor":"404040","32":"a2a2a2","theme_hangouts_conversation_entry_hintcolor":"a2a2a2","33":"d2d2d2","theme_hangouts_conversation_entry_textcolor":"d2d2d2","34":"ffffff","theme_hangouts_conversation_attach_color":"ffffff","35":"545454","theme_hangouts_conversation_mic_bg":"545454","36":"d2d2d2","theme_hangouts_conversation_mic_color":"d2d2d2","37":"545454","theme_hangouts_conversation_send_bg":"545454","38":"d2d2d2","theme_hangouts_conversation_send_color":"d2d2d2","39":"1","overview_cardcolor":"1","40":"1","overview_multiplechats":"1","41":"1","conversation_style_entry":"1","42":"0","conversation_custombackcolorbool":"0","43":"303030","conversation_custombackcolor":"303030","44":"2","conversation_style_toolbar":"2","45":"0","conversation_toolbarexit":"0"},{"0":"2","id":"2","1":"WhatsApp Stock","theme_name":"WhatsApp Stock","2":"The classical colors","theme_description":"The classical colors","3":"14","theme_creatorid":"14","4":"024d44","general_statusbarcolor":"024d44","5":"045f54","general_toolbarcolor":"045f54","6":"ffffff","general_toolbarforeground":"ffffff","7":"555555","general_navbarcolor":"555555","8":"0","general_darkmode":"0","9":"0","general_darkstatusbaricons":"0","10":"0","home_theme":"0","11":"0","conversation_hideprofilephoto":"0","12":"0","conversation_hidetoolbarattach":"0","13":"0","conversation_proximitysensor":"0","14":"e6ffcd","conversation_rightbubblecolor":"e6ffcd","15":"000000","conversation_rightbubbletextcolor":"000000","16":"6a6a6a","conversation_rightbubbledatecolor":"6a6a6a","17":"ffffff","conversation_leftbubblecolor":"ffffff","18":"000000","conversation_leftbubbletextcolor":"000000","19":"6a6a6a","conversation_leftbubbledatecolor":"6a6a6a","20":"0","conversation_customparticipantcolorbool":"0","21":"000000","conversation_customparticipantcolor":"000000","22":"0","conversation_style_bubble":"0","23":"0","conversation_style_tick":"0","24":"ffffff","theme_wamod_conversation_entry_bgcolor":"ffffff","25":"ffffff","theme_wamod_conversation_entry_entrybgcolor":"ffffff","26":"ffffff","theme_wamod_conversation_entry_hinttextcolor":"ffffff","27":"ffffff","theme_wamod_conversation_entry_textcolor":"ffffff","28":"ffffff","theme_wamod_conversation_entry_emojibtncolor":"ffffff","29":"ffffff","theme_wamod_conversation_entry_btncolor":"ffffff","30":"ffffff","theme_wamod_conversation_entry_sendbtncolor":"ffffff","31":"ffffff","theme_hangouts_conversation_entry_bgcolor":"ffffff","32":"ffffff","theme_hangouts_conversation_entry_hintcolor":"ffffff","33":"ffffff","theme_hangouts_conversation_entry_textcolor":"ffffff","34":"ffffff","theme_hangouts_conversation_attach_color":"ffffff","35":"ffffff","theme_hangouts_conversation_mic_bg":"ffffff","36":"ffffff","theme_hangouts_conversation_mic_color":"ffffff","37":"ffffff","theme_hangouts_conversation_send_bg":"ffffff","38":"ffffff","theme_hangouts_conversation_send_color":"ffffff","39":"1","overview_cardcolor":"1","40":"1","overview_multiplechats":"1","41":"0","conversation_style_entry":"0","42":"0","conversation_custombackcolorbool":"0","43":"ffffff","conversation_custombackcolor":"ffffff","44":"0","conversation_style_toolbar":"0","45":"0","conversation_toolbarexit":"0"},{"0":"3","id":"3","1":"Hangouts","theme_name":"Hangouts","2":"Includes the colors and style of Hangouts, the chatting app of Google","theme_description":"Includes the colors and style of Hangouts, the chatting app of Google","3":"14","theme_creatorid":"14","4":"0B8043","general_statusbarcolor":"0B8043","5":"0F9D58","general_toolbarcolor":"0F9D58","6":"FFFFFF","general_toolbarforeground":"FFFFFF","7":"555555","general_navbarcolor":"555555","8":"0","general_darkmode":"0","9":"0","general_darkstatusbaricons":"0","10":"1","home_theme":"1","11":"1","conversation_hideprofilephoto":"1","12":"1","conversation_hidetoolbarattach":"1","13":"1","conversation_proximitysensor":"1","14":"CFD8DC","conversation_rightbubblecolor":"CFD8DC","15":"263238","conversation_rightbubbletextcolor":"263238","16":"263238","conversation_rightbubbledatecolor":"263238","17":"FFFFFF","conversation_leftbubblecolor":"FFFFFF","18":"263238","conversation_leftbubbletextcolor":"263238","19":"263238","conversation_leftbubbledatecolor":"263238","20":"0","conversation_customparticipantcolorbool":"0","21":"000000","conversation_customparticipantcolor":"000000","22":"7","conversation_style_bubble":"7","23":"1","conversation_style_tick":"1","24":"ECEFF1","theme_wamod_conversation_entry_bgcolor":"ECEFF1","25":"000000","theme_wamod_conversation_entry_entrybgcolor":"000000","26":"000000","theme_wamod_conversation_entry_hinttextcolor":"000000","27":"000000","theme_wamod_conversation_entry_textcolor":"000000","28":"000000","theme_wamod_conversation_entry_emojibtncolor":"000000","29":"000000","theme_wamod_conversation_entry_btncolor":"000000","30":"000000","theme_wamod_conversation_entry_sendbtncolor":"000000","31":"FFFFFF","theme_hangouts_conversation_entry_bgcolor":"FFFFFF","32":"607D8B","theme_hangouts_conversation_entry_hintcolor":"607D8B","33":"607D8B","theme_hangouts_conversation_entry_textcolor":"607D8B","34":"607D8B","theme_hangouts_conversation_attach_color":"607D8B","35":"ECEFF1","theme_hangouts_conversation_mic_bg":"ECEFF1","36":"98AAB4","theme_hangouts_conversation_mic_color":"98AAB4","37":"0F9D58","theme_hangouts_conversation_send_bg":"0F9D58","38":"FFFFFF","theme_hangouts_conversation_send_color":"FFFFFF","39":"1","overview_cardcolor":"1","40":"1","overview_multiplechats":"1","41":"2","conversation_style_entry":"2","42":"1","conversation_custombackcolorbool":"1","43":"ECEFF1","conversation_custombackcolor":"ECEFF1","44":"2","conversation_style_toolbar":"2","45":"0","conversation_toolbarexit":"0"},{"0":"4","id":"4","1":"DANGER","theme_name":"DANGER","2":"Black & Yellow","theme_description":"Black & Yellow","3":"14","theme_creatorid":"14","4":"ead446","general_statusbarcolor":"ead446","5":"000000","general_toolbarcolor":"000000","6":"ead446","general_toolbarforeground":"ead446","7":"ead446","general_navbarcolor":"ead446","8":"1","general_darkmode":"1","9":"0","general_darkstatusbaricons":"0","10":"1","home_theme":"1","11":"1","conversation_hideprofilephoto":"1","12":"1","conversation_hidetoolbarattach":"1","13":"1","conversation_proximitysensor":"1","14":"ead446","conversation_rightbubblecolor":"ead446","15":"000000","conversation_rightbubbletextcolor":"000000","16":"555555","conversation_rightbubbledatecolor":"555555","17":"000000","conversation_leftbubblecolor":"000000","18":"ead446","conversation_leftbubbletextcolor":"ead446","19":"aaaaaa","conversation_leftbubbledatecolor":"aaaaaa","20":"1","conversation_customparticipantcolorbool":"1","21":"ffffff","conversation_customparticipantcolor":"ffffff","22":"7","conversation_style_bubble":"7","23":"1","conversation_style_tick":"1","24":"ead446","theme_wamod_conversation_entry_bgcolor":"ead446","25":"000000","theme_wamod_conversation_entry_entrybgcolor":"000000","26":"ead446","theme_wamod_conversation_entry_hinttextcolor":"ead446","27":"ead446","theme_wamod_conversation_entry_textcolor":"ead446","28":"ead446","theme_wamod_conversation_entry_emojibtncolor":"ead446","29":"000000","theme_wamod_conversation_entry_btncolor":"000000","30":"000000","theme_wamod_conversation_entry_sendbtncolor":"000000","31":"000000","theme_hangouts_conversation_entry_bgcolor":"000000","32":"000000","theme_hangouts_conversation_entry_hintcolor":"000000","33":"000000","theme_hangouts_conversation_entry_textcolor":"000000","34":"000000","theme_hangouts_conversation_attach_color":"000000","35":"000000","theme_hangouts_conversation_mic_bg":"000000","36":"000000","theme_hangouts_conversation_mic_color":"000000","37":"000000","theme_hangouts_conversation_send_bg":"000000","38":"000000","theme_hangouts_conversation_send_color":"000000","39":"1","overview_cardcolor":"1","40":"1","overview_multiplechats":"1","41":"1","conversation_style_entry":"1","42":"1","conversation_custombackcolorbool":"1","43":"303030","conversation_custombackcolor":"303030","44":"2","conversation_style_toolbar":"2","45":"0","conversation_toolbarexit":"0"}]';
		$json = json_decode($json, true);
		for ($i = 0; $i<count($json); $i++) {
			$themename = $json[$i]["theme_name"];
			$sql .= "
			INSERT INTO test SET theme_name='$themename'";
		}
		echo $sql;
		break;
	default:
		$data = 'wtf';
		break;
}


echo $data;
?>
