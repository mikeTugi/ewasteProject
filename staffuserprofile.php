<?php
include 'connect.php';
session_start();
   	$currentUser = $_SESSION['staffname'];;
   	$sql = "SELECT * FROM users WHERE Id = '$currentUser' ";
   	$result = mysqli_query($connect,$sql);
   	$row = mysqli_fetch_assoc($result);
   	$Firstname = $row['Firstname'];
    $Lastname = $row['Lastname'];
    $phonenumber = $row['Phonenumber'];
    $Email = $row['Email'];
   	  
   	 if ($_SERVER['REQUEST_METHOD']=='POST') {
      $Firstname = $_POST['updateFirstName'];
      $Lastname = $_POST['updateLastName'];
      $phonenumber = $_POST['PhoneNumber'];
      $Email = $_POST['Email'];


      $sql = "UPDATE users set Id = '$currentUser',Firstname='$Firstname',Lastname='$Lastname',Phonenumber= '$phonenumber',Email='$Email' WHERE Id ='$currentUser'";
      $result = mysqli_query($connect,$sql);
      if ($result) {
           header('location:staffuserprofile.php');
      }else{
           echo "Not successful";
        }

    }
  
   
   	  		
   	  
   	  
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Profile</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		body{
			background-image: url('box.png');
		}
	</style>
</head>
<body>
	<div class="formContainer">
   <form method="post">
   	<h2>Update Profile</h2>
	<input type="text" name="updateFirstName" value="<?php echo $Firstname ?>" required>
    <input type="text" name="updateLastName" value="<?php echo $Lastname ?>" required>
    <input type="text" name="PhoneNumber" value="<?php echo $phonenumber ?>"  required>
   	<input type="email" name="Email" value="<?php echo $Email ?>"  required>
   	<input type="submit" name="Submit" value="Update" class="formButton">
   	<p>Go Back <a href="Staff.php">Home</a></p>
   </form>
</div>
<script src="script.js"></script>
</body>
</html>