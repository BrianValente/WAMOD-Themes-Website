var installpopup_overlay = document.getElementById("installpopup_overlay");
var installpopup = document.getElementById("installpopup");
var installpopup_devicesHolder = document.getElementById("installpopup_devices");
var selectedThemeID = 0;

if (devices.length > 0) {
	installpopup_devicesHolder.innerHTML = "";
	for (var i = 0; i<devices.length; i++) {
        var alias;
        if (devices[i].alias == null) alias = devices[i].devicemodel;
        else alias = devices[i].alias;
		installpopup_devicesHolder.innerHTML += '<div class="installpopup_device" onclick="selectedDevice('+i+')"><span class="installpopup_device_name">'+alias+'</span><span class="installpopup_device_message"></span></div>';
	}
}

function selectedDevice(deviceid) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
    	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    		console.log(xmlhttp.response);
    		var json = JSON.parse(xmlhttp.response);
    		switch (json.status) {
    			case "done":
    				alert("The theme was sent, restart WAMOD on your device.");
    				break;
    			case "error":
    				alert("There was an error.");
    				break;
    		}
    		hideInstall();
		}
	}
    xmlhttp.open("POST", "api/api.php?action=installtheme&deviceid=" + devices[deviceid].deviceid + "&themeid=" + selectedThemeID);
    xmlhttp.send();
}

function install(themeid) {
    if (user.username === undefined) window.location = "http://wamod.ml/login.php";
	selectedThemeID = themeid;
	installpopup.style.display = "block";
    installpopup_overlay.style.display = "block";
}

function hideInstall() {
	installpopup.style.display = "none";
    installpopup_overlay.style.display = "none";
}

installpopup_overlay.addEventListener("click", function() {
    hideInstall();
});