var navButtons = document.querySelectorAll("#settings_nav span");
var pages = document.querySelectorAll("#settings_pages > div");
var devicesContainer = document.getElementById("devices_container");
var devicesContainerOriginalContent = devicesContainer.innerHTML;

for (var i=0; i<navButtons.length; i++) {
	navButtons[i].addEventListener("click", function(event){
		navButtonClicked(event);
	});
}

function navButtonClicked(id) {
	var button = event.target;
	var pageName =  event.target.dataset.page;

	for (var i=0; i<pages.length; i++) {
		pages[i].style.display = "none";
	}

	for (var i=0; i<navButtons.length; i++) {
		navButtons[i].classList.remove("active");
	}

	button.classList.add("active");
	var page = document.querySelector("#settings_pages [data-page='" + pageName + "']");

	page.style.display = "block";
}

function loadDevices() {
	if (devices == null) return;
	devicesContainer.innerHTML = "";
	for (var i=0; i<devices.length; i++) {
		var alias;
		if (devices[i].alias == null) alias = devices[i].devicemodel;
		else alias = devices[i].alias;
		devicesContainer.innerHTML +=   '<div class="device" data-deviceid="'+ devices[i].deviceid +'">' + 
											'<span class="device_name">'    + alias  + '</span>' +
											'<span class="device_separator"> – </span>' + 
											'<span class="device_model">'    + devices[i].devicemodel  + ' ('+ devices[i].deviceid + ')</span>' +
											'<div  class="device_actions">' + 
												'<span class="device_rename"></span>' + 
												'<span class="device_delete"></span>' + 
											'</div>' + 
											'<span class="device_message">' + devices[i].wamodversion + '</span>' + 
										'</div>';
	}
}

loadDevices();

var deviceDeleteBtns = document.querySelectorAll(".device_delete");
var deviceRenameBtns = document.querySelectorAll(".device_rename");

for (var i=0; i<deviceDeleteBtns.length; i++) {
	deviceDeleteBtns[i].addEventListener("click", function(event){
		var deviceDiv = event.target.parentElement.parentElement;
		var deviceID = deviceDiv.dataset.deviceid;
		showDialog("Unlink device", "Are you sure you want to unlink your device?", true, function(){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
		    	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		    		try {
		    			var json = JSON.parse(xmlhttp.response);
			    		switch (json.status) {
			    			case "done":
			    				Toast.makeText("Device unlinked");
			    				deviceDiv.parentNode.removeChild(deviceDiv);
			    				if (devicesContainer.innerHTML == "") devicesContainer.innerHTML = devicesContainerOriginalContent;
			    				break;
			    			default:
			    				Toast.makeText("ERROR WTF");
			    		}
			    	} catch(err) {
			    		Toast.makeText("Can't connect, check your connection");
			    	}
				}
			}
		    xmlhttp.open("POST", "api/api.php?action=unlinkdevice&deviceid=" + deviceID);
		    xmlhttp.send();
		});
	});
}

for (var i=0; i<deviceRenameBtns.length; i++) {
	deviceRenameBtns[i].addEventListener("click", function(event){
		var deviceID = event.target.parentElement.parentElement.dataset.deviceid;
		showDialog("Set alias", '<div style="text-align:center;">You can set an alias to your devices to easily recognize them.<br /><input id="aliasInput" class="input" placeholder="Alias" style="display:inline-block; margin:15px;" /><br /><span id="aliasSetBtn" class="button">Set</span></div>', false);
		var aliasInput = document.getElementById("aliasInput");
		var device = getDeviceByID(deviceID);
		var alias = device.alias;
		if (alias != null) aliasInput.value = device.alias;
		else alias = "";
		var setBtn = document.getElementById("aliasSetBtn");
		setBtn.addEventListener("click", function() {
			if (aliasInput.value !== alias) {
				var newAlias = aliasInput.value;
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
			    	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			    		try {
			    			var json = JSON.parse(xmlhttp.response);
				    		switch (json.status) {
				    			case "done":
				    				Toast.makeText("Alias changed");
				    				var deviceDiv = document.querySelector(".device[data-deviceid='" + deviceID + "']");
				    				var aliasSpan = deviceDiv.querySelector(".device_name");
				    				if (newAlias == "") aliasSpan.innerText = device.devicemodel;
				    				else aliasSpan.innerText = newAlias;
				    				devices[getDeviceArrayByID(deviceID)].alias = newAlias;
				    				break;
				    			default:
				    				Toast.makeText("ERROR WTF");
				    		}
				    	} catch(err) {
				    		Toast.makeText("Can't connect, check your connection");
				    	}
					}
				}
			    xmlhttp.open("POST", "api/api.php?action=changealias&deviceid=" + deviceID + "&alias=" + newAlias);
			    xmlhttp.send();
			    Toast.makeText("Changing...");
			    hideDialog();
			}
		});
	});
}

function blurAll() {
	var tmp = document.createElement("input");
	document.body.appendChild(tmp);
	tmp.focus();
	document.body.removeChild(tmp);
}

var addNewDeviceBtn = document.getElementById("devices_addnew");
addNewDeviceBtn.addEventListener("click", function(){
	showDialog("Add a new device", '<div style="text-align:center; max-width:380px;">Do you remember how to check your device ID? Just go to WAMOD Settings > WAMOD Themes, you will find it there.<br /><div style="text-align:center; position:relative; display:inline-block;"><input style="margin-top:20px; font-size:28px; width:115px; text-align:center;" maxlength="6" class="input" id="addNewDevice_deviceID" /><img src="images/loading_505050.gif" style="position:absolute; top:34px; right:-30px; display:none;" id="spinner"></div></div>', false);
	var deviceID_input = document.getElementById("addNewDevice_deviceID");
	var spinner = document.getElementById("spinner");
	deviceID_input.addEventListener("keyup", function(){
		if (deviceID_input.value.length == 6) {
			deviceID_input.disabled = true;
			blurAll();
			spinner.style.display = "block";
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
		    	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		    		spinner.style.display = "none";
		    		deviceID_input.disabled = false;
		    		try {
		    			console.log(xmlhttp.response);
		    			var json = JSON.parse(xmlhttp.response);
			    		switch (json.status) {
			    			case "done":
			    				Toast.makeText("Device added");
			    				spinner.style.display = "block";
			    				spinner.style.src = "images/done_16.png";
			    				location.reload();
			    				break;
			    			case "alreadylinkedtoyou":
			    				Toast.makeText("Already linked to your account");
			    				location.reload();
			    				break;
			    			case "alreadylinked":
			    				Toast.makeText("Already linked to another account");
			    				break;
			    			case "invalid":
			    				Toast.makeText("The device ID is invalid");
			    				break;
			    			default:
			    				Toast.makeText("ERROR WTF");
			    		}
			    	} catch(err) {
			    		Toast.makeText("Can't connect, check your connection");
			    	}
				}
			}
		    xmlhttp.open("POST", "register.php?deviceid=" + deviceID_input.value);
		    xmlhttp.send();
		}
	});
});