function validateForm() {
	let FirstName = 
			document.getElementById('firstname').value;
	let LastName = 
			document.getElementById('lastname').value;
	let PhoneNumber = 
			document.getElementById('phonenumber').value;
	let Email = 
			document.getElementById('email').value;
	let password = 
			document.getElementById('password').value;
	let Account =
			document.getElementById('account').value;
	if (Email == "" || password == "" || PhoneNumber == "" || FirstName == "" || LastName == ""){
		alert('Fields should not be empty');
	}else if (!FirstName.match(/^[A-Za-z]+$/)) {
		document.getElementById('ron').innerHTML = "Firstname should have alphabetic charaters only";
		return false;
	}else if (!LastName.match(/^[A-Za-z]+$/)){
		document.getElementById('ronn').innerHTML = "LastName should have alphabetic charaters only";
		return false;
	}else if(!password.match(/^[A-Za-z0-9]*$/)){
		document.getElementById('dad').innerHTML = "Password should have numbers and alphabets only";
		return false;
	}else{
		let message = "You, " + FirstName + " have successfully registered as a " + Account;
		alert(message);
	}
	return true;
}