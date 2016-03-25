var page1 = document.getElementById("page_1");
page1.style.display = "block";

var activePage = 1;



function nextPage() {
	var actualPage = document.getElementById("page_" + activePage);
	var newPage = document.getElementById("page_" + (activePage+1));
	actualPage.style.display = "none";
	newPage.style.display = "block";

	var actualStep = document.getElementById("step_" + activePage);
	var newStep = document.getElementById("step_" + (activePage+1));
	actualStep.classList.remove("active");
	newStep.classList.add("active");
	activePage++;
}

function onRegisterNextPressed() {
	var firstnameINPUT = document.getElementById("firstname");
	var lastnameINPUT = document.getElementById("lastname");
	var usernameINPUT = document.getElementById("username");
	var emailINPUT = document.getElementById("email");
	var passwordINPUT = document.getElementById("password");

	var input = [firstnameINPUT, lastnameINPUT, usernameINPUT, emailINPUT, passwordINPUT];

	var firstname = firstnameINPUT.value;
	var lastname = lastnameINPUT.value;
	var username = usernameINPUT.value;
	var email = emailINPUT.value;
	var password = passwordINPUT.value;

	if (firstname=="" || lastname=="" || username=="" || email=="" || password=="") {
		for (var i=0; i<input.length; i++) {
			if (input[i].value == "") {
				console.log(input[i].id + " is empty.");

				var msg = document.createElement("div");
				msg.classList.add("empty_msg");
				msg.style.top = (input[i].getBoundingClientRect().top) + "px";
				msg.style.left = (input[i].getBoundingClientRect().left + input[i].offsetWidth + 10) + "px";
				msg.innerHTML = "You can't leave this empty";
				msg.addEventListener("animationend", function() {
					document.body.removeChild(msg);
				});

				document.body.appendChild(msg);

				return;
			}
		}
	}

	if (password.length < 6) {
		var msg = document.createElement("div");
		msg.classList.add("empty_msg");
		msg.style.top = (passwordINPUT.getBoundingClientRect().top) + "px";
		msg.style.left = (passwordINPUT.getBoundingClientRect().left + passwordINPUT.offsetWidth + 10) + "px";
		msg.innerHTML = "The password must contain at least 6 characters.";
		msg.addEventListener("animationend", function() {
			document.body.removeChild(msg);
		});

		document.body.appendChild(msg);

		return;
	}

	nextBtnAsLoading(true);

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
    	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    		nextBtnAsLoading(false);
    		console.log(xmlhttp.response);
			if (xmlhttp.response == "done") {
				nextPage();
			}
		}
	}
    xmlhttp.open("POST", "register.php?firstname=" + firstname + "&lastname=" + lastname + "&username=" + username + "&email=" + email +"&password=" + md5(password));
    xmlhttp.send();
}

function nextBtnAsLoading(boolean) {
	var nextButton = document.querySelector(".next.button");
	var spinner = nextButton.querySelector("img");
	if (boolean) {
		nextButton.style.color = "transparent";
		spinner.style.display = "block";
	} else {
		nextButton.style.color = "#fafafa";
		spinner.style.display = "none";
	}
}