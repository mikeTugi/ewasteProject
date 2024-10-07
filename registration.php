<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$firstname = $_POST['FirstName'];
	$lastname = $_POST['LastName'];
	$phonenumber = $_POST['PhoneNumber'];
	$email = $_POST['Email'];
	$accountType = $_POST['Account'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['Confirmpassword']);
	

	$select = "SELECT * FROM users WHERE Email = '$email' AND Password = '$password' ";

	$result = mysqli_query($connect,$select);
	if (mysqli_num_rows($result) > 0) {
		
		$error[] = 'User already exists';
		
		}else{

			if ($password != $cpassword) {
				$error[] = 'Password does not match!';
			}
			 else{
				$sql = "INSERT INTO users(Firstname,Lastname,Phonenumber,Email,Account_Type,Password,Confirm_Password) VALUES('$firstname','$lastname','$phonenumber','$email','$accountType','$password','$cpassword')";
					mysqli_query($connect,$sql);
					header('location:Home.html?userregistration=success');
				}
}
}


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		body{
			background-image: url('h.jpg');
		}
	</style>
</head>
<body>
	<div class="formContainer">
   <form onsubmit="return validateForm();" method="post">
   <h2>Register</h2>
   <?php
   if (isset($error)) {
   	foreach ($error as $error) {
   		echo '<span class="errormessage">'.$error.'</span>';
   	};
   };
   ?>
   	<input type="text" name="FirstName" value="" placeholder="Enter your firstname" id="firstname" required>
   	<div id="ron"></div>
    <input type="text" name="LastName" value="" placeholder="Enter your Lastname" id="lastname" required>
    <div id="ronn"></div>
   	<input type="text" name="PhoneNumber" value="" placeholder="Enter your phone number" id="phonenumber" required>
   	<input type="email" name="Email" value="" placeholder="Enter your e-mail" id="email" required>
   	<select name="Account" id="account" required>
   		<option selected disabled>---Select account type---</option>
   		<option value="User">User</option>
   	</select>
   	<input type="password" name="password" value="" placeholder="Enter your password" id="password" required>
   	<div id="dad"></div>
   	<input type="password" name="Confirmpassword" value="" placeholder="Confirm your password" id="cpassword" required>
   	<input type="submit" name="Submit" value="Register" class="formButton">
   	<p>Already have an account?<a href="Login.php">Login</a></p>
   	<p>Go Back <a href="Home.html">Home</a></p>
   </form>
</div>
<script src="script.js"></script>
</body>
</html>