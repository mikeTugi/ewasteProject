<?php
session_start();
if (isset($_POST['addO'])){
 $eType = $_POST['eType'];
 $loc = $_POST['loc']; 
 $sid = $_POST['staffid'];
 $uid = $_SESSION['username'];

 include 'connect.php';

$sql = "INSERT INTO `orders`(Id, Staff_ID,EwasteType, AmountCollected, Location, Points) VALUES ('$uid','$sid','$eType','TBC','$loc','TBC')";
mysqli_query($connect, $sql);
header("location: User.php?makeanOrder=success");
}
?>