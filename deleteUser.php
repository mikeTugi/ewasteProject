<?php
if($_REQUEST['action'] == 'deleteU' && !empty($_REQUEST['id'])){ 
        include 'connect.php';
        $deleteItem = $_REQUEST['id'];
        $sql = "DELETE FROM `users` WHERE `Id` = '$deleteItem'";
        mysqli_query($connect, $sql); 
        header("Location: index.php?deleteuser=success");
        }
?>