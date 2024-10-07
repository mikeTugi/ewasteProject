<?php
include 'connect.php';

session_start();
if (isset($_POST['login'])) {
	    $email = $_POST['email'];
    	$password = $_POST['password'];   

         $sql = "SELECT * FROM `users` WHERE `Email`='$email'";

        $result = mysqli_query($connect,$sql);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);

            $pass = $row['Password'];
            $type = $row['Account_Type'];

if(md5($password) == $pass){

                if ($type == "Administrator") {
                $_SESSION['adminname'] = $row['Id'];
                header("Location: Admin.php");
                }else if ($type == "Staff") {
                $_SESSION['staffname'] = $row['Id'];
                header("Location: Staff.php");
                }else if ($type == "User") {
                $_SESSION['username'] = $row['Id'];
                header("Location: User.php");
                }
            }else{
                echo '<script>alert("Password is incorrect")</script>';
            }
        }else{
            echo '<script>alert("User does not exist.")</script>';
        }
}
     
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		body{
			background-image: url('h.jpg');
		}
	</style>
</head>
<body>
	<div class="formContainer">
   <form method="post">
   <h2>Login</h2>
   	<input type="email" name="email" value="" placeholder="Enter your e-mail" required>
   	<input type="password" name="password" value="" placeholder="Enter your password" required>
   	<input type="submit" name="login" value="Login" class="formButton">
   	<p>Don't have an account?<a href="registration.php">Sign up</a></p>
    <p>Go Back <a href="Home.html">Home</a></p>
   </form>
</div>
</body>
</html>