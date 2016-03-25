var id_input = document.getElementById("idinput");
var spinner = document.getElementById("spinner");

function blurAll() {
	var tmp = document.createElement("input");
	document.body.appendChild(tmp);
	tmp.focus();
	document.body.removeChild(tmp);
}

function inputEnabled(bool) {
	if (bool) {
		id_input.disabled = false;
		id_input.classList.remove("disabled");
		spinner.style.display = "none";
	} else {
		blurAll();
		id_input.disabled = true;
		id_input.classList.add("disabled");
		spinner.style.display = "block";
	}
}

function done() {
	spinner.style.display = "block";
	spinner.src = "images/done_16.png";
	window.setTimeout(function(){
		window.location = "http://wamod.ml/";
	}, 1500);
}

function error(error) {
	var errorHolder = document.getElementById("message");
	errorHolder.classList.add("animate");
	errorHolder.innerHTML = error;
	errorHolder.addEventListener("animationend", function() {
		errorHolder.classList.remove("animate");
	});
}

id_input.addEventListener("keyup", function() {
	if (id_input.value.length == 6) {
		inputEnabled(false);

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
	    	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	    		console.log(xmlhttp.response);
	    		var json = JSON.parse(xmlhttp.response);
	    		switch (json.status) {
	    			case "done":
	    				done();
	    				break;
	    			case "invalid":
	    				error("The ID is invalid");
	    				inputEnabled(true);
	    				break;
	    			case "error":
	    				error("unknown error");
	    				inputEnabled(true);
	    				break;
	    			case "alreadylinked":
	    				error("The device is linked to another account");
	    				inputEnabled(true);
	    				break;
	    			case "alreadylinkedtoyou":
	    				error("You already linked this device to your account");
	    				inputEnabled(true);
	    				break;
	    		}
	    		
			}
		}
	    xmlhttp.open("POST", "register.php?deviceid=" + id_input.value);
	    xmlhttp.send();
	}
});