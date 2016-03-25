function thememakerChangePhoneActivity() {
	var home = document.getElementById("whatsapp_home");
	var conversation = document.getElementById("whatsapp_conversation");

	if (home.style.display == "block" || home.style.display == "") {
		home.style.display = "none"
		conversation.style.display = "block"
	} else {
		home.style.display = "block"
		conversation.style.display = "none"
	}
}

function thememaker_changenavpage(event) {
	ev = event;
	var id = event.target.id + "_page";
	var page = document.getElementById(id);
	for (i=0; i < thememaker_pages.children.length; i++) {
		thememaker_pages.children[i].style.display = "none";
	}
	page.style.display = "block";


	var nav = document.getElementById("thememaker_nav");
	for (i=0; i < nav.children.length; i++) {
		nav.children[i].classList.remove("active")
	}

	event.target.classList.add("active");
}


var thememaker_switch_btn = document.getElementById("thememaker_switch");
thememaker_switch_btn.addEventListener("click", thememakerChangePhoneActivity, false);

var thememaker_nav = document.getElementById("thememaker_nav");
for (i=0; i < thememaker_nav.children.length; i++) {
	var btn = thememaker_nav.children[i];
	btn.addEventListener("click", thememaker_changenavpage, false);
}

function thememakerReloadColors() {
	var color;
	var value;
	var classv;

	color = document.getElementById("thememaker_option_general_page_statusbarcolor").innerHTML;
	document.getElementById("whatsapp_home_statusbar").style.background = "#" + color;
	document.getElementById("whatsapp_conversation_statusbar").style.background = "#" + color;

	color = document.getElementById("thememaker_option_general_page_toolbarcolor").innerHTML;
	document.getElementById("whatsapp_home_toolbar").style.background = "#" + color;
	document.getElementById("whatsapp_conversation_toolbar").style.background = "#" + color;

	color = document.getElementById("thememaker_option_general_page_toolbarforeground").innerHTML;
	document.getElementById("whatsapp_home_toolbar_title").style.color = "#" + color;
	document.getElementById("whatsapp_home_toolbar_icons_search").style.background = "#" + color;
	document.getElementById("whatsapp_home_toolbar_icons_message").style.background = "#" + color;
	document.getElementById("whatsapp_home_toolbar_icons_3dot").style.background = "#" + color;
	document.getElementById("whatsapp_home_toolbar_tabs_calls").style.color = "#" + color;
	document.getElementById("whatsapp_home_toolbar_tabs_chats").style.color = "#" + color;
	document.getElementById("whatsapp_home_toolbar_tabs_contacts").style.color = "#" + color;

	color = document.getElementById("thememaker_option_general_page_navbarcolor").innerHTML;
	document.getElementById("whatsapp_navbar").style.background = "#" + color;

	if (document.getElementById("thememaker_option_general_page_darkmode").checked) {
		document.getElementById("phone").classList.add("darkmode");
	} else {
		document.getElementById("phone").classList.remove("darkmode");
	}

	if (document.getElementById("thememaker_option_general_page_darkstatusbar").checked) {
		document.getElementById("whatsapp_home_statusbar_img").classList.add("dark");
		document.getElementById("whatsapp_conversation_statusbar_img").classList.add("dark");
	} else {
		document.getElementById("whatsapp_home_statusbar_img").classList.remove("dark");
		document.getElementById("whatsapp_conversation_statusbar_img").classList.remove("dark");
	}

	value = document.getElementById("thememaker_option_home_page_hometheme").value;
	switch (value) {
		case '0':
			classv = "stock";
			break;
		case '1':
			classv = "wamod";
			break;
		case '2':
			classv = "stockwcounter";
			break;
		case '3':
			classv = "telegram";
			break;
	}

	document.getElementById("whatsapp_home_list").className = "";
	document.getElementById("whatsapp_home_list").classList.add(classv);



	value = document.getElementById("thememaker_option_conversation_page_toolbarstyle").value;
	document.getElementById("whatsapp_conversation_toolbar").className = "";
	switch (value) {
		case "0":
			document.getElementById("whatsapp_conversation_toolbar").classList.add("stock");
			break;
		case "1":
			document.getElementById("whatsapp_conversation_toolbar").classList.add("stock");
			document.getElementById("whatsapp_conversation_toolbar").classList.add("centered");
			break;
		case "2":
			document.getElementById("whatsapp_conversation_toolbar").classList.add("wamod");
			break;
		case "3":
			document.getElementById("whatsapp_conversation_toolbar").classList.add("wamod");
			document.getElementById("whatsapp_conversation_toolbar").classList.add("centered");
			break;
	}






	color = document.getElementById("thememaker_option_general_page_toolbarforeground").innerHTML;
	document.getElementById("whatsapp_conversation_toolbar_backbtn").style.backgroundColor = "#" + color;
	document.getElementById("whatsapp_conversation_toolbar_info_title").style.color = "#" + color;
	document.getElementById("whatsapp_conversation_toolbar_info_subtitle").style.color = "#" + color;
	document.getElementById("whatsapp_conversation_toolbar_btns_call").style.backgroundColor = "#" + color;
	document.getElementById("whatsapp_conversation_toolbar_btns_attach").style.backgroundColor = "#" + color;
	document.getElementById("whatsapp_conversation_toolbar_btns_3dot").style.backgroundColor = "#" + color;


	value = document.getElementById("thememaker_option_conversation_page_hideprofilephoto").checked;
	if (value) {
		document.getElementById("whatsapp_conversation_toolbar_info_photo").style.display="none";
	} else {
		document.getElementById("whatsapp_conversation_toolbar_info_photo").style.display="inline-block";
	}

	value = document.getElementById("thememaker_option_conversation_page_hidetoolbaricons").checked;
	if (value) {
		document.getElementById("whatsapp_conversation_toolbar_btns_call").style.display="none";
		document.getElementById("whatsapp_conversation_toolbar_btns_attach").style.display="none";
	} else {
		document.getElementById("whatsapp_conversation_toolbar_btns_call").style.display="inline-block";
		document.getElementById("whatsapp_conversation_toolbar_btns_attach").style.display="inline-block";
	}

	value = document.getElementById("thememaker_option_conversation_page_closebutton").checked;
	if (value) {
		document.getElementById("whatsapp_conversation_toolbar_backbtn").style.webkitMaskBoxImage="url(images/thememaker/close.png)";
	} else {
		document.getElementById("whatsapp_conversation_toolbar_backbtn").style.webkitMaskBoxImage="url(images/thememaker/back.png)";
	}

	value = document.getElementById("thememaker_option_conversation_page_enablecustombackgroundcolor").checked;
	if (value) {
		document.getElementById("whatsapp_conversation").style.backgroundColor="#" + document.getElementById("thememaker_option_conversation_page_custombackgroundcolor").innerHTML;
	} else {
		document.getElementById("whatsapp_conversation").style.backgroundColor="#ffffff";
	}
}

function init() {
	document.getElementById("thememaker_option_general_page_statusbarcolor").innerHTML = device.general_statusbarcolor;
	document.getElementById("thememaker_option_general_page_toolbarcolor").innerHTML = device.general_toolbarcolor;
	document.getElementById("thememaker_option_general_page_toolbarforeground").innerHTML = device.general_toolbarforeground;
	document.getElementById("thememaker_option_general_page_navbarcolor").innerHTML = device.general_navbarcolor;
	if (device.general_darkmode === "1") document.getElementById("thememaker_option_general_page_darkmode").checked = true;
	document.getElementById("thememaker_option_home_page_hometheme").value = device.home_theme;
	if (device.general_darkstatusbaricons === "1") document.getElementById("thememaker_option_general_page_darkstatusbar").checked = true;
	document.getElementById("thememaker_option_conversation_page_toolbarstyle").value = device.conversation_style_toolbar;
	if (device.conversation_hideprofilephoto === "1") document.getElementById("thememaker_option_conversation_page_hideprofilephoto").checked = true;
	if (device.conversation_hidetoolbarattach === "1") document.getElementById("thememaker_option_conversation_page_hidetoolbaricons").checked = true;
	if (device.conversation_toolbarexit === "1") document.getElementById("thememaker_option_conversation_page_closebutton").checked = true;
	if (device.conversation_custombackcolorbool === "1") document.getElementById("thememaker_option_conversation_page_enablecustombackgroundcolor").checked = true;
	document.getElementById("thememaker_option_conversation_page_custombackgroundcolor").innerHTML = device.conversation_custombackcolor;
	document.getElementById("thememaker_option_conversationbubble_page_bubblestyle").value = device.conversation_style_bubble;
	document.getElementById("thememaker_option_conversationbubble_page_tickstyle").value = device.conversation_style_tick;
	document.getElementById("thememaker_option_conversationbubble_page_rightbubblecolor").innerHTML = device.conversation_rightbubblecolor;
	document.getElementById("thememaker_option_conversationbubble_page_rightbubbletextcolor").innerHTML = device.conversation_rightbubbletextcolor;
	document.getElementById("thememaker_option_conversationbubble_page_rightbubbledatecolor").innerHTML = device.conversation_rightbubbledatecolor;
	document.getElementById("thememaker_option_conversationbubble_page_leftbubblecolor").innerHTML = device.conversation_leftbubblecolor;
	document.getElementById("thememaker_option_conversationbubble_page_leftbubbletextcolor").innerHTML = device.conversation_leftbubbletextcolor;
	document.getElementById("thememaker_option_conversationbubble_page_leftbubbledatecolor").innerHTML = device.conversation_leftbubbledatecolor;
	if (device.conversation_customparticipantcolorbool === "1") document.getElementById("thememaker_option_conversationbubble_page_enablecustomparticipantnamecolor").checked = true;
	document.getElementById("thememaker_option_conversationbubble_page_customparticipantnamecolor").innerHTML = device.conversation_customparticipantcolor;

	document.getElementById("thememaker_option_conversationentry_page_entrystyle").value = device.conversation_style_entry;

	thememakerReloadColors();
}

var device = devices[0];

init();

var thememaker_pages = document.getElementById("thememaker_pages");

var thememaker_inputs = thememaker_pages.querySelectorAll("span.input");
for (i=0;i<thememaker_inputs.length;i++) {
	thememaker_inputs[i].addEventListener("keyup", function(event) {
		event.target.innerHTML = event.target.innerHTML.replace('<br>','');
		if (event.target.children.length > 0) event.target.innerHTML = event.target.children[0].innerHTML;
		if (event.target.innerHTML.length == 6 || event.target.innerHTML.length == 8) thememakerReloadColors();
	});
}

var thememaker_checkbox = thememaker_pages.querySelectorAll("input[type='checkbox']");
for (i=0;i<thememaker_checkbox.length;i++) {
	thememaker_checkbox[i].addEventListener("click", thememakerReloadColors);
}

var thememaker_select = thememaker_pages.querySelectorAll("select");
for (i=0;i<thememaker_select.length;i++) {
	thememaker_select[i].addEventListener("change", thememakerReloadColors);
}
