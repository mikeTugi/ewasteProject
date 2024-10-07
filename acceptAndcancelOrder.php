<?php
if($_REQUEST['action'] == 'acceptO' && !empty($_REQUEST['id'])){ 
include 'connect.php';
$updateItem = $_REQUEST['id'];
$sql = "UPDATE `orders` SET `Status`='Accepted' WHERE `Order_ID`='$updateItem'";
mysqli_query($connect, $sql); 
header("Location: Staff.php?acceptOrder=success");          
}

if($_REQUEST['action'] == 'cancelO' && !empty($_REQUEST['id'])){ 
include 'connect.php';
$deleteItem = $_REQUEST['id'];
$sql = "UPDATE `orders` SET `Status` = 'Cancelled' WHERE `Order_ID` = '$deleteItem'";
mysqli_query($connect, $sql); 
header("Location: Staff.php?cancelOrder=success");
}
?>    