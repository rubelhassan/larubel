function validateForm() {
    var name = document.forms["regform"]["name"].value;
    var password = document.forms["regform"]["password"].value;
    var email = document.forms["regform"]["email"].value;
    var error = 0;
    if (name == null || name == "") {
    	document.getElementById("name-help").innerHTML = "Name Cannot be empty";
        error++;
    }else {
    	document.getElementById("name-help").innerHTML = "";
    }
    if(name.length < 4) {
    	document.getElementById("name-help").innerHTML = "Name Cannot be less than 4 character";
       	error++;
    } else {
    	document.getElementById("name-help").innerHTML = "";
    }

    
    if(!validateEmail(email)) {
    	document.getElementById("email-help").innerHTML = "Email is not valid";
    	error++;
    } else {
    	document.getElementById("email-help").innerHTML = "";
    }

    if(password == null || password == "") {
    	document.getElementById("pass-help").innerHTML = "Password cannot be empty";
        error++;
    } else {
    	document.getElementById("pass-help").innerHTML = "";
    }

    if(error) {
    	return false;
    }
}

function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

function loginValidate() {
	var email = document.forms["loginform"]["email"].value;
	var error = 0;
	if(!validateEmail(email)) {
    	document.getElementById("email-help").innerHTML = "Email is not valid";
    	error++;
    } else {
    	document.getElementById("email-help").innerHTML = "";
    }

    if(error) {
    	return false;
    }
}