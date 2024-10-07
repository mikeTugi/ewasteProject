<?php
if (isset($_POST['complete'])){
 $amountC = $_POST['amountcollected']; 
 $points = $_POST['points'];
 $orderid = $_POST['orderid'];

 include 'connect.php';

$sql = "UPDATE `orders` SET `AmountCollected` = '$amountC', `Status` = 'Completed', `Points` = '$points' WHERE `Order_Id` = '$orderid'";
     mysqli_query($connect, $sql);
  header("Location: Staff.php?completeOrder=success");
}
?>