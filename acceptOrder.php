<?php
if($_REQUEST['action'] == 'acceptO' && !empty($_REQUEST['id'])){ 
include 'connect.php';
$updateItem = $_REQUEST['id'];
$sql = "UPDATE `order` SET `Status`='Accepted' WHERE `Order_ID`='$updateItem'";
mysqli_query($connect, $sql); 
header("Location: Staff.php?acceptOrder=success");          
}
?>    