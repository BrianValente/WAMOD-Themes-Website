<!DOCTYPE html>
<html>
	<head>
		<title>Theme maker - WAMOD Themes</title>
		<link rel="stylesheet" type="text/css" href="styles/reset.css" />
		<link rel="stylesheet" type="text/css" href="styles/styles.css" />
		<link rel="stylesheet" type="text/css" href="styles/thememaker.css" />
		<meta charset="UTF-8" />
	</head>
	<body>
		<?php include('header.php'); ?>
		<div class="wrapper">
			<?php

			session_start();
			if (!isset($_SESSION['username'])) {
				header("Location: login.php");
				die();
			}

			include 'load_devices.php';

			?>

			<h1 class="pagetitle">Theme maker</h1>
			<div id="thememaker">
				<div id="phone_container">
					<div id="phone">
						<div id="whatsapp_home">
							<div id="whatsapp_home_statusbar">
								<span id="whatsapp_home_statusbar_img"></span>
							</div>
							<div id="whatsapp_home_toolbar">
								<span id="whatsapp_home_toolbar_title">WhatsApp</span>
								<div id="whatsapp_home_toolbar_icons">
									<span id="whatsapp_home_toolbar_icons_search"></span>
									<span id="whatsapp_home_toolbar_icons_message"></span>
									<span id="whatsapp_home_toolbar_icons_3dot"></span>
								</div>
								<div id="whatsapp_home_toolbar_tabs">
									<span id="whatsapp_home_toolbar_tabs_calls">Calls</span>
									<span id="whatsapp_home_toolbar_tabs_chats">Chats<span id="whatsapp_home_toolbar_tabs_chats_active"></span></span>
									<span id="whatsapp_home_toolbar_tabs_contacts">Contacts</span>
								</div>
							</div>
							<div id="whatsapp_home_list" class="stock">
								<div class="whatsapp_home_item">
									<img src="images/thememaker/noe.png" class="whatsapp_home_item_photo" />
									<span class="whatsapp_home_item_name">Noe 💕</span>
									<span class="whatsapp_home_item_message">that hurts 😥</span>
									<span class="whatsapp_home_item_time">16:08</span>
									<span class="whatsapp_home_item_tick"></span>
									<span class="whatsapp_home_item_tick_wamodbg"></span>
								</div>
								<div class="whatsapp_home_item">
									<img src="images/thememaker/person.png" class="whatsapp_home_item_photo" />
									<span class="whatsapp_home_item_name">Person</span>
									<span class="whatsapp_home_item_message">Hello</span>
									<span class="whatsapp_home_item_time">12:00</span>
									<span class="whatsapp_home_item_counter">1</span>
								</div>
								<div class="whatsapp_home_item">
									<img src="images/thememaker/person.png" class="whatsapp_home_item_photo" />
									<span class="whatsapp_home_item_name">Another person</span>
									<span class="whatsapp_home_item_message">What's up?</span>
									<span class="whatsapp_home_item_time">11:58</span>
								</div>
								<div class="whatsapp_home_item">
									<img src="images/thememaker/person.png" class="whatsapp_home_item_photo" />
									<span class="whatsapp_home_item_name">Group</span>
									<span class="whatsapp_home_item_message tick">LOL XDD</span>
									<span class="whatsapp_home_item_time">09:45</span>
									<span class="whatsapp_home_item_tick"></span>
									<span class="whatsapp_home_item_tick_wamodbg"></span>
								</div>
								<div class="whatsapp_home_item">
									<img src="images/thememaker/person.png" class="whatsapp_home_item_photo" />
									<span class="whatsapp_home_item_name">Mom</span>
									<span class="whatsapp_home_item_message tick">ok mom :(</span>
									<span class="whatsapp_home_item_time">09:42</span>
									<span class="whatsapp_home_item_tick"></span>
								</div>
							</div>
						</div>
						<div id="whatsapp_conversation">
							<div id="whatsapp_conversation_statusbar">
								<span id="whatsapp_conversation_statusbar_img"></span>
							</div>
							<div id="whatsapp_conversation_toolbar" class="stock">
								<span id="whatsapp_conversation_toolbar_backbtn"></span>
								<span id="whatsapp_conversation_toolbar_info">
									<img src="images/thememaker/noe.png" id="whatsapp_conversation_toolbar_info_photo" width="22px" height="22px" />
									<span id="whatsapp_conversation_toolbar_info_titles">
										<span id="whatsapp_conversation_toolbar_info_title">Noe 💕</span>
										<span id="whatsapp_conversation_toolbar_info_subtitle">Online</span>
									</span>
								</span>
								<span id="whatsapp_conversation_toolbar_btns">
									<span id="whatsapp_conversation_toolbar_btns_call"></span>
									<span id="whatsapp_conversation_toolbar_btns_attach"></span>
									<span id="whatsapp_conversation_toolbar_btns_3dot"></span>
								</span>
							</div>
							<div id="whatsapp_conversation_messages">
								<div class="whatsapp_conversation_messages_leftbubble newhangouts">
									<span class="whatsapp_conversation_messages_bubble_message">Hiii 🙂</span>
									<span class="whatsapp_conversation_messages_bubble_date">15:44</span>
								</div>
								<br />
								<div class="whatsapp_conversation_messages_rightbubble newhangouts">
									<span class="whatsapp_conversation_messages_bubble_message">owww hi 😍</span>
									<span class="whatsapp_conversation_messages_bubble_tick"></span>
									<span class="whatsapp_conversation_messages_bubble_date">15:44</span>
								</div>
								<br />
								<div class="whatsapp_conversation_messages_leftbubble newhangouts">
									<span class="whatsapp_conversation_messages_bubble_message">How are you, Brian?</span>
									<span class="whatsapp_conversation_messages_bubble_date">15:54</span>
								</div>
								<br />
								<div class="whatsapp_conversation_messages_rightbubble newhangouts">
									<span class="whatsapp_conversation_messages_bubble_message">Fine 😍😍😍 and you????</span>
									<span class="whatsapp_conversation_messages_bubble_tick"></span>
									<span class="whatsapp_conversation_messages_bubble_date">15:54</span>
								</div>
								<br />
								<div class="whatsapp_conversation_messages_leftbubble newhangouts">
									<span class="whatsapp_conversation_messages_bubble_message">fine... haha</span>
									<span class="whatsapp_conversation_messages_bubble_date">16:08</span>
								</div>
								<br />
								<div class="whatsapp_conversation_messages_rightbubble newhangouts">
									<span class="whatsapp_conversation_messages_bubble_message">why "..."?</span>
									<span class="whatsapp_conversation_messages_bubble_tick"></span>
									<span class="whatsapp_conversation_messages_bubble_date">16:08</span>
								</div>
								<br />
								<div class="whatsapp_conversation_messages_leftbubble newhangouts">
									<span class="whatsapp_conversation_messages_bubble_message">because you're fucking weird man, keep "developing" WhatsApp mods faggot, haha</span>
									<span class="whatsapp_conversation_messages_bubble_date">16:48</span>
								</div>
								<br />
								<div class="whatsapp_conversation_messages_rightbubble newhangouts">
									<span class="whatsapp_conversation_messages_bubble_message">that hurts 😥</span>
									<span class="whatsapp_conversation_messages_bubble_tick"></span>
									<span class="whatsapp_conversation_messages_bubble_date">16:08</span>
								</div>
							</div>
							<div id="whatsapp_conversation_entries">
								<div id="whatsapp_conversation_entries_wamod">
									<div id="whatsapp_conversation_entries_wamod_entry">
										<span id="whatsapp_conversation_entries_wamod_entry_hint">Say something</span>
										<span id="whatsapp_conversation_entries_wamod_entry_emojibtn"></span>
									</div>
								</div>
							</div>
						</div>
						<div id="whatsapp_navbar"><img src="images/thememaker/navbar.png" /></div>
					</div>
					<span id="thememaker_switch" class="noselect">Switch</span>
				</div>
				<div id="content">
					<div style="text-align:center;">
						<div id="thememaker_nav">
							<span id="thememaker_option_general" class="active">General</span>
							<span id="thememaker_option_home">Home</span>
							<span id="thememaker_option_conversation">Conversation</span>
							<span id="thememaker_option_conversationbubble">Bubbles</span>
							<span id="thememaker_option_conversationentry">Entry</span>
							<span id="thememaker_option_themeinfo">Theme info</span>
						</div>
					</div>
					<div id="thememaker_pages">
						<div id="thememaker_option_general_page">
							<table>
								<tr>
									<td>Status bar color</td>
									<td><span id="thememaker_option_general_page_statusbarcolor" class="input" contenteditable></span></td>
								</tr>
								<tr>
									<td>Toolbar color</td>
									<td><span id="thememaker_option_general_page_toolbarcolor" class="input" contenteditable></span></td>
								</tr>
								<tr>
									<td>Toolbar foreground</td>
									<td><span id="thememaker_option_general_page_toolbarforeground" class="input" contenteditable></span></td>
								</tr>
								<tr>
									<td>Navigation bar color</td>
									<td><span id="thememaker_option_general_page_navbarcolor" class="input" contenteditable></span></td>
								</tr>
								<tr>
									<td>Dark mode</td>
									<td><input type="checkbox" id="thememaker_option_general_page_darkmode" /></td>
								</tr>
								<tr>
									<td>Dark status bar</td>
									<td><input type="checkbox" id="thememaker_option_general_page_darkstatusbar" /></td>
								</tr>
							</table>
						</div>
						<div id="thememaker_option_home_page">
							<table>
								<tr>
									<td>Home theme</td>
									<td>
										<select id="thememaker_option_home_page_hometheme">
											<option value="0">Stock</option>
											<option value="1">WAMOD</option>
											<option value="2">Stock w/counter in photo</option>
											<option value="3">Telegram</option>
										</select>
									</td>
								</tr>
							</table>
						</div>
						<div id="thememaker_option_conversation_page">
							<table>
								<tr>
									<td>Toolbar style</td>
									<td>
										<select id="thememaker_option_conversation_page_toolbarstyle">
											<option value="0">Stock</option>
											<option value="1">Stock centered</option>
											<option value="2">WAMOD</option>
											<option value="3">WAMOD centered</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Hide profile photo</td>
									<td><input type="checkbox" id="thememaker_option_conversation_page_hideprofilephoto" /></td>
								</tr>
								<tr>
									<td>Hide toolbar icons</td>
									<td><input type="checkbox" id="thememaker_option_conversation_page_hidetoolbaricons" /></td>
								</tr>
								<tr>
									<td>Close button</td>
									<td><input type="checkbox" id="thememaker_option_conversation_page_closebutton" /></td>
								</tr>
								<tr>
									<td>Enable custom background color</td>
									<td><input type="checkbox" id="thememaker_option_conversation_page_enablecustombackgroundcolor" /></td>
								</tr>
								<tr>
									<td>Custom background color</td>
									<td><span id="thememaker_option_conversation_page_custombackgroundcolor" class="input" contenteditable></span></td>
								</tr>
							</table>
						</div>
						<div id="thememaker_option_conversationbubble_page">
							<table>
								<tr>
									<td>Bubble style</td>
									<td>
										<select id="thememaker_option_conversationbubble_page_bubblestyle">
											<option value="0">Stock</option>
											<option value="1">WAMOD</option>
											<option value="2">Materialized</option>
											<option value="3">WhatsAppLB</option>
											<option value="4">Old Hangouts</option>
											<option value="5">Rounded</option>
											<option value="6">Facebook Messenger</option>
											<option value="7">New Hangouts</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Tick style</td>
									<td>
										<select id="thememaker_option_conversationbubble_page_tickstyle">
											<option value="0">Stock</option>
											<option value="1">iOS</option>
											<option value="2">Old WACA</option>
											<option value="3">New WACA</option>
											<option value="4">Joaquin's WAMD</option>
											<option value="5">Circles</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Right bubble color</td>
									<td><span id="thememaker_option_conversationbubble_page_rightbubblecolor" class="input" contenteditable></span></td>
								</tr>
								<tr>
									<td>Right bubble text color</td>
									<td><span id="thememaker_option_conversationbubble_page_rightbubbletextcolor" class="input" contenteditable></span></td>
								</tr>
								<tr>
									<td>Right bubble date color</td>
									<td><span id="thememaker_option_conversationbubble_page_rightbubbledatecolor" class="input" contenteditable></span></td>
								</tr>
								<tr>
									<td>Left bubble color</td>
									<td><span id="thememaker_option_conversationbubble_page_leftbubblecolor" class="input" contenteditable></span></td>
								</tr>
								<tr>
									<td>Left bubble text color</td>
									<td><span id="thememaker_option_conversationbubble_page_leftbubbletextcolor" class="input" contenteditable></span></td>
								</tr>
								<tr>
									<td>Left bubble date color</td>
									<td><span id="thememaker_option_conversationbubble_page_leftbubbledatecolor" class="input" contenteditable></span></td>
								</tr>
								<tr>
									<td>Enable custom participant name color</td>
									<td><input type="checkbox" id="thememaker_option_conversationbubble_page_enablecustomparticipantnamecolor" /></td>
								</tr>
								<tr>
									<td>Custom participant name color</td>
									<td><span id="thememaker_option_conversationbubble_page_customparticipantnamecolor" class="input" contenteditable></span></td>
								</tr>
							</table>
						</div>
						<div id="thememaker_option_conversationentry_page">
							<table>
								<tr>
									<td>Entry style</td>
									<td>
										<select id="thememaker_option_conversationentry_page_entrystyle">
											<option value="0">Stock</option>
											<option value="1">WAMOD</option>
											<option value="2">Hangouts</option>
											<option value="3">iMessage</option>
										</select>
									</td>
								</tr>
							</table>
						</div>
						<div id="thememaker_option_themeinfo_page">thememaker_option_themeinfo_page</div>
					</div>
				</div>
			</div>
		</div>
		<script src="scripts/thememaker.js"></script>
	</body>
</html>
