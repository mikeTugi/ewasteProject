<?php
    if($_REQUEST['action'] == 'deleteO' && !empty($_REQUEST['id'])){ 
    include 'connect.php';
    $deleteItem = $_REQUEST['id'];          
    $sql = "DELETE FROM `orders` WHERE `Order_Id` = '$deleteItem'";
    mysqli_query($connect, $sql); 
    header("Location: User.php?deleteorder=success");
    }
?>