var usernameInput = document.getElementById("username");
var passwordInput = document.getElementById("password");

function checkCompletedInputs() {
	if (usernameInput.value === "") {
		var msg = document.createElement("div");
		msg.classList.add("empty_msg");
		msg.style.top = (usernameInput.getBoundingClientRect().top) + "px";
		msg.style.left = (usernameInput.getBoundingClientRect().left + usernameInput.offsetWidth + 10) + "px";
		msg.innerHTML = "You can't leave this empty";
		msg.addEventListener("animationend", function() {
			document.body.removeChild(msg);
		});

		document.body.appendChild(msg);
		return false;
	} else if (passwordInput.value === "") {
		var msg = document.createElement("div");
		msg.classList.add("empty_msg");
		msg.style.top = (passwordInput.getBoundingClientRect().top) + "px";
		msg.style.left = (passwordInput.getBoundingClientRect().left + passwordInput.offsetWidth + 10) + "px";
		msg.innerHTML = "You can't leave this empty";
		msg.addEventListener("animationend", function() {
			document.body.removeChild(msg);
		});

		document.body.appendChild(msg);
		return false;
	}
	else return true;
}

function blurAll() {
	var tmp = document.createElement("input");
	document.body.appendChild(tmp);
	tmp.focus();
	document.body.removeChild(tmp);
}

function login() {
	if (!checkCompletedInputs()) return;

	var username = document.getElementById('username').value;
	var password = md5(document.getElementById('password').value);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		inputEnabled(true);
		loginBtnAsLoading(false);
    	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    		console.log(xmlhttp.response);
    		try {
    			var json = JSON.parse(xmlhttp.response);
	    		switch (json.status) {
	    			case "done":
	    				message("Redirecting...");
	    				window.location = "http://wamod.ml/";
	    				break;
	    			default:
	    				error("Invalid credentials");
	    		}
	    	} catch(err) {
	    		error("Can't connect, check your connection");
	    	}
		}
	}
    xmlhttp.open("POST", "login.php?username=" + username + "&password=" + password);
    xmlhttp.send();

    inputEnabled(false);
    loginBtnAsLoading(true);
}

function error(error) {
	var errorHolder = document.getElementById("message");
	errorHolder.style.color = "#D32F2F";
	errorHolder.classList.add("animate");
	errorHolder.innerHTML = error;
	errorHolder.addEventListener("animationend", function() {
		errorHolder.classList.remove("animate");
	});
}

function message(message) {
	var messageHolder = document.getElementById("message");
	messageHolder.style.color = "#ffffff";
	messageHolder.classList.add("animate");
	messageHolder.innerHTML = message;
	messageHolder.addEventListener("animationend", function() {
		messageHolder.classList.remove("animate");
	});
}

function inputEnabled(bool) {
	if (bool) {
		usernameInput.disabled = false;
		passwordInput.disabled = false;
		usernameInput.classList.remove("disabled");
		passwordInput.classList.remove("disabled");
	} else {
		blurAll();
		usernameInput.disabled = true;
		passwordInput.disabled = true;
		usernameInput.classList.add("disabled");
		passwordInput.classList.add("disabled");
	}
}

function loginBtnAsLoading(boolean) {
	var loginButton = document.querySelector(".login.button");
	var spinner = loginButton.querySelector("img");
	if (boolean) {
		loginButton.style.color = "transparent";
		spinner.style.display = "block";
	} else {
		loginButton.style.color = "#fafafa";
		spinner.style.display = "none";
	}
}